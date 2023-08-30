<main id="main" class="main">
	<div class="breadcrumbs">
		<div class="container">
			<?php print $data->breadcrumbs ?>
		</div>
	</div>
	<div class="container main-container clearfix">
		<article class="article">
			<div class="article-detail">
				<div class="detail-info__wrap">
					<div class="detail-cat"><?php print $data->terms ?></div>
					<div class="detail-title"><?php print $data->title ?></div>
					<div class="detail-items">
						<?php if($data->date != ''): ?>
							<div class="items__info">
								<i class="icon icon-calendar"></i>
								<span><?php print $data->date ?></span>
							</div>
						<?php endif ?>

						<?php if(!empty($data->location)): ?>
							<div class="items__info">
								<i class="icon icon-location"></i>
								<span><?php print $data->location->post_title ?></span>
							</div>
						<?php endif ?>

						<?php if($data->price != ''): ?>
							<div class="items__info">
								<i class="icon icon-money"></i>
								<span><?php print $data->price ?></span>
							</div>
						<?php endif ?>
					</div>
				</div>
				<div class="detail-api__wrap">
					<?php if($data->enquire_link != ''): ?>
						<div class="detail-button">
							<a class="btn btn--border btn--anchor btn--inline" href="<?php print $data->enquire_link ?>" target="_self">
								<span><i class="icon icon-arrow-right"></i>
								<span class="btn__text">Enquire</span></span>
							</a>
						</div>
					<?php endif ?>
					<div class="detail-share">
						<div class="share-title">Share on:</div>
						<ul class="social-icons">
							<li><a href="javascript:void(0);" class="addthis_button_facebook"><i class="icon icon-facebook"></i></a></li>
							<li><a href="javascript:void(0);" class="addthis_button_twitter"><i class="icon icon-twitter"></i></a></li>
							<li><a href="javascript:void(0);" class="addthis_button_google_plusone_share"><i class="icon icon-google"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<?php if(!empty($data->carousel)): ?>
				<div class="article-gallery">
					<div class="article-gallery__slick">
						<?php foreach($data->carousel as $slide): ?>
							<div class="gallery-wrapper">
								<div class="gallery-image">
									<img src="<?php print $slide['carousel_image']['url'] ?>" alt="<?php print $slide['carousel_image']['alt'] ?>">
								</div>
							</div>
						<?php endforeach ?>
					</div>
					<div class="article-gallery__dots"></div>
					<div class="article-gallery__arrows">
						<div class="icon prev icon-arrow-left"></div>
						<div class="icon next icon-arrow-right"></div>
					</div>
				</div>
			<?php endif ?>
			<div class="rte">
				<?php print $data->content ?>
			</div>
		</article>
	</div>
</main>