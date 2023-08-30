<?php
/**
 * Block Name: Welcome
 *
 * This is the template that displays the welcome home page block.
 */
$tmp = (array) $data;

if(!empty($tmp)):
?>


<section class="homepage-section welcome" name="<?php print sanitize_title($tmp['section_title']) ?>" data-section="<?php print $tmp['section_title']; ?>">
    <div class="section__wrap">
        <div class="widget-wrap">
            <div class="img-wrap"><img src="<?php print $tmp['txt_image']['url']; ?>" title="<?php print $tmp['txt_image']['title']; ?>">
            </div>
            <div class="scroll-explore"><span>Scroll right to explore</span><span><i class="icon icon-arrow_right"></i></span></div>
          </div>
          <div class="homepage-section__bg-img img-objfit"><img class="desktop-only" src="<?php print $tmp['bg_image']['url']; ?>"><img class="mobile-only" src="<?php print $tmp['bg_image_mobile']['url']; ?>">
        </div>
    </div>
</section>

<?php else: ?>
	<p>Please add items into the block</p>
<?php endif; ?>