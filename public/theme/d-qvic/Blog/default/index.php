<?php
/**
 * ブログトップ
 * 呼出箇所：ブログトップ
 */
$this->BcBaser->setDescription($this->Blog->getDescription());
?>


<div class="hlTitle">
	<h2>お知らせ</h2>
</div>
<div class="container entryContainer">
	<div class="entryArea">
		<?php if (!empty($posts)): ?>
		<?php foreach ($posts as $post): ?>
		<article class="entryList">
			<figure class="entryEyeCatch">
				<a href="<?php echo FULL_BASE_URL . $this->Blog->getPostLinkUrl($post, $post['BlogPost']['name']) ?>">
					<?php if($this->Blog->getEyeCatch($post)): ?>
					<?php $this->Blog->eyeCatch($post, array('imgsize' => 'thumb', 'link' => false)) ?>
					<?php else: ?>
					<img src="<?php $this->BcBaser->themeUrl() ?>/img/news/pho_dummy.jpg" alt="dummuy">
					<?php endif; ?>
				</a>
			</figure>
			<div class="entryListTitle">
				<h4><?php $this->Blog->postTitle($post) ?></h4>
				<time datetime="<?php $this->Blog->postDate($post, 'Y-m-d') ?>"><?php $this->Blog->postDate($post, 'Y.m.d') ?></time>
				<p class="categoryLink"><?php $this->Blog->category($post) ?></p>
				<div class="entryBody">
					<p><?php $this->Blog->postContent($post,true,false,70)  ?></p>
					<p class="more"><a href="<?php echo FULL_BASE_URL . $this->Blog->getPostLinkUrl($post, $post['BlogPost']['name']) ?>"><i class="fa fa-chevron-right"></i>続きを読む</a></p>
				</div><!-- /entryBody -->
			</div><!-- /entryListTitle -->
		</article><!-- /entryList -->
		<?php endforeach; ?>
		<?php else: ?>
		<p class="no-data">記事がありません。</p>
		<?php endif; ?>
			
		<?php /* ページナビ */ ?>
		<?php $this->BcBaser->pagination('simple'); ?>
	</div><!-- /entryArea -->
	
	<?php /* サイドナビ */ ?>
	<?php $this->BcBaser->element('sidebox') ?>
</div>
