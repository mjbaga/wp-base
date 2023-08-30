<?php 

$tmp = (array) $data;

if(!empty($tmp)): ?>

	<div class="course-block <?php print $data->image_placement == 'right' ? 'reverse' : ''; ?>">
		<div class="course-block__image">
			<?php if(isset($data->featured_image)): ?>
				<img src="<?php print $data->featured_image ?>">
			<?php endif; ?>
		</div>
		<div class="course-block__text">
			<div class="vcenter">
				<p class="tagline"><?php print $data->tagline ?></p>
				<h2 class="block-title"><?php print $data->title ?></h2>
				<p><?php print $data->content ?></p>
				<?php if(!empty($data->cta)): ?>
					<a class="btn" href="<?php print $data->cta['url'] ?>" target="<?php print $data->cta['target'] ?>">
						<span><span class="btn__text"><?php print $data->cta['title'] ?></span>
						<i class="icon icon-arrow_right"></i></span>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php else: ?>
	<p>Please select a course from the Course Selector dropdown.</p>
<?php endif; ?>