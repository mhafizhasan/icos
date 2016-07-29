angular.module('admin', ['conf'])
.config(['$stateProvider', '$urlRouterProvider', 'constant', function($stateProvider, $urlRouterProvider, constant) {

    $urlRouterProvider.otherwise('/register');

    $stateProvider
    .state('dashboard', {
        url: '/dashboard',
        views: {
            header: {
                templateUrl: constant.baseUrl + '/welcome/view/header_admin'
            },
            main: {
                templateUrl: constant.baseUrl + '/welcome/view/dashboard',
                controller: 'DashboardCtrl as dashboard'
            }
        }
    })
    .state('printform', {
        url: '/print/:appId',
        views: {
            // header: {
            //     templateUrl: constant.baseUrl + '/welcome/view/header_print'
            // },
            main: {
                templateUrl: constant.baseUrl + '/welcome/view/print',
                controller: 'PrintFormCtrl as printform'
            }
        }
    });
}])
.controller('DashboardCtrl', ['$state', '$http', '$rootScope', '$scope', 'constant',
    function($state, $http, $rootScope, $scope, constant) {

    'use strict';

    var bookmark;

      $scope.selected = [];

      $scope.filter = {
        options: {
          debounce: 500
        }
      };

      $scope.query = {
        filter: '',
        order: 'reg_name',
        limit: 5,
        page: 1
      };

      $scope.removeFilter = function () {
        $scope.filter.show = false;
        $scope.query.filter = '';

        if($scope.filter.form.$dirty) {
          $scope.filter.form.$setPristine();
        }
      };

      $scope.$watch('query.filter', function (newValue, oldValue) {
        if(!oldValue) {
          bookmark = $scope.query.page;
        }

        if(newValue !== oldValue) {
          $scope.query.page = 1;
        }

        if(!newValue) {
          $scope.query.page = bookmark;
        }

        allRegistration();
      });


      var allRegistration = function () {
        $http.post(constant.baseUrl + '/welcome/allRegistration', {
            filter: $scope.query.filter,
            order: $scope.query.order,
            limit: $scope.query.limit,
            page: $scope.query.page
        }).success(function (response) {
            $scope.users = response.users;
            $scope.users.count = response.count;
            // $scope.modules = response.modules;
            // $scope.modules.count = response.count; //Object.keys(response.users).length;
        }).error(function () {
            console.log('E');
        });

      };
      allRegistration();

      $scope.refreshTable = function () {
        allRegistration();
      };

}])
.controller('PrintFormCtrl', ['$state', '$http', '$rootScope', '$scope', 'constant',
    function($state, $http, $rootScope, $scope, constant) {

    console.log($state.params.appId);
    // Get data by regid
    var applicant = function () {
      $http.post(constant.baseUrl + '/welcome/applicantByRegId', {
          regid: $state.params.appId
      }).success(function (response) {
          console.log(response);
          if(response.status == "200") {
              $scope.reg = response.app;
          } else {
              $state.go('/register');
          }

      }).error(function () {
          console.log('E');
      });

    };
    applicant();

}]);
