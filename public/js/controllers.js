var productcatControllers = angular.module('productcatControllers', []);

//Main Controller
productcatControllers.controller('MainCtrl', function($scope, $location, $rootScope, $http, $location, Upload, Auth, User, Question, Category, Serie, Record, Location, Popup, Process, Card, Question) {
  $scope.$on('authLoaded', function() {
		//$scope.isExpert($scope.main.serieId);
		//$scope.isMember($scope.main.serieId);
	});
 /*
	$scope.loadAuth = function() {
		Auth.load().success(function(data) {
			$scope.main.user = data.user;
			$scope.$broadcast("authLoaded");
			Popup.close();
		});
	}
  
  
	$scope.logoutUser = function() {
		Auth.logout().success(function(data) {
			console.log("You have been logged out.");
			$scope.main.user = {};
		});
	}
 
	$scope.loginUser = function() {
		Auth.login({
			username: $scope.main.credentials.email,
			password: $scope.main.credentials.password
		}).success(function(data) {
			if (data.error) {
				toastr.error(data.error);
			} else {
				console.log("You are signed in!");
				$scope.loadAuth();
				$scope.main.credentials = {};
				Popup.close();
			}
		});
	}
 
	$scope.registerUser = function() {
		Auth.register({
			serie_id: $scope.main.serieId,
			email: $scope.newUser.email,
			password: $scope.newUser.password,
			terms: $scope.newUser.terms,
			name: $scope.newUser.name,
		}).success(function(data) {
			if (data.error) {
				toastr.error(data.error);
			}
 
			if (data.success) {
				console.log("Welcome to " + $scope.main.serie.name + "!");
				$scope.loadAuth();
				$scope.newUser = {};
				Popup.close();
			}
		});
	}
 	
 	$scope.loadAuth();
	$scope.loadSerie();
	*/
});

//Product List Controller
productcatControllers.controller('ProductListCtrl', function ($scope, $http) {
	$http.get('/db/products').success(function(data){
		$scope.products=data;
	});
});

//Product List AddToCart Controller
productcatControllers.controller('CartController', 
	['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
		/*$http.get('/db/products/'+$routeParams.productId).success(function(data){
			$scope.product=data[0];
		});*/
		$scope.addProductToCart=function(o){
			$this=$(o.target);
			var pid=$this.data("pid");
			var quant=parseInt($("#quantity-"+pid).val());

			$.ajax({
				url: '/cart',
				type:'POST',
				data: { pid: pid, quantity: quant, action:'add' },
				success: function(data) {
				},
				error:function(){
					$("#cart-cant").html(parseFloat($("#cart-cant").html())-quant);
				}
			});

			var product_image_cont = $this.parents('article').find('.block.image');
			//Effect
			var addEffect=$("<div>")
			        .attr('id','demo1')
			        .css('width',product_image_cont.css('width'))
			        .css('height',product_image_cont.css('height'))
			        .css('position','absolute')
			        .css('background-size','contain')
			        .css('background-repeat','no-repeat')
			        .css('background-position','center')
			        //.css('background-color','orange')
			        //.css('border-radius','100%')
			        .css('background-image',product_image_cont.css('background-image'));
			        

			$this.parent().append(addEffect);
			var page_width=parseFloat($('body').css('width'));
			$(addEffect)
			  /*.css('top',$this.position().top)
			  .css('left',$this.position().left)
			  .css('margin-top','5px')
			  .css('margin-left','30px')*/
			  .css('top',product_image_cont[0].offsetTop)
			  .css('left',product_image_cont[0].offsetLeft)
			  .animate({
				  'top': window.pageYOffset+'px',
				  'left': (page_width/2+page_width*29/100)+'px',
				  'width': '50px',
				  'height': '50px',
				  'opacity':'0.5'
				},500,'linear',function(){

					$('#fixedMenu').animate({'width':'+=10px','margin-left':'-=5px'},75,'swing',function(){
						$('#fixedMenu').animate({'width':'-=10px','margin-left':'+=5px'},75,'swing',function(){
							$("#cart-cant").html(parseFloat($("#cart-cant").html())+quant);
							$('#fixedMenu').attr('style','');
							
						});
					});
					$(this).remove()});
					
			};
		
	}]
);

//Product Detail Controller
productcatControllers.controller('ProductDetailCtrl', 
	['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
		$http.get('/db/products/'+$routeParams.productId).success(function(data){
			$scope.product=data[0];
		});
	}]
);

//Cart & Checkout Controller
productcatControllers.controller('CartCtrl', 
	['$scope', '$http', function($scope, $http) {
		$http.get('/cart').success(function(cart){
			$scope.products=cart.products;
			$scope.subtotal=cart.subtotal;
			$scope.total=cart.subtotal;

			$scope.updateQuantityPrices=function($event){
				var pid=$event.product.id;
				var quant=parseInt($("#quantity-"+pid).val());

				$.ajax({
					url: '/cart',
					type:'POST',
					data: { pid: pid, quantity: quant, action:'set' },
					success: function(cart) {
						$scope.$apply(function(){
							$scope.products=cart.products;
							$scope.subtotal=cart.subtotal;
							$scope.total=cart.subtotal;
						});
					},
					error:function(){
						$("#cart-cant").html(parseFloat($("#cart-cant").html())-quant);
					}
				});
			};

			$scope.pay=function($event){
				$http.get('/checkout').success(function(mp){
					window.top.location.href=mp.sandbox_init_point;
				});
			}
		});
		
	}]
);

//Login Controller
productcatControllers.controller('loginCtrl', ['$scope','loginService', function ($scope,loginService) {
	$scope.msgtxt='';

	var input={};
	input.email		= $('#email').val();
	input.password	= $('#password').val();
	
	$scope.login=function(data){
		loginService.login(data,$scope); //call login service
	};
}]);

/*//Login Controller
productcatControllers.controller('LoginCtrl', 
	['$scope', '$routeParams', '$http', '$location', function($scope, $routeParams, $http, $location) {

		$scope.loginButtonHandler=function($event){
			$event.preventDefault();
			
			var input={};
			input.email		= $('#email').val();
			input.password	= $('#password').val();

			$http.post('/db/login',input).success(function(data){
				$('.user').html('Bienvenido '+data.name);
				$location.url('/');
			});
		}
		
	}]
);*/

