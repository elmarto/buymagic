
<!doctype html>
<html class="no-js" lang="en" ng-app="productcatApp">
<head>
	<meta charset="utf-8">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<title>buyMagic</title>
	<meta name="description" content="buy magic the gathering cartas cards sobres boosters box">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/default.css" />
	<link rel="stylesheet" type="text/css" href="css/tablet.css" media="screen and (max-width: 800px)" />
	<link rel="stylesheet" type="text/css" href="css/phone.css"  media="screen and (max-width: 480px)" />
</head>
<body>
	<!--[if lt IE 7]><p class=chromeframe>¡Tu browser es <em>antiguo</em>! <a href="http://browsehappy.com/">¡Cambialo ahora!</a> o <a href="http://www.google.com/chromeframe/?redirect=true">instala Google Chrome Frame</a> para explorar este sitio.</p><![endif]-->
	<div id="wrapper">
		<a href="/#cart" class="fixedMenu" id="fixedMenu">
			<span class="cart-cant" id="cart-cant">0</span>
		</a>
		<header>
			<div class="logo"><h1>buyMagic</h1></div>
		</header>

		
		<div role="main" class="main">
			<section id="product-container" class="product-detail" ng-view></section>
			<aside>
				
				<h3>Formas de Pago</h3>

				<p><span class="mercadopago"></span></p>
				
				<ul class="payment-methods card">
					<li class="visa">Visa <span>12x</span></li>	
					<li class="master">Mastercard <span>12x</span></li>	
					<li class="amex">American Express <span>12x</span></li>	
					<li class="naranja">Naranja <span>12x</span></li>	
					<li class="nativa">Nativa Mastercard <span>12x</span></li>	
					<li class="tarshop">Tarjeta Shopping <span>12x</span></li>	
					<li class="cencosud">Cencosud <span>12x</span></li>	
					<li class="cabal">Cabal <span>12x</span></li>	
					<li class="argencard">Argencard <span>12x</span></li>	
					<li class="diners">Diners <span>12x</span></li>
				</ul>
				<ul class="payment-methods paypoints">
					<li class="rapipago">Rapipago <span>1x</span></li>	
					<li class="banelco">Banelco <span>1x</span></li>	
					<li class="bapropagos">Provincia Pagos <span>1x</span></li>
					<li class="redlink">RedLink <span>1x</span></li>	
					<li class="pagofacil">Pago Fácil <span>1x</span></li>	
				</ul>

				<h3>Zonas de Envío</h3>


			</aside>
			<div class="clear"></div>
		</div>

		

		<footer>
			Preguntas Frecuentas | Ayuda | Contacto
		</footer>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular-route.min.js"></script>
	<script src="js/app.js"></script>
	<script src="js/controllers.js"></script>
	<script>
		/*var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));*/
	</script>
</body>
</html>