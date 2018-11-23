<?php
/**
 * PHPテンプレート
 * 呼出箇所：ウィジェット
 */
if(!isset($subDir)) {
	$subDir = true;
}
?>


<aside class="widget widget-php-template-<?php echo $id ?> blogWidget">
	<?php if ($name && $use_title): ?>
		<h3><?php echo $name ?></h3>
	<?php endif ?>
	<?php $this->BcBaser->element('widgets' . DS . $template, array(), array('subDir' => $subDir)) ?>
</aside>
