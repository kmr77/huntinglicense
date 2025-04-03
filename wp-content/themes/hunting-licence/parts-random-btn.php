<div class="random-btn">
  <p>ランダム表示時はページ更新するタイミングでシャッフルされます。</p>
               <button id="toggle-random" class="edit-btn">
                   <?php echo (isset($_GET['random']) && $_GET['random'] == '1') ? '通常順に戻す' : 'ランダムに表示'; ?>
               </button>
             </div>