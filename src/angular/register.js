angular.module('register', ['conf'])
.config(['$stateProvider', '$urlRouterProvider', 'constant', function($stateProvider, $urlRouterProvider, constant) {

    // $urlRouterProvider.otherwise('/register');

    $stateProvider
    .state('register', {
        url: '/register',
        views: {
            header: {
                templateUrl: constant.baseUrl + '/index.php/welcome/view/header'
            },
            main: {
                templateUrl: constant.baseUrl + '/index.php/welcome/view/register',
                controller: 'RegisterCtrl as register'
            }
        }
    });
}])
.controller('RegisterCtrl', ['$state', '$http', '$rootScope', '$scope', 'constant',
    function($state, $http, $rootScope, $scope, constant) {

        $scope.lkp_type = [
            {code: 'Official Media', description: 'Official Media'},
            {code: 'Local Media', description: 'Local Media'},
            {code: 'Foreign Media', description: 'Foreign Media'},
            {code: 'Secretariat', description: 'Secretariat'}
        ];

        $scope.lkp_gender = [
            { code: 'Male', description: 'Male' },
            { code: 'Female', description: 'Female' }
        ];

        $scope.lkp_id = [
            { code: 'New IC No', description: 'New IC No' },
            { code: 'Old IC No', description: 'Old IC No' },
            { code: 'Passport No', description: 'Passport No' }
        ];

        $scope.lkp_org = [
            { code: 'Newspaper', description: 'Newspaper' },
            { code: 'Magazine', description: 'Magazine' },
            { code: 'TV', description: 'TV' },
            { code: 'Radio', description: 'Radio' },
            { code: 'Photo Agency', description: 'Photo Agency' },
            { code: 'News Agency', description: 'News Agency' },
            { code: 'Others', description: 'Others' }
        ];

        $scope.lkp_designation = [
            { code: 'Secretariat', description: 'Secretariat' },
            { code: 'Reporter', description: 'Reporter' },
            { code: 'Cameraman', description: 'Cameraman' },
            { code: 'Editor', description: 'Editor' },
            { code: 'Correspondent', description: 'Correspondent' },
            { code: 'TV/Radio Commentator', description: 'TV/Radio Commentator' },
            { code: 'TV Commentator', description: 'TV Commentator' },
            { code: 'Technician', description: 'Technician' },
            { code: 'Others', description: 'Others' }

        ];

        $scope.isNewIC = true;
        $scope.isOldIC = false;
        $scope.isPassport = false;

        $scope.selectId = function() {
            if($scope.reg.lkp_id == "New IC No") {
                $scope.isNewIC = true;
                $scope.isOldIC = false;
                $scope.isPassport = false;
            } else if($scope.reg.lkp_id == "Old IC No") {
                $scope.isNewIC = false;
                $scope.isOldIC = true;
                $scope.isPassport = false;
            } else if($scope.reg.lkp_id == "Passport No") {
                $scope.isNewIC = false;
                $scope.isOldIC = false;
                $scope.isPassport = true;
            }
        }

        $scope.isOtherOrganisation = false;
        $scope.selectOrganisation = function() {
            console.log($scope.reg.lkp_org);
            if($scope.reg.lkp_org == "Others") {
                $scope.isOtherOrganisation = true;
            } else {
                $scope.isOtherOrganisation = false;
            }
        }

        $scope.isOtherDesignation = false;
        $scope.selectDesignation = function() {
            if($scope.reg.lkp_designation == "Others") {
                $scope.isOtherDesignation = true;
            } else {
                $scope.isOtherDesignation = false;
            }
        }

        // Submit application form
        $scope.submitApplication = function(reg) {

            console.log(reg);

            var pf;
            var ed;
            var p;
            if(reg.lkp_id == "Passport No") {
                pf = reg.passfile.filetype + ';base64,' + reg.passfile.base64;
                ed = moment(reg.expdate).format("YYYY-MM-DD");
                p = reg.passport;
            } else if(reg.lkp_id == "New IC No") {
                pf = '';
                ed = '';
                p = reg.newic;
            } else if(reg.lkp_id == "Old IC No") {
                pf = '';
                ed = '';
                p = reg.oldic;
            }

            var deo;
            if(reg.lkp_designation != "Others") {
                deo = '';
            } else {
                deo = reg.orgdesgo;
            }

            var oto;
            if(reg.lkp_org != "Others") {
                oto = '';
            } else {
                oto = reg.orgtypeo;
            }

            var dob = moment(reg.dob).format("YYYY-MM-DD");

            // if(reg.lkp_org != "Others") {
            //     reg.
            // }

            $http.post(constant.baseUrl + '/index.php/welcome/submitRegistration', {
                expdate: ed,
                dob: dob,
                fullname: reg.fullname,
                image: reg.image.filetype + ';base64,' + reg.image.base64,
                lkp_designation: reg.lkp_designation,
                lkp_gender: reg.lkp_gender,
                lkp_id: reg.lkp_id,
                lkp_org: reg.lkp_org,
                lkp_type: reg.lkp_type,
                namecard: reg.namecard,
                nationality: reg.nationality,
                orgadd: reg.orgadd,
                orgcountry: reg.orgcountry,
                orgdesgo: deo,
                orgemail: reg.orgemail,
                orgfax: reg.orgfax,
                orgmobile: reg.orgmobile,
                orgname: reg.orgname,
                orgtelo: reg.orgtelo,
                orgtypeo: oto,
                passfile: pf,
                passport: p,
                presscard: reg.presscard.filetype + ';base64,' + reg.presscard.base64,
                presscardno: reg.presscardno,
                pressedi: reg.pressedi
            }).success(function(response) {
                console.log(response);
            }).error(function() {
                console.log('E');
            });
        };

}])
.directive('btnUploadFile1', btnUploadFile1)
.directive('btnUploadFile2', btnUploadFile2)
.directive('btnUploadFile3', btnUploadFile3);

