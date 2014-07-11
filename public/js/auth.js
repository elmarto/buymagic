productcatApp.factory('loginService',function($http, $location, sessionService){
	return{
		login:function(data,scope){
			var $promise=$http.post('/db/login',data); //send data to user.php
			$promise.then(function(msg){
				var uid=msg.data;
				if(uid){
					//scope.msgtxt='Correct information';
					//sessionService.set('uid',uid);
					$location.path('/');
				}	       
				else  {
					scope.msgtxt='incorrect information';
					$location.path('/login');
				}				   
			});
		},
		logout:function(){
			//sessionService.destroy('uid');
			$location.path('/login');
		},
		islogged:function(){
			var $checkSessionServer=$http.post('/db/islogged');
			return $checkSessionServer;
			/*
			if(sessionService.get('user')) return true;
			else return false;
			*/
		}
	}

});
/*
services.factory('Auth', function($http){
  return {
	    load: function() {
			return $http.get('/db/auth');
		},
	    logout: function() {
			return $http.get('/db/logout');
		},
		login: function(inputs) {
			return $http.post('/db/login',input);
		},
		register: function(inputs) {
			return $http.post('/db/register',input);
		},
		check: function() {
			return $http.post('/db/check',input);
		}
	}
});*/