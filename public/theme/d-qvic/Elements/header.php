<?php
/**
 * ヘッダー
 *
 * BcBaserHelper::header() で呼び出す
 * （例）<?php $this->BcBaser->header() ?>
 */
?>

<header>
	<div class="hTop">
		<h1 class="hlLogo"><?php $this->BcBaser->logo(array('class' => 'logo')) ?></h1>
	</div>
	<nav class="gNav">
		<div class="btnSpMenu"><i class="fa fa-bars"></i></div>
		<div class="nav-menu-box">
			<div class="nav-menu-boxInner">
				<div class="btnCloseMenu"><i class="fa fa-times"></i></div>
				<?php $this->BcBaser->globalMenu(2, ['cache' => false]) ?>
			</div>
			<div class="spMenuOverflow">&nbsp;</div>
		</div>
	</nav>
</header>