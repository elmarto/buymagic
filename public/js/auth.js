productcatApp.factory('Auth',function($http, $location, Session){
	var auth = {};
	
	//Login
	auth.login = function(data,scope){
		
		$http.post('/db/login',data).then(function(res){		
			
			if(res.data.success){				
				Session.create(1,res.data.email,res.data.name);
				$location.path('/');
				console.log('si');
			} else {
				scope.msgtxt='incorrect information';
				console.log('no');
			}				   
		});

	};

	//Logout
	auth.logout=function(){
		$http.post('/db/logout',data).then(function(res){
			Session.destroy();
			$location.path('/login');
		});
	};

	//Check if is logged
	auth.islogged=function(){
		var $checkSessionServer=$http.post('/db/islogged');
		
		if(Session.create('user')) 
			return true;
		else 
			return false;
		
		return $checkSessionServer;
	};
	
	return auth;

})

.service('Session', function () {

	this.create = function (sessionId, email, name, role) {
		this.id 	= sessionId;
		this.email 	= email;
		this.name 	= name;
		this.role 	= role;
	};

	this.destroy = function () {
		this.id 	= null;
		this.email 	= null;
		this.name 	= "Invitado";
		this.role 	= "guest";
	};

	return this;

});