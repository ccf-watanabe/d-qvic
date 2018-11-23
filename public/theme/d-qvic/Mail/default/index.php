<?php
/**
 * メールフォーム
 * 呼出箇所：メールフォーム
 */
?>


<div class="hlTitle">
	<h2><?php $this->BcBaser->contentsTitle() ?></h2>
</div>
<div class="container">
	<section class="secArea">
		<h3 class="hlSecTitle">フォームからのお問い合わせ</h3>
		<?php if ($this->Mail->descriptionExists()): ?>
			<div class="mail-description"><?php $this->Mail->description() ?></div>
		<?php endif ?>
		
		<?php $this->BcBaser->flash() ?>
		<?php $this->BcBaser->element('mail_form') ?>
	</section>
</div>