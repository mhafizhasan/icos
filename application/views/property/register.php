<md-content flex layout="row" layout-align="center center" layout-padding class="md-inline-form" ng-cloak>
    <div flex="80">
        <h1 class="md-display-1">Basic Info</h1>
        <form name="basicInfoForm">
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="Property Type">Property Type</label>
                    <md-select ng-model="property.lkp_property_type">
                     <md-option ng-repeat="pt in lkp_property_type" value="{{pt.lookupAssignID}}">
                       {{pt.lookupDescription}}
                     </md-option>
                   </md-select>
                    <div ng-messages="basicInfoForm.fullname.$error" ng-if="basicInfoForm.fullname.$touched">
                      <div ng-message="required">You <b>must</b> have a Fullname.</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="email">Email</label>
                    <input required type="email" name="email" ng-model="user.email" minlength="5" maxlength="50">
                    <div ng-messages="signUpForm.email.$error" ng-if="signUpForm.email.$touched">
                      <div ng-message="required">You <b>must</b> have an Email.</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="mobile">Mobile Phone</label>
                    <input required type="text" name="mobile" ng-model="user.mobile" minlength="5" maxlength="50">
                    <div ng-messages="signUpForm.mobile.$error" ng-if="signUpForm.mobile.$touched">
                      <div ng-message="required">You <b>must</b> have a Mobile Phone Number.</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm="row" layout-align="end">
                <md-button class="md-warn md-raised" ng-click="signUpSubmit(user);" data-ng-disabled="basicInfoForm.$invalid">Sign Up</md-button>
                <!-- <md-button class="md-fab" ng-click="resetForm();" aria-label="Reset">
                    <md-tooltip md-direction="bottom">Reset</md-tooltip>
                    <md-icon md-font-library="material-icons">refresh</md-icon>
                </md-button> -->
            </div>
        </form>
    </div>
</md-content>
