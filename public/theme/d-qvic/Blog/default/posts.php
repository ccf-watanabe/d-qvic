<?php
/**
 * パーツ用ブログ記事一覧
 *
 * BcBaserHelper::blogPosts( コンテンツ名, 件数 ) で呼び出す
 * （例）<?php $this->BcBaser->blogPosts('news', 3) ?>
 */
?>

<?php if ($posts): ?>
	<?php foreach ($posts as $key => $post): ?>
		<article class="entryTopNews">
			<a href="<?php echo FULL_BASE_URL . $this->Blog->getPostLinkUrl($post, $post['BlogPost']['name']) ?>">
				<time datetime="<?php $this->Blog->postDate($post, 'Y-m-d') ?>"><?php $this->Blog->postDate($post, 'Y.m.d') ?></time>
				<h3 class="hlEntryTopNews"><?php $this->Blog->postTitle($post,false) ?></h3>
				<?php if ( $this->Blog->getCategory($post)): ?>
				<p class="cateEntryTopNews"><?php $this->Blog->category($post, array('link'=>false)) ?></p>
				<?php endif ?>
			</a>
		</article>
	<?php endforeach; ?>
<?php else: ?>
	<article class="entryTopNews">
		<h3 class="hlNoEntry">現在、お知らせはございません。</h3>
	</article>
<?php endif ?>
