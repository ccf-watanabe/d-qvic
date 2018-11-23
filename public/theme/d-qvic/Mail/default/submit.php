<?php
/**
 * メールフォーム送信完了ページ
 * 呼出箇所：メールフォーム
 */
if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']) {
	$this->Html->meta(array('http-equiv' => 'Refresh'), null, array('content' => '5;url=' . $mailContent['MailContent']['redirect_url'], 'inline' => false));
}
?>

<div class="hlTitle">
	<h2><?php $this->BcBaser->contentsTitle() ?></h2>
</div>
<div class="container">
	<section class="secArea">
		<h3 class="hlSecTitle">メール送信完了</h3>
		<div class="contentsCenter">
			<p>お問い合わせ頂きありがとうございました。<br />
			確認次第、ご連絡させて頂きます。</p>
			<?php if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']): ?>
			<p>※5秒後にトップページへ自動的に移動します。</p>
			<p><a href="<?php echo $mailContent['MailContent']['redirect_url']; ?>">移動しない場合はコチラをクリックしてください。≫</a></p>
			<?php endif; ?>
		</div><!-- /contentsCenter -->
	</section>
</div>



