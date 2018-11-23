export function module_common() {
	
	$(function() {

		//gNavのメニューの数を取得しメニューの横幅を設定
		//var navNum = $('.gNav .nav-menu > li').length;
		//$('.gNav .nav-menu > li').css('flexBasis', 100 / navNum + '%');

		//固定ページタイトル帯
		$('.hlTitle').prependTo('.contents');
		
		//--------------------------------------------------------
		// Resize Event
		//--------------------------------------------------------
		commonResize();

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
					commonResize();

					// 次回以降使えるようにリサイズ後の幅・髙さをウインドウ幅に設定する
					winWidth = $(window).width();
					winHeight = $(window).height();
				}
			}, 200);
		});

		//共通リサイズイベント
		function commonResize() {
			//timerをクリア、countをリセット
			clearTimeout(timer);
			count = 0;
			
			//ヘッダー高さを取得
			var headerHeight = $('header').outerHeight();

			//ヘッダー高さを取得して、コンテンツ上部に余白設置
			$('.indexContents, body:not(.index)').css('paddingTop', headerHeight);

			//header下にシャドウ用クラス付与
			$(window).on('load scroll', function () {
				if ($(this).scrollTop() > headerHeight) {
					$('header').addClass('headerLine');
				} else {
					$('header').removeClass('headerLine');
				}
			});

			if(window.innerWidth >= 1000) {
				//gNavのメニューの横幅を設定
				//$('.gNav .nav-menu > li').css('flexBasis', 100 / navNum + '%');
				//メニュー項目をPC表示位置に移動
				$('.nav-menu-box').insertAfter('.btnSpMenu').show();
				//SPメニュー表示時の背景固定用クラスを削除
				$('body').removeClass('fixed');
				//メニューをマウスオーバーでサブメニュー表示
				$('.nav-item').hover(function() {
					$(this).children('.nav-menu-sub').stop().slideDown(300);
				}, function() {
					$(this).children('.nav-menu-sub').stop().slideUp(300);
				});

			} else {
				
				//gNavのメニューの横幅を設定
				//$('.gNav .nav-menu > li').css('flexBasis', '100%');
				//メニュー項目をSP表示位置に移動
				$('.nav-menu-box').hide().insertBefore('header');
				//サブメニューのマウスオーバー操作を無効に
				$('.nav-item').off('mouseenter mouseleave');
				//gNavのメニューの固定を解除
				$(window).on('load scroll', function () {
					$('header').removeClass('fixed');
					$('header').css('height', 'auto');
				});

				//Mobile Menu
				var state = false;
				var scrollpos;

				$('.btnSpMenu, .btnCloseMenu, .spMenuOverflow, a[href*="#"]:not(.pagetop a)').on('click', function(event){
					//event.preventDefault();

					if(state == false) {
						// 背景コンテンツ固定
						scrollpos = $(window).scrollTop();
						$('body').addClass('fixed').css({'top': -scrollpos});
						// グローバルメニュー表示
						$('.nav-menu-box').fadeIn(200);
						$('.nav-menu-boxInner').addClass('openMenu');
						state = true;
					} else {
						// 背景コンテンツ固定 解除
						$('body').removeClass('fixed').css({'top': 0});
						window.scrollTo( 0 , scrollpos );
						// グローバルメニュー非表示
						$('.nav-menu-box').fadeOut(200);
						$('.nav-menu-boxInner').removeClass('openMenu');
						state = false;
					}
				});
			}
		} //commonResize


		//--------------------------------------------------------
		// スマホ時電話番号にリンク
		//--------------------------------------------------------
		var ua = navigator.userAgent;
		if(ua.indexOf('iPhone') > 0 && ua.indexOf('iPod') == -1 || ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0 && ua.indexOf('SC-01C') == -1 && ua.indexOf('A1_07') == -1 ){
			$('.telLink').each(function(){
				var str = $(this).text();
				$(this).html($('<a>').attr('href', 'tel:' + str.replace(/-/g, '')).append(str + '</a>'));
			});
		}


		//--------------------------------------------------------
		// スマホ時に hover の挙動をさせない
		//--------------------------------------------------------
		var touch = 'ontouchstart' in document.documentElement
		|| navigator.maxTouchPoints > 0
		|| navigator.msMaxTouchPoints > 0;

		if (touch) { // remove all :hover stylesheets
			try { // prevent exception on browsers not supporting DOM styleSheets properly
				for (var si in document.styleSheets) {
					var styleSheet = document.styleSheets[si];
					if (!styleSheet.rules) continue;

					for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
						if (!styleSheet.rules[ri].selectorText) continue;

						if (styleSheet.rules[ri].selectorText.match(':hover')) {
							styleSheet.deleteRule(ri);
						}
					}
				}
			} catch (ex) {}
		}


		//--------------------------------------------------------
		// PAGETOP
		//--------------------------------------------------------
		var topBtn = $('.pagetop');
		topBtn.hide();
		$(window).scroll(function () {
			if ($(this).scrollTop() > 160) {
				topBtn.fadeIn();
			} else {
				topBtn.fadeOut();
			}
		});

		//スクロールしてトップ
		topBtn.click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1500,'easeInOutQuart');
			return false;
		});
	});
	
}
