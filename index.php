<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script src="js/raindrops.js" type="text/javascript"></script>
		<script src="js/semantic.min.js" type="text/javascript"></script>
		<link rel='stylesheet' href='http://localhost:8888/portfolio/css/semantic.min.css' type='text/css' />
		<script type="text/javascript">
			$(function(){
				// 波配置
				$('#wave').raindrops({
					color:'#fff',
					waveLength: 500,
					canvasWidth:window.parent.screen.width,
					canvasHeight:window.parent.screen.height * 1.61,
					rippleSpeed: 0.01,
					frequency: 1,
					density: 0,
					positionBottom:-1000
				});

				// 波追加
				$('canvas').animate(
					{bottom:0},
					{
						duration: 5000,
						easing: 'swing',
						complete: function(){
							// 白黒ロゴSET
							$('#wave').append('<div class="logo logo_black"><img src="img/logo_black.png"></div>');
							$('.logo_black').transition('horizontal flip', function(){
								// body変更
								$('body').css('background-image', 'none');
								// コンテンツ表示
								$('#contents').show();
								// 泡開始
								var baburu_up1 = $(document).height();
								var baburu_time1 = (baburu_up1 * 10) / 2;
								setInterval('baburu(' + baburu_time1 + ', ' + baburu_up1 + ')', baburu_time1);

								var baburu_up2 = $(document).height() / 2;
								var baburu_time2 = (baburu_up2 * 10) / 2;
								setInterval('baburu(' + baburu_time2 + ', ' + baburu_up2 + ')', baburu_time1);

								var baburu_up3 = $(document).height() / 3;
								var baburu_time3 = (baburu_up3 * 10) / 2;
								setInterval('baburu(' + baburu_time3 + ', ' + baburu_up3 + ')', baburu_time1);
							});
						}
					}
				);
			});			
			//泡
			function baburu(time, up_size){
				// 泡セット
				var baburu_number = baburu_set();
				// 泡移動
				baburu_move(baburu_number, time, up_size);
			}

			// 泡移動
			function baburu_move(baburu_number, time, up_size) {
				// 泡高さ
				var raindrops_up = up_size - 100;
				// 泡開始位地
				var window_height = $(document).height();
				// 位置指定
				$('.baburu' + baburu_number).offset(function(index, coords) {
					return {
						// 横配置 ランダム
						left: + baburu_number * 100,
						// 縦配置 固定
						top: window_height - 100
					};
				});
				// 泡アニメーション
				$('.baburu' + baburu_number).animate({
					marginTop: '-=' + raindrops_up + 'px'
				},
				{
					duration: time,
					complete:function() {
						// 指定位地に到達したら消す
						$('.baburu' + baburu_number).remove();
					}
				});
			}

			// 泡セット
			function baburu_set() {
				// 同じ泡を出さないように
				while(true) {
					var number = Math.round( Math.random() * 10);	
					if (!$('i').hasClass('.baburu' + number)) {
						break;
					}
				}
				$('#baburu').append('<i class="baburu' + number + '" style="display:inline-block; position:relative;"></i>');
				return number;
			}
		</script>
		<style type="text/css">
			body{
				margin:0;
				background: #333;
				background-image: url("img/logo.png");
				background-size: 320px;
				background-position: center 40%; 
				background-repeat: no-repeat;
				background-attachment: fixed;
				height: 100%;
			}
			#wave {
				width: 100%;
				height: 100% !important;
			}
			#contents{
				width: 100%;
				background-color: #fff;
				display:none;
			}
			i[class*="baburu"] {
				width: 30px;
				height: 30px;
				background-image: url("img/baburu.png");
				background-size: 30px;
			}
			.logo_black {
				position: absolute;
				top: 25%;
				left: 20%;
				right: 20%;
				margin: auto;
				width: 320px;
				display:none;
			}
			.logo_black > img {
				width: 100%;
			}

			i[class*="seaweed"] {
				display:inline-block; 
				position:relative;
				width: 100px;
				height: 100px;
				background-image: url("img/seaweed.png");
				background-size: 100px;
			}
			.profile {
				position: absolute;
				top: 40%;
				left: 15%;
				right: 15%;
				margin: auto;
				width: 70%!important;
			}
			
		</style>
	</head>
	<body>
		<div id="baburu" style="width: 100%; hegiht: 100%;">
			<section id="wave"></section>
			<section id="contents">
				<div class="ui" style="padding: 8em;">
					<div class="ui stackable very relaxed one column grid container">
						<div class="center aligned column" style="padding: 10px;">
							<h1 class="ui icon header">フリーランスのプログラマです。</h1>
							<p>会社員で７年間プログラマとしていろいろやってきました。</p>
						</div>
					</div>
				</div>
				<div class="ui community vertical segment"style="padding: 8em;">
					<div class="ui two column center aligned divided very relaxed stackable grid container">
						<div class="row">
							<div class="column">
								<h2 class="ui icon header">
									<img class="ui icon image" src="img/php.png" style="width: 80px;">
									PHP
								</h2>
								<p>結構できます。</p>
							</div>
							<div class="column">
								<h2 class="ui icon header">
									<img class="ui icon image" src="img/js.png" style="width: 80px;">
									Javascript
								</h2>
								<p>そこそこできます。</p>
							</div>
						</div>
					</div>
				</div>
				<div class="ui" style="padding: 8em;">
					<div class="ui stackable very relaxed one column grid container">
						<div class="center aligned column" style="padding: 10px;">
							<h1 class="ui icon header">このサイトは？</h1>
							<p>ここはマンタのポートフォリオサイトです。</p>
							<p>会社員で７年間プログラマをやってきました。このたび、フリーランスとして活動することになったのですが</p>
							<p>ふと気づくと自分が作ったものが手元になにもありません。仕事で作ったものしかないので紹介できるものがないのです。</p>
							<p>なのでまずはここから、初めてみようと思います。</p>
						</div>
					</div>
				</div>
			</section>
		</div>
	</body>
</html>
