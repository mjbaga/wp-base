<main class="page-home">
	<div class="page page-home__wrapper" id="page-home">
		<?php print $data->content ?>
  </div>
  <?php 
    $now = Carbon\Carbon::now();

    if(isset($data->start_date) && isset($data->end_date)):
      if($now >= $data->start_date && $now <= $data->end_date): 
  ?>
      <div class="float-icon">
        <a href="<?php print $data->telegram_link ?>" target="_blank">
          <img src="/wp-content/themes/sample/assets/images/icons/LIVE-chat.png">
        </a>
      </div>
  <?php 
      endif; 
    endif;   
  ?>
  <div class="modal">
    <div class="modal-overlay"></div>
    <div class="modal-wrap">
      <div class="modal-container">
        <div class="modal-head">
          <button class="btn btn--modal_close" type="button"><span><span class="btn__text"></span><i class="icon icon-close"></i></span>
          </button>
        </div>
        <div class="modal-body"></div>
      </div>
    </div>
  </div>	
</main>