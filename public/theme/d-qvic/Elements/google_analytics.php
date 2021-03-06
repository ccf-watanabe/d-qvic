<?php
/**
 * Google Analytics トラッキングコード
 * 呼出箇所：全ページ
 *
 * $this->BcBaser->googleAnalytics() で呼び出す
 */
?>


<?php if (!empty($siteConfig['google_analytics_id'])): ?>
<script>
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', '<?php echo $siteConfig['google_analytics_id'] ?>']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>
<?php endif; ?>
