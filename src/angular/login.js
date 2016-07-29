angular.module('login', ['conf'])
.config(['$stateProvider', '$urlRouterProvider', 'constant', function($stateProvider, $urlRouterProvider, constant) {

    $urlRouterProvider.otherwise('/welcome');

    $stateProvider
    .state('welcome', {
        url: '/welcome',
        views: {
            main: {
                templateUrl: constant.baseUrl + '/welcome/view/welcome',
                controller: 'WelcomeCtrl as welcome'
            }
        }
    })
    .state('login', {
        url: '/login',
        views: {
            main: {
                templateUrl: constant.baseUrl + '/welcome/view/login',
                controller: 'LoginCtrl as login'
            }
        }
    })
    .state('signup', {
        url: '/signup',
        views: {
            main: {
                templateUrl: constant.baseUrl + '/welcome/view/signup',
                controller: 'SignUpCtrl as signup'
            }
        }
    });
}])
.controller('WelcomeCtrl', ['$state', '$http', '$rootScope', '$scope', 'constant',
    function($state, $http, $rootScope, $scope, constant) {



}])
.controller('LoginCtrl', ['$state', '$http', '$rootScope', '$scope', 'constant',
    function($state, $http, $rootScope, $scope, constant) {

    $scope.doLogin = function(u) {

        $http.post(constant.baseUrl + '/user/login', {
            username: u.username,
            password: u.password
        }).success(function(response) {
            if(response.status == "200") {
                localStorage.setItem('houselord_token', response.token);
                $rootScope.token = localStorage.getItem('houselord_token');
                $state.go('dashboard');
            } else {
                console.log('Auth Failed');
            }
        }).error(function() {
            localStorage.clear();
            $state.go('welcome');
        });
    };


}])
.controller('SignUpCtrl', ['$state', '$http', '$rootScope', '$scope', 'constant',
    function($state, $http, $rootScope, $scope, constant) {

    $scope.signUpSubmit = function(u) {

        $http.post(constant.baseUrl + '/user/signUp', {
            fullname: u.fullname,
            email: u.email,
            mobile: u.mobile,
            password: u.password
        }).success(function(response) {
            if(response.status == "200") {
                localStorage.setItem('houselord_token', response.token);
                $state.go('dashboard');
            }
        }).error(function() {
            localStorage.clear();
            $state.go('welcome');
        });
    };

}]);
