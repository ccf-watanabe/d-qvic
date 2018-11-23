<?php
/**
 * ブログ記事詳細ページ
 * 呼出箇所：ブログ記事詳細ページ
 */
$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->Blog->getPostContent($post, false, false, 50));
?>

<div class="hlTitle">
	<h2>お知らせ</h2>
</div>
<div class="container entryContainer">
	<div class="entryArea detailArea">
		<article class="entry">
			<h3><?php $this->Blog->postTitle($post) ?></h3>
			<time datetime="<?php $this->Blog->postDate($post, 'Y-m-d') ?>"><?php $this->Blog->postDate($post, 'Y.m.d') ?></time>
	
			<?php $this->Blog->postContent($post) ?>
			
			<div class="metaArea">
				<ul>
					<li>Category：<?php $this->Blog->category($post) ?></li>
					<li><?php $this->BcBaser->element('blog_tag', array('post' => $post)) ?></li>
				</ul>
			</div><!-- /metaArea -->
			
			<?php $this->BcBaser->element('blog_comments') ?>
		</article><!-- /entry --> 
			
		<?php /* ページナビ */ ?>
		<div class="contentsNavi">
		<?php $this->Blog->prevLink($post) ?>
		&nbsp; &nbsp;
		<?php $this->Blog->nextLink($post) ?>
		</div>
	</div><!-- /entryArea -->
	
	<?php /* サイドナビ */ ?>
	<?php $this->BcBaser->element('sidebox') ?>
</div>
