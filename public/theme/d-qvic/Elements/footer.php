<?php
/**
 * フッター
 *
 * BcBaserHelper::footer() で呼び出す
 * （例）<?php $this->BcBaser->footer() ?>
 */
?>
<footer>
	<div class="pagetop"><a href="#top"><i class="fa fa-chevron-up"></i></a></div>
	<ul class="fNav-menu">
		<li class="nav-item menu-content"><a href="<?php $this->BcBaser->baseUrl(); ?>">トップページ</a></li>
		<li class="nav-item menu-content"><a href="<?php $this->BcBaser->baseUrl(); ?>company">会社概要</a></li>
		<li class="nav-item menu-content"><a href="<?php $this->BcBaser->baseUrl(); ?>data">情報活用事業</a></li>
		<li class="nav-item menu-content"><a href="<?php $this->BcBaser->baseUrl(); ?>media">メディア事業</a></li>
		<li class="nav-item menu-content"><a href="<?php $this->BcBaser->baseUrl(); ?>privacy">個人データ安全管理方針</a></li>
		<li class="nav-item menu-content"><a href="<?php $this->BcBaser->baseUrl(); ?>sharedprivacy">情報の共同利用について</a></li>
		<li class="nav-item menu-content"><a href="<?php $this->BcBaser->baseUrl(); ?>sns">SNS利用規約</a></li>
		<li class="nav-item menu-content"><a href="<?php $this->BcBaser->baseUrl(); ?>policy">プライバシーポリシー</a></li>
	</ul>
	<div class="fCompany">
		<p class="shopName">株式会社データ・キュービック</p>
		<dl class="fAddress">
			<dt>住所</dt>
			<dd>山口県下関市竹崎町四丁目2番36号</dd>
			<dt>電話番号</dt>
			<dd><span class="telLink">083-227-2902</span>（平日9:00~17:00）</dd>
		</dl>
	</div>
	<ul class="fBnr">
		<li class="fBnr-ymfg"><a href="http://www.ymfg.co.jp/" target="_blank"><img src="<?php $this->BcBaser->themeUrl() ?>img/common/logo_footer.png" alt="YMFG - Yamaguchi Financial Group"></a></li>
		<li class="fBnr-yamaguchibank"><a href="https://www.yamaguchibank.co.jp/" target="_blank"><img src="<?php $this->BcBaser->themeUrl() ?>img/common/img_visual_yamagin.png" alt="山口銀行"></a></li>
		<li class="fBnr-momijibank"><a href="https://www.momijibank.co.jp/" target="_blank"><img src="<?php $this->BcBaser->themeUrl() ?>img/common/img_visual_momizi.png" alt="もみじ銀行"></a></li>
		<li class="fBnr-kitakyushubank"><a href="https://www.kitakyushubank.co.jp/" target="_blank"><img src="<?php $this->BcBaser->themeUrl() ?>img/common/img_visual_kita.png" alt="北九州銀行"></a></li>
	</ul>
	<p class="fCopy"><small>copyrighit 2018 dataqvic.inc all righits reserved.</small></p>
</footer>
