<md-content flex layout="row" layout-align="center center" layout-padding class="md-inline-form" ng-cloak>
    <div flex="50">
        <h1 class="md-display-1">Sign Up</h1>
        <form name="signUpForm">
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="fullname">Fullname</label>
                    <input required type="text" name="fullname" ng-model="user.fullname" minlength="5" maxlength="50">
                    <div ng-messages="signUpForm.fullname.$error" ng-if="signUpForm.fullname.$touched">
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
            <div layout-gt-xs="row">
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="password">Password</label>
                    <input required type="password" name="password" ng-model="user.password" minlength="5" maxlength="50">
                    <div ng-messages="signUpForm.password.$error" ng-if="signUpForm.password.$touched">
                      <div ng-message="required">You <b>must</b> have a Password.</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                    </div>
                </md-input-container>
                <md-input-container class="md-block" flex-gt-xs>
                    <label for="repassword">Confirm Password</label>
                    <input type="password" name="repassword"
                        ng-model="user.repassword"
                        required
                        matcher="{{user.password}}"
                        minlength="5" maxlength="50">
                    <div ng-messages="signUpForm.repassword.$error" ng-if="signUpForm.repassword.$touched">
                      <div ng-message="required">Your <b>must</b> retype Password.</div>
                      <div ng-message="minlength">Your entry is not long enough.</div>
                      <div ng-message="maxlength">Your entry is too long.</div>
                      <div ng-message="matcher">Both password <b>must</b> be identical</div>
                    </div>
                </md-input-container>
            </div>
            <div layout-gt-sm="row" layout-align="end">
                <md-button class="md-warn md-raised" ng-click="signUpSubmit(user);" data-ng-disabled="signUpForm.$invalid">Sign Up</md-button>
                <!-- <md-button class="md-fab" ng-click="resetForm();" aria-label="Reset">
                    <md-tooltip md-direction="bottom">Reset</md-tooltip>
                    <md-icon md-font-library="material-icons">refresh</md-icon>
                </md-button> -->
            </div>
        </form>
    </div>
</md-content>
