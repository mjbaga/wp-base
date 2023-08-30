<?php
/**
 * Block Name: Tabs Block
 *
 * This template displays the tabs block.
 */

if(!empty($data)):
?>
<div class="hero-banner">
    <div class="banner-content">
        <h1><?= $data->heading ?></h1>
        <span><?= $data->subtitle ?></span>
    </div>
    <?php if ($data->hero): ?>
        <img src="<?= $data->hero['sizes']['large'] ?>" alt="">
    <?php endif; ?>
    <div class="hero-description">
    <?= $data->description ?>
    </div>
</div>
<?php else: ?>
	<p>Please add items into the block</p>
<?php endif; ?>