var productcatControllers = angular.module('productcatControllers', []);
 
productcatControllers.controller('ProductListCtrl', function ($scope, $http) {
	$http.get('demo/products.json').success(function(data){
		$scope.products=data;
	});
});

productcatControllers.controller('ProductDetailCtrl', 
	['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
		$http.get('demo/'+$routeParams.productId+'.json').success(function(data){
			$scope.product=data;
		});
	}]
);