<?php
/**
 * フィード
 */
$this->Feed->saveCachetime();
?>
<cake:nocache>
<?php $this->Feed->cacheHeader() ?>
</cake:nocache>

<?php if (!empty($items)): ?>
<?php foreach ($items as $key => $item): ?>
<article class="entryTopNews">
	<a href="<?php echo $item['link']['value']; ?>">
		<time datetime="<?php echo date("Y-m-d", strtotime($item['pubDate']['value'])); ?>"><?php echo date("Y.m.d", strtotime($item['pubDate']['value'])); ?></time>
		<h3><?php echo $item['title']['value']; ?></h3>
	</a>
</article>
<?php endforeach; ?>
<?php else: ?>
<article class="entryTopNews">
	<h3 class="hlNoEntry">現在、お知らせはございません。</h3>
</article>
<?php endif; ?>