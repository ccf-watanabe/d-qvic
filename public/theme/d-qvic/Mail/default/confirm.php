<?php
/**
 * メールフォーム確認ページ
 * 呼出箇所：メールフォーム
 */
if ($freezed) {
	$this->Mailform->freeze();
}
?>

<div class="hlTitle">
	<h2><?php $this->BcBaser->contentsTitle() ?></h2>
</div>
<div class="container">
	<section class="secArea">
		<?php if ($freezed): ?>
		<h3 class="hlSecTitle">入力内容の確認</h3>
		<div class="contentsCenter">
			<p>入力した内容に間違いがなければ「送信する」ボタンをクリックしてください。</p>
		</div><!-- /contentsCenter -->
		<?php $this->BcBaser->flash() ?>
		<?php $this->BcBaser->element('mail_form') ?>
		<?php else: ?>
		<h3 class="hlSecTitle">入力エラー</h3>
		<?php $this->BcBaser->flash() ?>
		<?php $this->BcBaser->element('mail_form') ?>
		</section>
		<?php endif ?>
	</section>
</div>
