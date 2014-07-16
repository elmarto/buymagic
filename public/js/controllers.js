"use strict";

var productcatControllers = angular.module('productcatControllers', []);

//Main Controller
productcatControllers.controller('MainCtrl', function($scope, $location, $rootScope, $http, Auth, Session) {
	Auth.islogged();
	$rootScope.user=Session;
});

//Product List Controller
productcatControllers.controller('ProductListCtrl', function($scope, $http) {
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
			var $this=$(o.target);
			var pid = $this.data("pid");
			var quant = parseInt($("#quantity-"+pid).val());
			var product_image_cont = $this.parents('article').find('.block.image');
			var page_width=parseFloat($('body').css('width'));
			var addEffect;

			$.ajax({
				url: '/cart',
				type:'POST',
				data: { pid: pid, quantity: quant, action:'add' },
				success: function(data) {
				},
				error:function(){
					$("#cart-cant").html(parseFloat($("#cart-cant").html())-quant);
					alert('Ha ocurrido un error. El producto no pudo ser agregado.');
				}
			});

			//Effect
			addEffect = $("<div>")
			        .attr('id','demo1')
			        .css('width',product_image_cont.css('width'))
			        .css('height',product_image_cont.css('height'))
			        .css('position','absolute')
			        .css('background-size','contain')
			        .css('background-repeat','no-repeat')
			        .css('background-position','center')
			        .css('background-image',product_image_cont.css('background-image'));
			$this.parent().append(addEffect);
			
			$(addEffect)
			  .css('top',product_image_cont[0].offsetTop)
			  .css('left',product_image_cont[0].offsetLeft)
			  .animate({
				  'top': window.pageYOffset+'px',
				  'left': (page_width/2+page_width*29/100)+'px',
				  'width': '44px',
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
productcatControllers.controller('LoginCtrl', ['$scope','Auth', function($scope,Auth) {
	$scope.login 	= {};
	$scope.register = {};
	$scope.loginButtonText='login';

	$scope.submitLoginButtonHandler=function($event){
		$event.preventDefault();
		Auth.login($scope.login,function(){
			$scope.updateLoginButtonText();
		});
	};

	$scope.logoutButtonHandler=function($event){
		Auth.logout();
	};

	$scope.loginButtonHandler=function($event){
		$event.preventDefault();
		$scope.updateLoginButtonText();
		$('#login-form').slideToggle(200);
	};

	$scope.updateLoginButtonText=function(){
		$scope.loginButtonText = ($scope.loginButtonText.match('ocultar'))? 'login' : 'ocultar login';
	};

}]);

//Register Controller
productcatControllers.controller('RegisterCtrl', 
	['$scope', '$routeParams', '$http', '$location','Auth', function($scope, $routeParams, $http, $location, Auth) {
		$scope.register={};

		$scope.submitRegisterButtonHandler=function($event){
			$event.preventDefault();
			Auth.register($scope.register);
		}
		
	}]
);

