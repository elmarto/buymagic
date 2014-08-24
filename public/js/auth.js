productcatApp.factory('Auth',function($http, $location, Session){
	var auth = {};
	
	//Login
	auth.login = function(input,callback){
		$http.post('/db/login',input).then(function(res){
			if(res.data.success){		
				var user = res.data.user;
				Session.create(1,user.email, user.name, user.role);
				$location.path('/');
				if(callback) callback();
			}
		});
	};

	auth.register = function(input,callback){
		$http.post('/db/register',input).then(function(res){		
			if(res.data.success){				
				var user = res.data.user;
				Session.create(1,user.email, user.name, user.role);
				$location.path('/');
				if(callback) callback();
			}		   
		});

	};

	//Logout
	auth.logout=function(callback){
		$http.get('/db/logout').then(function(res){
			console.log(res);
			if(res.data.success){
				Session.destroy();
				$location.path('/');
				if(callback) callback();
			}
		});
	};

	//Check if is logged
	auth.islogged=function(callback){
		$http.post('/db/islogged').then(function(res){
			if(res.data.success){
				var user = res.data.user;
				Session.create(1,user.email, user.name, user.role);
			} else {
				Session.destroy();
			}
			if(callback) callback(res.data.success);
		});
	};
	
	return auth;

})

.service('Session', function () {

	this.create = function (id, email, name, role) {
		this.id 	= id;
		this.email 	= email;
		this.name 	= name;
		this.role 	= role;

		return this;
	};

	this.destroy = function () {
		this.id 	= null;
		this.email 	= null;
		this.name 	= "Invitado";
		this.role 	= "guest";

		return this;
	};

	return this;

});

productcatApp.directive('googleplace', function() {
	var types = [];
	var componentRestrictions = { country: 'ar' };

    return {
        require: 'ngModel',
        link: function(scope, element, attrs, model) {
            var options = {
                types: [],
                componentRestrictions: {}
            };
            scope.gPlace = new google.maps.places.Autocomplete(element[0], options);
 
            google.maps.event.addListener(scope.gPlace, 'place_changed', function() {
                scope.$apply(function() {
                    model.$setViewValue(element.val());                
                });
            });
        }
    };
});