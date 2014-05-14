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
      otherwise({
        redirectTo: '/products'
      });
  }]);