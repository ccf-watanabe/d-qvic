export function module_index() {

	$(function() {
		topContents();

		var timer = false;
		var count = 0;
		var winWidth = $(window).width();
		var winHeight = $(window).height();
		var winWidth_resized;
		var winHeight_resized;

		$(window).on("resize", function() {
			// リサイズ後の放置時間が指定ミリ秒以下なら何もしない(リサイズ中に何度も処理が行われるのを防ぐ)
			if (timer !== false) {
				clearTimeout(timer);
			}

			// 放置時間が指定ミリ秒以上なので処理を実行
			timer = setTimeout(function() {
				// リサイズ後のウインドウの横幅・高さを取得
				winWidth_resized = $(window).width();
				winHeight_resized = $(window).height();

				// リサイズ前のウインドウ幅・髙さとリサイズ後のウインドウ幅・髙さが異なる場合
				if ( winWidth != winWidth_resized || winHeight != winHeight_resized ) {
					topContents();

					// 次回以降使えるようにリサイズ後の幅・髙さをウインドウ幅に設定する
					winWidth = $(window).width();
					winHeight = $(window).height();
				}
			}, 200);
		});

		//リサイズ用関数
		function topContents() {
			//timerをクリア、countをリセット
			clearTimeout(timer);
			count = 0;

			//メインビジュアル高さを所得
			var mHeight = $('.mainVisual').height();

			if(window.innerWidth >= 1000) {
				$('.vegas-wrapper').css('height', mHeight);
				$('.vegas-wrapper .hlLogo img').css('max-height', '100%');
			} else {
				$('.vegas-wrapper').css('height', mHeight);
				$('.vegas-wrapper .hlLogo img').css('max-height', mHeight * 0.8);
			}
		}
		
		var bgimages = [];
		$('.mainVisualList img').each(function(){
			//メインビジュアルのsrcを取得
			var mainSrc = $(this).attr('src');
			//取得したsrcを配列に追加
			bgimages.push({
				src: mainSrc
			});
		});

		//vegas setting
		$('.mainVisual').vegas({
			autoplay: false,
			overlay: false,
			timer: true,
			transition: 'fade',
			transitionDuration: 1500,
			delay: 6000,
			animation: 'fade',
			slides: bgimages
		});
	});

}
