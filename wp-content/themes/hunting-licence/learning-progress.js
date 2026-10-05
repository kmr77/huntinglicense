(function (window, document) {
  'use strict';

  const KEY = 'shuryoLearningRecordV1';
  const AREAS = {
    laws: '法令', type1: '第一種銃猟', type2: '第二種銃猟', wana: 'わな猟',
    ami: '網猟', animals: '鳥獣', protection: '保護管理', examination: '猟銃等講習会'
  };

  function empty() { return { version: 1, questions: {}, exams: [], goalDate: '' }; }
  function available() {
    try {
      const test = KEY + 'Test';
      window.localStorage.setItem(test, '1');
      window.localStorage.removeItem(test);
      return true;
    } catch (e) { return false; }
  }
  function read() {
    try {
      const raw = JSON.parse(window.localStorage.getItem(KEY));
      if (!raw || raw.version !== 1 || !raw.questions || typeof raw.questions !== 'object' ||
          Array.isArray(raw.questions) || !Array.isArray(raw.exams)) return empty();
      return { version: 1, questions: raw.questions, exams: raw.exams,
        goalDate: typeof raw.goalDate === 'string' ? raw.goalDate : '' };
    } catch (e) { return empty(); }
  }
  function write(data) {
    try { window.localStorage.setItem(KEY, JSON.stringify(data)); return true; }
    catch (e) { return false; }
  }
  function area(slugs) {
    const values = Array.isArray(slugs) ? slugs : String(slugs || '').split(',');
    if (!values.some(Boolean)) return '';
    if (values.includes('protection')) return 'protection';
    if (values.includes('examination')) return 'examination';
    for (const slug of Object.keys(AREAS)) if (values.includes(slug)) return slug;
    if (values.includes('animals-judge')) return 'animals';
    return values.includes('numbers') ? 'cross' : 'other';
  }
  function updateQuestion(data, entry) {
    const id = Number(entry.id);
    if (!Number.isSafeInteger(id) || id < 1 || typeof entry.correct !== 'boolean') return;
    const key = String(id);
    const old = data.questions[key] || {};
    const q = {
      id: id, area: area(entry.areas) || old.area || '', title: String(entry.title || old.title || '').slice(0, 180),
      attempts: Number(old.attempts) || 0, correct: Number(old.correct) || 0,
      wrong: Number(old.wrong) || 0, cycleWrong: Number(old.cycleWrong) || 0,
      streak: Number(old.streak) || 0, lastResult: '', lastAt: '', status: old.status || 'answered'
    };
    q.attempts++;
    q.lastResult = entry.correct ? 'correct' : 'wrong';
    q.lastAt = new Date().toISOString();
    if (entry.correct) {
      q.correct++;
      q.streak++;
      if (q.status === 'review' && q.streak >= 2) {
        q.status = 'mastered';
        q.cycleWrong = 0;
      }
    } else {
      q.wrong++;
      q.streak = 0;
      q.cycleWrong++;
      q.status = q.cycleWrong >= 2 ? 'review' : 'answered';
    }
    data.questions[key] = q;
  }
  function recordQuestion(entry) {
    const data = read();
    updateQuestion(data, entry);
    return write(data);
  }
  function recordExam(exam, answers) {
    const data = read();
    if (!exam || !exam.id || data.exams.some(item => item.id === exam.id)) return false;
    if (!Array.isArray(answers) || answers.length !== exam.total || !answers.length) return false;
    answers.forEach(item => updateQuestion(data, item));
    data.exams.push({ id: String(exam.id), at: new Date().toISOString(), type: String(exam.type || ''),
      total: exam.total, correct: exam.correct, durationSeconds: Math.max(0, Math.floor(exam.durationSeconds)) });
    return write(data);
  }
  function validDate(date) {
    if (!/^\d{4}-\d{2}-\d{2}$/.test(date)) return false;
    const [year, month, day] = date.split('-').map(Number);
    const parsed = new Date(year, month - 1, day);
    return parsed.getFullYear() === year && parsed.getMonth() === month - 1 && parsed.getDate() === day;
  }
  function setGoal(date) {
    const data = read();
    if (date && !validDate(date)) return false;
    data.goalDate = date;
    return write(data);
  }
  function reset() {
    try { window.localStorage.removeItem(KEY); return true; }
    catch (e) { return false; }
  }
  function stats(totalIds) {
    const data = read();
    const ids = Array.isArray(totalIds) ? totalIds.map(Number) : [];
    const questions = Object.values(data.questions).filter(q => q && Number(q.id) > 0);
    const inScope = ids.length ? questions.filter(q => ids.includes(Number(q.id))) : questions;
    const result = { attempts: 0, correct: 0, wrong: 0, answered: inScope.length,
      unanswered: ids.filter(id => !data.questions[id]).length, areas: {}, review: [], exams: data.exams };
    Object.keys(AREAS).forEach(slug => { result.areas[slug] = { attempts: 0, correct: 0 }; });
    inScope.forEach(q => {
      result.attempts += Number(q.attempts) || 0;
      result.correct += Number(q.correct) || 0;
      result.wrong += Number(q.wrong) || 0;
      if (result.areas[q.area]) {
        result.areas[q.area].attempts += Number(q.attempts) || 0;
        result.areas[q.area].correct += Number(q.correct) || 0;
      }
      if (q.status === 'review') result.review.push(q);
    });
    result.review.sort((a, b) => (Number(b.wrong) || 0) - (Number(a.wrong) || 0));
    return result;
  }

  function text(id, value) {
    const element = document.getElementById(id);
    if (element) element.textContent = value;
  }
  function percent(correct, total) { return total ? Math.round(correct / total * 100) + '%' : '—'; }
  function duration(seconds) {
    const value = Math.max(0, Math.floor(Number(seconds) || 0));
    const minutes = Math.floor(value / 60);
    const hours = Math.floor(minutes / 60);
    const remainder = String(value % 60).padStart(2, '0') + '秒';
    return hours ? hours + '時間' + (minutes % 60) + '分' + remainder : minutes + '分' + remainder;
  }
  function preciseDuration(seconds) {
    const value = Math.max(0, Math.floor(Number(seconds) || 0));
    return Math.floor(value / 60) + '分' + String(value % 60).padStart(2, '0') + '秒';
  }
  function idsFrom(element) {
    try { return JSON.parse(element.dataset.questionIds).map(Number).filter(Number.isSafeInteger); }
    catch (e) { return []; }
  }
  function addCell(row, value) {
    const cell = document.createElement('td');
    cell.textContent = value;
    row.appendChild(cell);
  }
  function initStudy() {
    const root = document.getElementById('study-record');
    if (!root) return;
    const ids = idsFrom(root);
    const notice = document.getElementById('learning-storage-notice');
    notice.hidden = available();
    const input = document.getElementById('learning-goal-date');

    function render() {
      const data = read();
      const s = stats(ids);
      input.value = validDate(data.goalDate) ? data.goalDate : '';
      if (!validDate(data.goalDate)) text('learning-goal-status', '目標試験日は未設定です。');
      else {
        const parts = data.goalDate.split('-').map(Number);
        const target = new Date(parts[0], parts[1] - 1, parts[2]);
        const today = new Date();
        const days = Math.round((Date.UTC(target.getFullYear(), target.getMonth(), target.getDate()) -
          Date.UTC(today.getFullYear(), today.getMonth(), today.getDate())) / 86400000);
        text('learning-goal-status', days > 0 ? '試験まであと' + days + '日' :
          days === 0 ? '試験日です' : '設定した試験日は終了しました。新しい試験日を設定してください');
      }
      text('learning-attempts', s.attempts + '回');
      text('learning-answered', s.answered + '問');
      text('learning-unanswered', s.unanswered + '問');
      text('learning-correct', s.correct + '回');
      text('learning-wrong', s.wrong + '回');
      text('learning-rate', percent(s.correct, s.attempts));

      const areaBody = document.getElementById('learning-areas');
      areaBody.replaceChildren();
      let weakest = null;
      Object.entries(AREAS).forEach(([slug, label]) => {
        const a = s.areas[slug];
        const row = document.createElement('tr');
        addCell(row, label); addCell(row, a.attempts + '回'); addCell(row, percent(a.correct, a.attempts));
        areaBody.appendChild(row);
        if (a.attempts && (!weakest || a.correct / a.attempts < weakest.rate))
          weakest = { label: label, rate: a.correct / a.attempts };
      });
      text('learning-weak-area', weakest ? weakest.label : '—');
      text('learning-review-count', s.review.length + '問');
      document.getElementById('learning-review-empty').hidden = s.review.length > 0;
      const wrongList = document.getElementById('learning-wrong-list');
      wrongList.replaceChildren();
      const frequentlyWrong = Object.values(data.questions).filter(q => q && q.wrong > 0 && ids.includes(Number(q.id)))
        .sort((a, b) => b.wrong - a.wrong).slice(0, 5);
      if (!frequentlyWrong.length) {
        const item = document.createElement('li'); item.textContent = 'まだありません'; wrongList.appendChild(item);
      } else frequentlyWrong.forEach(q => {
        const item = document.createElement('li');
        item.textContent = (q.title || '問題 ' + q.id) + '（不正解 ' + q.wrong + '回）';
        wrongList.appendChild(item);
      });

      const exams = s.exams.filter(e => e && e.total > 0 && e.correct >= 0 && e.durationSeconds >= 0);
      const totalSeconds = exams.reduce((sum, e) => sum + Number(e.durationSeconds), 0);
      text('learning-exam-time', duration(totalSeconds));
      text('learning-exam-count', exams.length + '回');
      if (exams.length) {
        const ranked = exams.slice().sort((a, b) => b.correct / b.total - a.correct / a.total);
        const best = ranked[0];
        text('learning-exam-best', best.correct + ' / ' + best.total + '問（' + percent(best.correct, best.total) + '）');
        const avg = exams.reduce((sum, e) => sum + e.correct / e.total, 0) / exams.length;
        text('learning-exam-average', '平均正答率 ' + Math.round(avg * 100) + '%');
        const latest = exams[exams.length - 1];
        text('learning-exam-latest', latest.correct + ' / ' + latest.total + '問（' + percent(latest.correct, latest.total) + '）');
        text('learning-exam-fastest', preciseDuration(Math.min(...exams.map(e => e.durationSeconds))));
        text('learning-exam-average-time', preciseDuration(totalSeconds / exams.length));
      } else ['learning-exam-best','learning-exam-average','learning-exam-latest','learning-exam-fastest','learning-exam-average-time']
        .forEach(id => text(id, '—'));
      const history = document.getElementById('learning-exam-history');
      history.replaceChildren();
      if (!exams.length) {
        const row = document.createElement('tr'); const cell = document.createElement('td');
        cell.colSpan = 4; cell.textContent = 'まだ模擬試験の受験履歴はありません。'; row.appendChild(cell); history.appendChild(row);
      } else exams.slice().reverse().forEach(e => {
        const row = document.createElement('tr');
        addCell(row, new Date(e.at).toLocaleString('ja-JP'));
        addCell(row, e.type);
        addCell(row, e.correct + ' / ' + e.total + '問（' + percent(e.correct, e.total) + '）');
        addCell(row, preciseDuration(e.durationSeconds));
        history.appendChild(row);
      });
    }
    document.getElementById('learning-goal-save').addEventListener('click', () => {
      if (setGoal(input.value)) render();
      else text('learning-goal-status', '保存できませんでした');
    });
    const confirm = document.getElementById('learning-reset-confirm');
    document.getElementById('learning-reset-open').addEventListener('click', () => { confirm.hidden = false; });
    document.getElementById('learning-reset-cancel').addEventListener('click', () => { confirm.hidden = true; });
    document.getElementById('learning-reset-yes').addEventListener('click', () => {
      if (reset()) { confirm.hidden = true; render(); }
      else text('learning-goal-status', '削除できませんでした');
    });
    render();
  }

  function normalizedAnswer(answer, kind) {
    const value = String(answer || '').trim().replace(/^(?:正解|答え?|回答)\s*(?:は)?\s*[：:）)\-－]?\s*/u, '');
    if (kind === 'animal') return value.includes('非狩猟鳥獣') ? 'nonhunt' : value.includes('狩猟鳥獣') ? 'hunt' : '';
    if (kind === 'boolean') return /^[（(\s]*(?:〇|○|正しい)/u.test(value) ? 'maru' :
      /^[（(\s]*(?:×|✕|✖|誤り)/u.test(value) ? 'batsu' : '';
    if (kind === 'choice') {
      const m = value.match(/^[（(\s]*([アイウ１２３123①②③ABCＡＢＣabcａｂｃ])/u);
      if (!m) return '';
      const index = ['ア1１①AＡaａ', 'イ2２②BＢbｂ', 'ウ3３③CＣcｃ'].findIndex(group => group.includes(m[1]));
      return ['a', 'i', 'u'][index] || '';
    }
    return '';
  }
  function initReview() {
    const root = document.getElementById('learning-review');
    if (!root) return;
    const mode = root.dataset.mode;
    const ids = idsFrom(root);
    const question = document.getElementById('learning-review-question');
    const next = document.getElementById('learning-next');
    const sessionKey = 'shuryoReviewSessionV1:' + mode;
    function eligible() {
      const records = read().questions;
      return ids.filter(id => mode === 'unanswered' ? !records[id] : records[id] && records[id].status === 'review');
    }
    function getQueue() {
      try {
        const stored = JSON.parse(window.sessionStorage.getItem(sessionKey));
        if (Array.isArray(stored)) return stored.map(Number).filter(id => eligible().includes(id));
      } catch (e) { /* sessionStorage unavailable */ }
      return eligible();
    }
    function saveQueue(queue) {
      try { window.sessionStorage.setItem(sessionKey, JSON.stringify(queue)); } catch (e) { /* optional */ }
    }
    function goNext() {
      const queue = getQueue();
      window.location.href = root.dataset.reviewUrl + (queue.length ? '?mode=' + mode + '&q=' + queue[0] : '?mode=' + mode + '&done=1');
    }
    const currentId = question ? Number(question.dataset.questionId) : 0;
    const requested = new URLSearchParams(window.location.search).get('q');
    let queue = getQueue();
    if (!requested) {
      if (new URLSearchParams(window.location.search).has('done')) {
        text('learning-review-status', '今回の復習を終えました。');
        next.hidden = true;
        return;
      }
      queue = eligible();
      if (queue.length) { saveQueue(queue); goNext(); return; }
      text('learning-review-status', mode === 'review' ? '現在、要復習の問題はありません' : '未回答の問題はありません');
      next.hidden = true;
      return;
    }
    if (!currentId || !queue.includes(currentId) || String(currentId) !== requested) {
      if (question) question.hidden = true;
      text('learning-review-status', 'この問題は現在の復習対象ではありません。');
      next.addEventListener('click', goNext);
      return;
    }
    question.hidden = false;
    text('learning-review-status', '残り ' + queue.length + '問');
    next.hidden = true;
    const choices = question.querySelector('.learning-choices');
    const kind = choices.dataset.answerKind;
    const answer = document.getElementById('learning-review-answer');
    let completed = false;
    function complete(correct) {
      if (completed) return;
      completed = true;
      const saved = recordQuestion({ id: currentId, areas: question.dataset.learningAreas,
        title: question.dataset.learningTitle, correct: correct });
      answer.hidden = false;
      text('learning-review-feedback', (correct ? '〇 正解' : '× 不正解') +
        (saved ? '' : '（ブラウザに記録できませんでした）'));
      question.querySelectorAll('[data-choice]').forEach(button => { button.disabled = true; });
      queue = queue.filter(id => id !== currentId);
      saveQueue(queue);
      next.hidden = false;
      next.textContent = queue.length ? '次の問題へ' : '復習を終了する';
    }
    const reveal = document.getElementById('learning-reveal');
    if (reveal) reveal.addEventListener('click', () => {
      answer.hidden = false;
      choices.hidden = false;
      reveal.hidden = true;
    });
    choices.addEventListener('click', event => {
      const button = event.target.closest('[data-choice]');
      if (!button || completed) return;
      if (kind === 'self') { complete(button.dataset.choice === 'correct'); return; }
      const correctValue = normalizedAnswer(question.dataset.answer, kind);
      if (correctValue) complete(button.dataset.choice === correctValue);
      else {
        answer.hidden = false;
        text('learning-review-feedback', '自動判定できない答えです。正誤を自己判定してください。');
        choices.dataset.answerKind = 'self';
        choices.innerHTML = '<button type="button" data-choice="correct">正解した</button><button type="button" data-choice="wrong">間違えた</button>';
      }
    });
    next.addEventListener('click', goNext);
  }

  window.ShuryoLearning = { KEY, AREAS, available, read, area, recordQuestion, recordExam,
    setGoal, reset, stats };
  function init() { initStudy(); initReview(); }
  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();
})(window, document);
