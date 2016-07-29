var inbos = angular
  .module('inbos', [
      'ngMaterial',
      'ngMessages',
      'ngSanitize',
      'naif.base64',
      'angularMoment',
      'ui.router',
      'md.data.table',
      'register',
      'admin'
  ])
  .config(function($mdThemingProvider) {
      var customBlueMap = $mdThemingProvider.extendPalette('light-blue', {
      'contrastDefaultColor': 'light',
      'contrastDarkColors': ['50'],
      '50': 'ffffff'
    });
    var background = $mdThemingProvider.extendPalette('light-blue', {
        'A100': 'f2f2f2'
    });
    $mdThemingProvider.definePalette('background', background);
    $mdThemingProvider.definePalette('customBlue', customBlueMap);

    // $mdThemingProvider.theme('docs-dark', 'default')
    //     .primaryPalette('yellow')
    //     .dark();

    $mdThemingProvider.theme('default')
      .primaryPalette('customBlue', {
        'default': '500',
        'hue-1': '50'})
      .accentPalette('amber');

    $mdThemingProvider.theme('input', 'default')
          .primaryPalette('grey');
  })
  .config(function($mdDateLocaleProvider) {
    //   $mdDateLocaleProvider.formatDate = function(date) {
    //     return moment(date).format('YYYY-MM-DD');
    //   };
  })
  .run(function($rootScope, $state, $http, constant) {
      console.log('RUN');
      if(localStorage.getItem('icos_token')) {
          console.log('TOKEN EXIST');
          $rootScope.token = localStorage.getItem('icos_token');
      } else {
          console.log('TOKEN NOT EXIST');
          $state.go('register');
      }
  });


  // Global constant
  angular.module('conf', [])
  .constant('constant', {
      baseUrl: 'http://localhost/icos'

  });

  // Directives
  inbos.directive('unMatcher', function($timeout) {
      return {
          restrict: "A",
          require: "ngModel",
          link: function(scope, element, attributes, ngModel) {
              ngModel.$validators.unMatcher = function(modelValue) {
                  return attributes.unMatcher !== modelValue;
              };
          }
      };
  });

  inbos.directive('matcher', function($timeout) {
      return {
          restrict: "A",
          require: "ngModel",
          link: function(scope, element, attributes, ngModel) {
              ngModel.$validators.matcher = function(modelValue) {
                  return attributes.matcher === modelValue;
              };
          }
      };
  });
