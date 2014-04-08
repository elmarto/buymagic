var productcatControllers = angular.module('productcatControllers', []);
 
productcatControllers.controller('ProductListCtrl', function ($scope, $http) {
	$http.get('/db/products').success(function(data){
		$scope.products=data;
	});
});

productcatControllers.controller('ProductDetailCtrl', 
	['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
		$http.get('/db/products/'+$routeParams.productId).success(function(data){
			$scope.product=data[0];
		});
	}]
);