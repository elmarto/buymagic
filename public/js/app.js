var productcatApp = angular.module('productcatApp', [
	'ngRoute',
	'productcatControllers'
]);

productcatApp.config(['$routeProvider',
	function($routeProvider) {
		$routeProvider.
			when('/products', {
				templateUrl: 'partials/product-list.html',
				controller: 'ProductListCtrl'
			}).
			when('/products/:productId', {
				templateUrl: 'partials/product-detail.html',
				controller: 'ProductDetailCtrl'
			}).
			when('/cart', {
				templateUrl: 'partials/cart.html',
				controller: 'CartCtrl'
			}).
			when('/checkout', {
				templateUrl: 'partials/checkout.html',
				controller: 'CartCtrl'
			}).
			when('/login', {
				templateUrl: 'partials/login.html',
				controller: 'LoginCtrl'
			}).
			otherwise({
				redirectTo: '/products'
			});
	}
]);