<md-content flex layout="row" layout-align="center center" layout-padding class="md-inline-form xbg" ng-cloak>
    <div flex="80" class="xcontent md-whiteframe-z2">
        <!-- <h1 class="md-display-1">Registration Form for Media</h1> -->
        <form name="regForm">
            <h1 class="md-headline">Personal Info</h1>
            <div layout-gt-xs="row" layout-align="space-between end">
                <md-input-container class="md-block" flex-gt-xs>
                    <btn-upload-file1></btn-upload-file1><br/>
                    <span ng-show="regForm.fileInput1.$error.required">Required field</span>
                    <span ng-show="regForm.fileInput1.$error.maxsize">Files must not exceed 2000 KB</span>
                    <span ng-show="regForm.fileInput1.$error.accept">Image file only</span>
                </md-input-container>
                <md-input-container class="md-block" flex-gt-sm>
                    <img ng-show="reg.image" class="md-whiteframe-z1" width='200'
                    title='' alt='' src='data:{{reg.image.filetype}};base64,{{reg.image.base64}}'>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="regtype">Registration Type</label>
                    <md-select name="regtype" required ng-model="reg.lkp_type">
                     <md-option ng-repeat="rt in lkp_type" value="{{rt.code}}">
                       {{rt.description}}
                     </md-option>
                   </md-select>
                    <div ng-messages="regForm.regtype.$error" ng-if="regForm.regtype.$touched">
                      <div ng-message="required">Required field</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="fullname">Full Name</label>
                    <input required type="text" name="fullname" ng-model="reg.fullname" minlength="3" maxlength="80">
                    <div ng-messages="regForm.fullname.$error" ng-if="regForm.fullname.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="namecard">Name to appear on the card</label>
                    <input required type="text" name="namecard" ng-model="reg.namecard" minlength="1" maxlength="11" md-maxlength="11">
                    <div ng-messages="regForm.namecard.$error" ng-if="regForm.namecard.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="gender">Gender</label>
                    <md-select name="gender" ng-model="reg.lkp_gender" required>
                     <md-option ng-repeat="rg in lkp_gender" value="{{rg.code}}">
                       {{rg.description}}
                     </md-option>
                   </md-select>
                    <div ng-messages="regForm.gender.$error" ng-if="regForm.gender.$touched">
                      <div ng-message="required">Required field</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="idtype">Identification Type</label>
                    <md-select name="idtype" ng-model="reg.lkp_id" ng-change="selectId();" required>
                     <md-option ng-repeat="ri in lkp_id" value="{{ri.code}}">
                       {{ri.description}}
                     </md-option>
                   </md-select>
                    <div ng-messages="regForm.idtype.$error" ng-if="regForm.idtype.$touched">
                      <div ng-message="required">Required field</div>
                    </div>
                </md-input-container>
                <md-input-container ng-show="isNewIC" class="md-block" flex-gt-xs>
                    <label for="newic">New IC No</label>
                    <input required type="text" name="newic" ng-model="reg.newic" minlength="1" maxlength="11">
                    <div ng-messages="regForm.newic.$error" ng-if="regForm.newic.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-input-container ng-show="isOldIC" class="md-block" flex-gt-xs>
                    <label for="oldic">Old IC No</label>
                    <input required type="text" name="oldic" ng-model="reg.oldic" minlength="1" maxlength="15">
                    <div ng-messages="regForm.oldic.$error" ng-if="regForm.oldic.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row" ng-show="isPassport" layout-align="center center">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="passport">Passport No</label>
                    <input required type="text" name="passport" ng-model="reg.passport" minlength="1" maxlength="30">
                    <div ng-messages="regForm.passport.$error" ng-if="regForm.passport.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-datepicker name="expdate" class="mygap" ng-model="reg.expdate" md-placeholder="Expiry Date" required></md-datepicker>
                <div ng-messages="regForm.expdate.$error" ng-if="regForm.expdate.$touched">
                  <div ng-message="required">This is required.</div>
                </div>
                <md-input-container class="md-block" flex-gt-xs>
                    <btn-upload-file2></btn-upload-file2><br/>
                    <span ng-show="regForm.fileInput2.$error.required">Required field</span>
                    <span ng-show="regForm.fileInput2.$error.maxsize">Files must not exceed 2000 KB</span>
                    <span ng-show="regForm.fileInput2.$error.accept">Image file only</span>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-datepicker name="dob" ng-model="reg.dob" class="rightgap" md-placeholder="Date of Birth"></md-datepicker>
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="nationality">Nationality</label>
                    <input required type="text" name="nationality" ng-model="reg.nationality" minlength="1" maxlength="30">
                    <div ng-messages="regForm.nationality.$error" ng-if="regForm.nationality.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <h1 class="md-headline">Organisation Info</h1>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgname">Name of Organisation</label>
                    <input required type="text" name="orgname" ng-model="reg.orgname" minlength="1" maxlength="40">
                    <div ng-messages="regForm.orgname.$error" ng-if="regForm.orgname.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgadd">Organisation Address</label>
                    <input required type="text" name="orgadd" ng-model="reg.orgadd" minlength="1" maxlength="100">
                    <div ng-messages="regForm.orgadd.$error" ng-if="regForm.orgadd.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <!-- <md-input-container class="md-block" flex-gt-xs>
                    <label for="country">Country</label>
                    <md-select name="country" ng-model="reg.lkp_gender" required>
                     <md-option ng-repeat="rg in lkp_gender" value="{{rg.code}}">
                       {{rg.description}}
                     </md-option>
                   </md-select>
                    <div ng-messages="regForm.gender.$error" ng-if="regForm.gender.$touched">
                      <div ng-message="required">Required field</div>
                    </div>
                </md-input-container> -->
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgcountry">Country</label>
                    <input required type="text" name="orgcountry" ng-model="reg.orgcountry" minlength="1" maxlength="30">
                    <div ng-messages="regForm.orgcountry.$error" ng-if="regForm.orgcountry.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgemail">Email</label>
                    <input required type="text" name="orgemail" ng-model="reg.orgemail" minlength="1" maxlength="30">
                    <div ng-messages="regForm.orgemail.$error" ng-if="regForm.orgemail.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgtelo">Tel No (Office)</label>
                    <input required type="text" name="orgtelo" ng-model="reg.orgtelo" minlength="1" maxlength="20">
                    <div ng-messages="regForm.orgtelo.$error" ng-if="regForm.orgtelo.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgmobile">Handphone No</label>
                    <input required type="text" name="orgmobile" ng-model="reg.orgmobile" minlength="1" maxlength="20">
                    <div ng-messages="regForm.orgmobile.$error" ng-if="regForm.orgmobile.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgfax">Fax No</label>
                    <input required type="text" name="orgfax" ng-model="reg.orgfax" minlength="1" maxlength="20">
                    <div ng-messages="regForm.orgfax.$error" ng-if="regForm.orgfax.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgtype">Type of Organisation</label>
                    <md-select name="orgtype" ng-model="reg.lkp_org" required ng-change="selectOrganisation();">
                     <md-option ng-repeat="ro in lkp_org" value="{{ro.code}}">
                       {{ro.description}}
                     </md-option>
                   </md-select>
                    <div ng-messages="regForm.orgtype.$error" ng-if="regForm.orgtype.$touched">
                      <div ng-message="required">Required field</div>
                    </div>
                </md-input-container>
                <md-input-container ng-show="isOtherOrganisation" class="md-block" flex-gt-xs>
                    <label for="orgtypeo">Others (please specify)</label>
                    <input required type="text" name="orgtypeo" ng-model="reg.orgtypeo" minlength="1" maxlength="50">
                    <div ng-messages="regForm.orgtypeo.$error" ng-if="regForm.orgtypeo.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="orgdesg">Designation</label>
                    <md-select name="orgdesg" required ng-model="reg.lkp_designation" ng-change="selectDesignation();">
                     <md-option ng-repeat="rd in lkp_designation" value="{{rd.code}}">
                       {{rd.description}}
                     </md-option>
                   </md-select>
                    <div ng-messages="regForm.orgdesg.$error" ng-if="regForm.orgdesg.$touched">
                      <div ng-message="required">Required field</div>
                    </div>
                </md-input-container>
                <md-input-container ng-show="isOtherDesignation" class="md-block" flex-gt-xs>
                    <label for="orgdesgo">Others (please specify)</label>
                    <input required type="text" name="orgdesgo" ng-model="reg.orgdesgo" minlength="1" maxlength="50">
                    <div ng-messages="regForm.orgdesgo.$error" ng-if="regForm.orgdesgo.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row" layout-align="start center">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="presscardno">Press Card Number and issuer</label>
                    <input required type="text" name="presscardno" ng-model="reg.presscardno" minlength="1" maxlength="30">
                    <div ng-messages="regForm.presscardno.$error" ng-if="regForm.presscardno.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-input-container class="md-block" flex-gt-xs>
                    <btn-upload-file3></btn-upload-file3><br/>
                    <span ng-show="regForm.fileInput3.$error.required">Required field</span>
                    <span ng-show="regForm.fileInput3.$error.maxsize">Files must not exceed 2000 KB</span>
                    <span ng-show="regForm.fileInput3.$error.accept">Image file only</span>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="pressedi">Name of Editor/Head/Producer</label>
                    <input required type="text" name="pressedi" ng-model="reg.pressedi" minlength="1" maxlength="50">
                    <div ng-messages="regForm.pressedi.$error" ng-if="regForm.pressedi.$touched">
                      <div ng-message="required">Required field</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm="row" layout-align="end">
                <md-button class="md-warn md-raised" ng-click="submitApplication(reg);" >Submit Application</md-button>
                <!-- <md-button class="md-fab" ng-click="resetForm();" aria-label="Reset">
                    <md-tooltip md-direction="bottom">Reset</md-tooltip>
                    <md-icon md-font-library="material-icons">refresh</md-icon>
                </md-button> -->
                <!-- data-ng-disabled="regForm.$invalid" -->
            </div>
        </form>
    </div>
</md-content>
