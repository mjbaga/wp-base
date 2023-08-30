<?php
/**
 * Block Name: Accordion Block
 *
 * This template displays the accordion block.
 */

if(!empty($data)):
?>
<div class="accordion">
  <?php foreach($data->accordion as $acc): ?>
    <div class="accordion-item">
      <div class="accordion-heading">
        <button>
          <span><?php print $acc['heading'] ?></span>
          <i class="icon icon-plus"></i>
        </button>
      </div>
      <div class="accordion-body">
        <?php print $acc['body']; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php else: ?>
	<p>Please add items into the block</p>
<?php endif; ?>