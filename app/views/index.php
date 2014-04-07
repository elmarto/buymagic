
<!doctype html>
<html class="no-js" lang="en" ng-app="productcatApp">
<head>
	<meta charset="utf-8">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<title>buyMagic</title>
	<meta name="description" content="buy magic the gathering cartas cards sobres boosters box">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

	<script src="js/libs/modernizr-2.5.3.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-route.min.js"></script>
	<script src="js/app.js"></script>
	<script src="js/controllers.js"></script>
	<script src="js/shadowbox.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/shadowbox.css">
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="stylesheet" type="text/css" href="css/tablet.css" media="screen and (max-width: 800px)" />
	<link rel="stylesheet" type="text/css" href="css/phone.css"  media="screen and (max-width: 480px)" />
</head>
<body>
	<!--[if lt IE 7]><p class=chromeframe>¡Tu browser es <em>antiguo</em>! <a href="http://browsehappy.com/">¡Cambialo ahora!</a> o <a href="http://www.google.com/chromeframe/?redirect=true">instala Google Chrome Frame</a> para explorar este sitio.</p><![endif]-->
	<div id="wrapper">
		<div class="fixedMenu" id="fixedMenu">
			<span class="cart-cant" id="cart-cant">0</span>
		</div>
		<header>
			<div class="logo"><h1>buyMagic</h1></div>
		</header>

		<div role="main" class="main" ng-view></div>

		<footer>
			Preguntas Frecuentas | Ayuda | Contacto
		</footer>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>

	<script>
	/*var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));*/
</script>
</body>
</html>