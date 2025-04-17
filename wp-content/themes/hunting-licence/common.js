// メニュー展開時に背景を固定
const backgroundFix = (bool) => {
  const scrollingElement = () => {
    const browser = window.navigator.userAgent.toLowerCase();
    if ("scrollingElement" in document) return document.scrollingElement;
    return document.documentElement;
  };

  const scrollY = bool
    ? scrollingElement().scrollTop
    : parseInt(document.body.style.top || "0");

  const fixedStyles = {
    height: "100vh",
    position: "fixed",
    top: `${scrollY * -1}px`,
    left: "0",
    width: "100vw"
  };

  Object.keys(fixedStyles).forEach((key) => {
    document.body.style[key] = bool ? fixedStyles[key] : "";
  });

  if (!bool) {
    window.scrollTo(0, scrollY * -1);
  }
};

// 変数定義
const CLASS = "-active";
let flg = false;
let accordionFlg = false;

let hamburger = document.getElementById("js-hamburger");
let focusTrap = document.getElementById("js-focus-trap");
let menu = document.querySelector(".js-nav-area");
let accordionTrigger = document.querySelectorAll(".js-sp-accordion-trigger");
let accordion = document.querySelectorAll(".js-sp-accordion");

// メニュー開閉制御
hamburger.addEventListener("click", (e) => { //ハンバーガーボタンが選択されたら
  e.currentTarget.classList.toggle(CLASS);
  menu.classList.toggle(CLASS);
  if (flg) {// flgの状態で制御内容を切り替え
    backgroundFix(false);
    hamburger.setAttribute("aria-expanded", "false");
    hamburger.focus();
    flg = false;
  } else {
    backgroundFix(true);
    hamburger.setAttribute("aria-expanded", "true");
    flg = true;
  }
});
window.addEventListener("keydown", () => {　//escキー押下でメニューを閉じられるように
  if (event.key === "Escape") {
    hamburger.classList.remove(CLASS);
    menu.classList.remove(CLASS);

    backgroundFix(false);
    hamburger.focus();
    hamburger.setAttribute("aria-expanded", "false");
    flg = false;
  }
});

// メニュー内アコーディオン制御
accordionTrigger.forEach((item) => {
  item.addEventListener("click", (e) => {
    e.currentTarget.classList.toggle(CLASS);
    e.currentTarget.nextElementSibling.classList.toggle(CLASS);
    if (accordionFlg) {
      e.currentTarget.setAttribute("aria-expanded", "false");
      accordionFlg = false;
    } else {
      e.currentTarget.setAttribute("aria-expanded", "true");
      accordionFlg = true;
    }
  });

});

// フォーカストラップ制御
focusTrap.addEventListener("focus", (e) => {
  hamburger.focus();
});


//アコーディオン
$(function () {
    $("#accordion dt").on("click", function () {
      $(this).next().slideToggle("fast");
      $(this).toggleClass("active");
    });
  });

// モーダル
document.addEventListener('DOMContentLoaded', () => {
  const elem = document.getElementById('modal-1');
  new Modal(elem);
});

/**
 * モーダルウィンドウ
 * @property {HTMLElement} modal モーダル要素
 * @property {NodeList} openers モーダルを開く要素
 * @property {NodeList} closers モーダルを閉じる要素
 */
function Modal(modal) {
  this.modal = modal;
  const id = this.modal.id;
  this.openers = document.querySelectorAll('[data-modal-open="' + id + '"]');
  this.closers = this.modal.querySelectorAll('[data-modal-close]');
  
  this.handleOpen();
  this.handleClose();
}

/**
 * 開くボタンのイベント登録
 */
Modal.prototype.handleOpen = function() {
  if (this.openers.length === 0) {
    return false;
  }

  this.openers.forEach(opener => {
    opener.addEventListener('click', this.open.bind(this));
  });
};

/**
 * 閉じるボタンのイベント登録
 */
Modal.prototype.handleClose = function() {
  if (this.closers.length === 0) {
    return false;
  }

  this.closers.forEach(closer => {
    closer.addEventListener('click', this.close.bind(this));
  });
};

/**
 * モーダルを開く
 */
Modal.prototype.open = function() {
  this.modal.classList.add('is-open');
};

/**
 * モーダルを閉じる
 */
Modal.prototype.close = function() {
  this.modal.classList.remove('is-open');
};

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("toggle-random").addEventListener("click", function () {
      let url = new URL(window.location.href);
      if (url.searchParams.get("random") === "1") {
          url.searchParams.delete("random"); // 通常順に戻す
      } else {
          url.searchParams.set("random", "1"); // ランダムにする
      }
      window.location.href = url.toString(); // ページをリロード
  });
});
/**
 * フッター固定
 */
new function(){
	
	var footerId = "footer";
	//メイン
	function footerFixed(){
		//ドキュメントの高さ
		var dh = document.getElementsByTagName("body")[0].clientHeight;
		//フッターのtopからの位置
		document.getElementById(footerId).style.top = "0px";
		var ft = document.getElementById(footerId).offsetTop;
		//フッターの高さ
		var fh = document.getElementById(footerId).offsetHeight;
		//ウィンドウの高さ
		if (window.innerHeight){
			var wh = window.innerHeight;
		}else if(document.documentElement && document.documentElement.clientHeight != 0){
			var wh = document.documentElement.clientHeight;
		}
		if(ft+fh<wh){
			document.getElementById(footerId).style.position = "relative";
			document.getElementById(footerId).style.top = (wh-fh-ft-1)+"px";
		}
	}
	
	//文字サイズ
	function checkFontSize(func){
	
		//判定要素の追加	
		var e = document.createElement("div");
		var s = document.createTextNode("S");
		e.appendChild(s);
		e.style.visibility="hidden"
		e.style.position="absolute"
		e.style.top="0"
		document.body.appendChild(e);
		var defHeight = e.offsetHeight;
		
		//判定関数
		function checkBoxSize(){
			if(defHeight != e.offsetHeight){
				func();
				defHeight= e.offsetHeight;
			}
		}
		setInterval(checkBoxSize,1000)
	}
	
	//イベントリスナー
	function addEvent(elm,listener,fn){
		try{
			elm.addEventListener(listener,fn,false);
		}catch(e){
			elm.attachEvent("on"+listener,fn);
		}
	}

	addEvent(window,"load",footerFixed);
	addEvent(window,"load",function(){
		checkFontSize(footerFixed);
	});
	addEvent(window,"resize",footerFixed);
	
  //スクロール時は非表示
  document.addEventListener('DOMContentLoaded', function () {
    const pagetop = document.querySelector('.pagetop');
    let isScrolling;
    
    // 初期状態で表示（最上部）
    pagetop.classList.add('show');
  
    window.addEventListener('scroll', function () {
      // スクロール中 → 非表示
      pagetop.classList.remove('show');
  
      // 一旦スクロールが止まったら、300ms後に再表示
      clearTimeout(isScrolling);
      isScrolling = setTimeout(function () {
        pagetop.classList.add('show');
      }, 300);
    });
  
    // トップへスムーズに戻る
    pagetop.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  });
  
}