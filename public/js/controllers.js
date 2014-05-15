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

productcatControllers.controller('CartCtrl', 
	['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
		
	}]
);

productcatControllers.controller('CartController', 
	['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
		/*$http.get('/db/products/'+$routeParams.productId).success(function(data){
			$scope.product=data[0];
		});*/
		$scope.addProductToCart=function(o){
			$this=$(o.target);
			var pid=$this.data("pid");
			var quant=parseFloat($("#quantity-"+pid).val());

			$.ajax({
				url: '/cart',
				type:'POST',
				data: { pid: pid, quantity: quant },
				success: function(data) {
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