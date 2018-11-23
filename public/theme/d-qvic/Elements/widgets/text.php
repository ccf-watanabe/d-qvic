<?php
/**
 * テキスト
 * 呼出箇所：ウィジェット
 */
?>


<aside class="widget widget-text-<?php echo $id ?> blogWidget">
	<?php if ($name && $use_title): ?>
		<h3><?php echo $name ?></h3>
	<?php endif ?>
	<?php echo $text ?>
</aside>
