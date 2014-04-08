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

productcatControllers.controller('CartController', 
	['$scope', '$routeParams', '$http', function($scope, $routeParams, $http) {
		/*$http.get('/db/products/'+$routeParams.productId).success(function(data){
			$scope.product=data[0];
		});*/
		$scope.addProductToCart=function(o){
			$this=$(o.target);
			var id=$this.data("pid");
			var quant=parseFloat($("#quantity-"+id).val());

			/*$.ajax({
			  url: 'session.php',
			  type:'POST',
			  data: { method:'add', pid: id, quant: quant },
			  success: function(data) {
			  }
			});*/

			//Effect
			var addEffect=$("<div>")
			        .attr('id','demo1')
			        .css('width','10px')
			        .css('height','10px')
			        .css('position','absolute')
			        .css('background-size','contain')
			        .css('background-repeat','no-repeat')
			        .css('background-position','center')
			        //.css('background-color','orange')
			        //.css('border-radius','100%')
			        .css('background-image',$this.parents('article').find('.block.image').css('background-image'));
			        

			$this.parent().append(addEffect);
			var page_width=parseFloat($('body').css('width'));
			$(addEffect)
			  .css('top',$this.position().top)
			  .css('left',$this.position().left)
			  .css('margin-top','5px')
			  .css('margin-left','30px')
			  .animate({
				  'top': window.pageYOffset+'px',
				  'left': (page_width/2+page_width*29/100)+'px',
				  'width': '50px',
				  'height': '50px',
				  'opacity':'0.5'
				},700,'linear',function(){
				  $("#cart-cant").html(parseFloat($("#cart-cant").html())+quant);
				  $(this).remove()});
			};
		
	}]
);