/**
 * Directive Upload Button
 * @return {[type]} [description]
 */
function btnUploadFile1() {
    var directive = {
       restrict: 'E',
       template: '<input id="fileInput1" name="fileInput1"  aria-label="uploadimage" type="file" class="ng-hide" ng-model="reg.image" required maxsize="2000" base-sixty-four-input accept="image/*"> <md-button id="uploadButton1" class="md-raised md-primary" aria-label="attach_file">    Upload  </md-button><md-input-container  md-no-float>    <input id="textInput1" ng-model="fileName1" type="text" style="color: #666;" placeholder="No file chosen" ng-readonly="true"></md-input-container>',
       link: btnUploadFileLink1
     };
     return directive;
}

function btnUploadFileLink1(scope, element, attrs) {
  var input = $(element[0].querySelector('#fileInput1'));
  var button = $(element[0].querySelector('#uploadButton1'));
  var textInput = $(element[0].querySelector('#textInput1'));

  if (input.length && button.length && textInput.length) {
    button.click(function(e) {
      input.click();
    });
    textInput.click(function(e) {
      input.click();
    });
  }

  input.on('change', function(e) {
    var files = e.target.files;
    if (files[0]) {
      scope.fileName1 = files[0].name;
    } else {
      scope.fileName1 = null;
    }
    scope.$apply();
  });
}

function btnUploadFile2() {
    var directive = {
       restrict: 'E',
       template: '<input id="fileInput2" name="fileInput2"  aria-label="uploadpass" type="file" class="ng-hide" ng-model="reg.passfile" required maxsize="2000" base-sixty-four-input accept="image/*"> <md-button id="uploadButton2" class="md-raised md-primary" aria-label="attach_file">    Upload  </md-button><md-input-container  md-no-float>    <input id="textInput2" ng-model="fileName2" type="text" style="color: #666;" placeholder="No file chosen" ng-readonly="true"></md-input-container>',
       link: btnUploadFileLink2
     };
     return directive;
}

function btnUploadFileLink2(scope, element, attrs) {
  var input = $(element[0].querySelector('#fileInput2'));
  var button = $(element[0].querySelector('#uploadButton2'));
  var textInput = $(element[0].querySelector('#textInput2'));

  if (input.length && button.length && textInput.length) {
    button.click(function(e) {
      input.click();
    });
    textInput.click(function(e) {
      input.click();
    });
  }

  input.on('change', function(e) {
    var files = e.target.files;
    if (files[0]) {
      scope.fileName2 = files[0].name;
    } else {
      scope.fileName2 = null;
    }
    scope.$apply();
  });
}

function btnUploadFile3() {
    var directive = {
       restrict: 'E',
       template: '<input id="fileInput3" name="fileInput3" aria-label="uploadcard" type="file" class="ng-hide" ng-model="reg.presscard" required base-sixty-four-input maxsize="2000" accept="image/*"> <md-button id="uploadButton3" class="md-raised md-primary" aria-label="attach_file">    Upload  </md-button><md-input-container  md-no-float>    <input id="textInput3" ng-model="fileName3" type="text" style="color: #666;" placeholder="No file chosen" ng-readonly="true"></md-input-container>',
       link: btnUploadFileLink3
     };
     return directive;
}

function btnUploadFileLink3(scope, element, attrs) {
  var input = $(element[0].querySelector('#fileInput3'));
  var button = $(element[0].querySelector('#uploadButton3'));
  var textInput = $(element[0].querySelector('#textInput3'));

  if (input.length && button.length && textInput.length) {
    button.click(function(e) {
      input.click();
    });
    textInput.click(function(e) {
      input.click();
    });
  }

  input.on('change', function(e) {
    var files = e.target.files;
    if (files[0]) {
      scope.fileName3 = files[0].name;
    } else {
      scope.fileName3 = null;
    }
    scope.$apply();
  });
}
