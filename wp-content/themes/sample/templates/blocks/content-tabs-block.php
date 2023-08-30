<?php
/**
 * Block Name: Tabs Block
 *
 * This template displays the tabs block.
 */

if(!empty($data)):
?>
<div class="accordion">
  <h1><?= $data->heading ?></h1>
</div>
<?php else: ?>
	<p>Please add items into the block</p>
<?php endif; ?>