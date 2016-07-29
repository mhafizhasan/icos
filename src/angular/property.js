angular.module('property', ['conf'])
.config(['$stateProvider', '$urlRouterProvider', 'constant', function($stateProvider, $urlRouterProvider, constant) {

    $urlRouterProvider.otherwise('/dashboard');

    $stateProvider
    .state('#/property/new', {
        url: '/property/new',
        views: {
            header: {
                templateUrl: constant.baseUrl + '/template/view/header'
            },
            main: {
                templateUrl: constant.baseUrl + '/property/view/register',
                controller: 'PropertyCtrl as property'
            }
        }
    });
}])
.controller('PropertyCtrl', ['$state', '$http', '$rootScope', '$scope', 'constant',
    function($state, $http, $rootScope, $scope, constant) {

    $scope.step1 = true;
    $scope.step2 = false;
    $scope.step3 = false;
    $scope.step4 = false;
    $scope.step5 = false;

    console.log('property controller');

    var lkpPropertyType = function() {
        $http.post(constant.baseUrl + '/lookup/property/type', {
            token: $rootScope.token
        }).success(function(response) {
            if(response.status == "200") {
                $scope.lkp_property_type = response.lkp;
                
            } else {
                console.log('Err');
            }
        }).error(function() {
            localStorage.clear();
            $state.go('welcome');
        });
    };
    lkpPropertyType();

}]);
