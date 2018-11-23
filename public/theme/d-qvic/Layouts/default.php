<!DOCTYPE html>
<html dir="ltr" lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
	<?php $this->BcBaser->charset() ?> 
	<?php $this->BcBaser->title() ?>
	<?php $this->BcBaser->metaDescription() ?>
	<?php $this->BcBaser->metaKeywords() ?>

	<?php
	//OGP
	//=====================================
	$siteName = $siteConfig["name"];
	$siteUrl = $siteConfig["name"];
	$description = mb_substr( $siteConfig["description"] ,0, 297); //サイトの説明文297文字以内
	$title = $this->BcBaser->getTitle(); //ページタイトル95文字以内
	$type ="website"; //記事はarticle, それ以外(HOME、固定ページ）はwebsite
	$url =$this->BcBaser->getUri($this->BcBaser->getHere());
	$publisher = ""; //著者のFacebookページURLかID。FacebookページのFollowボタンを表示できるようになる。
	$fb_id = "";       //FacebookのAPP ID
	$author = "@d-qvic";      //Twitter Cardに表示されるアカウント名
	$domain = "d-qvic.co.jp";       //Twitter Cardに表示されるドメイン名
	$eyeCatch = "/theme/d-qvic/img/common/ogp_img.png"; //デフォルトの画像をフルパス指定（アイキャッチが無い場合）
	//ブログ記事の場合はアイキャッチ画像を出力
	if (!empty($post)) {
		$type ="article";
		$num = 297; //説明文の文字数制限（本文から抜き出し）
		$str = strip_tags($post[‘BlogPost’][‘detail’]); //タグ除去
		$str = str_replace(array("\r\n","\n","\r"), ”, $str); //改行除去
		if(mb_strlen($str) >= $num) {
			$description = mb_substr($str, 0,$num-1)."…";
		} else {
			$description = $str;
		}
		//タイトルにはサイトタイトルを含めない
		$title = $this->Blog->getPostTitle($post,false)." – ".$siteConfig["formal_name"]; //ページタイトル95文字以内
		$blogName = $post["BlogContent"]["name"];
		$baseCurrentUrl = "/".$blogName . ‘/archives/’;
		$baseCurrentImgUrl = "/files/blog/".$blogName . "/blog_posts/";
		$eyeCatch = $this->BcBaser->getUri( $baseCurrentImgUrl . $post["BlogPost"]["eye_catch"]);
	}
	?>
	<meta property="article:publisher" content="<?php echo $publisher; ?>">
	<meta property="og:type" content="<?php echo $type; ?>">
	<meta property="og:locale" content="ja_JP">
	<meta property="og:site_name" content="<?php echo $siteName; ?>">
	<meta property="og:title" content="<?php echo $title; ?>">
	<meta property="og:description" content="<?php echo $this->BcBaser->getDescription() ?>">
	<meta property="og:url" content="<?php echo $url; ?>">
	<meta property="og:image" content="<?php echo $eyeCatch; ?>">
	<meta property="fb:app_id" content="<?php echo $fb_id; ?>">
	<?php // Twitter Cardsの種類指定 ?>
	<meta name="twitter:card" content="summary_large_image">
	<?php // 写真左上 ：「アカウント名」の表記（無くてもOK） ?>
	<meta name="twitter:site" content="<?php echo $author; ?>">
	<?php // by (投稿者) ：写真下の 「By アカウント名 @TwitterID 」（無くてもOK）?>
	<meta name="twitter:creator" content="<?php echo $author; ?>">
	<meta name="twitter:domain" content="<?php echo $domain; ?>">
	<meta name="twitter:url" content="<?php echo $url; ?>">
	<meta name="twitter:title" content="<?php echo $title; ?>">
	<meta name="twitter:description" content="<?php echo $this->BcBaser->getDescription() ?>">
	<meta name="twitter:image" content="<?php echo $eyeCatch; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<?php $this->BcBaser->icon() ?>
	<?php $this->BcBaser->rss('ニュースリリース RSS 2.0', '/news/index.rss') ?>
	<link rel="stylesheet" href="<?php $this->BcBaser->themeUrl() ?>css/style.css"/>
	<script src="<?php $this->BcBaser->themeUrl() ?>js/bundle.js"></script>
	<?php $this->BcBaser->scripts() ?> 
	<?php $this->BcBaser->googleAnalytics() ?>
</head>


<body<?php if ($this->BcBaser->isHome()): ?> class="index"<?php endif ?>>
	<?php $this->BcBaser->header() ?>

	<?php if (!$this->BcBaser->isHome()): ?>
		<aside class="breadcrumb">
			<nav class="container">
				<?php $this->BcBaser->crumbsList(); ?>
			</nav>
		</aside>
	<?php endif ?>

	<?php if ($this->BcBaser->isHome()): ?>
		<?php $this->BcBaser->flash() ?>
		<div class="indexContents">
			<div class="contaierVisual">
				<div class="mainVisual">
					<h2 class="hlMainVisual"><img src="<?php $this->BcBaser->themeUrl() ?>img/index/title_copy.gif" alt="Quality and Vitality of our region, improved with Information and Communication Technology"></h2>
					<div class="mainVisualList">
						<?php $this->BcBaser->mainImage(array('num' => 1, 'link' => false, 'class' => 'mainVisual01')) ?>
						<?php $this->BcBaser->mainImage(array('num' => 2, 'link' => false, 'class' => 'mainVisual02')) ?>
						<?php $this->BcBaser->mainImage(array('num' => 3, 'link' => false, 'class' => 'mainVisual03')) ?>
						<?php $this->BcBaser->mainImage(array('num' => 4, 'link' => false, 'class' => 'mainVisual04')) ?>
						<?php $this->BcBaser->mainImage(array('num' => 5, 'link' => false, 'class' => 'mainVisual05')) ?>
					</div>
				</div>
			</div>
			<div class="container">
				<section class="secTopNews">
					<div class="hTitleNewsBox">
						<h2 class="hTitleNews">ニュースリリース</h2>
					</div><!-- /hTitleNews -->
					<div class="articleTopNews">
						<?php $this->BcBaser->blogPosts('news', 3) ?>
					</div><!-- /articleTopNews -->
				</section>
				<?php $this->BcBaser->content() ?>
			</div>
		</div><!-- /indexContents -->
	<?php else: ?>
		<article class="contents contents<?php echo $this->BcBaser->getContentsName(true) ?>">
		<?php $this->BcBaser->content() ?>
		</article>
	<?php endif ?>


	<?php $this->BcBaser->footer() ?>
	<?php $this->BcBaser->func() ?>
</body>
</html>
