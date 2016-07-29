<md-content layout="row" layout-fill layout-align="center center" ng-cloak>
    <form name="loginForm" role="form">
        <div class="login-box md-whiteframe-z3" layout="column" layout-align="center">
            <p class="title-name"><?php echo APPNAME; ?></p>
            <md-input-container class="md-icon-float md-block">
              <label>Username</label>
              <md-icon md-font-library="material-icons">account_box</md-icon>
              <input ng-model="user.username" type="text" required focus>
            </md-input-container>
            <md-input-container class="md-icon-float md-block">
              <label>Password</label>
             <md-icon md-font-library="material-icons">lock</md-icon>
              <input ng-model="user.password" type="password" required>
            </md-input-container>
            <md-button class="md-raised md-primary" ng-click="doLogin(user)" data-ng-disabled="loginForm.$invalid">Login</md-button>
            <br><span style="text-align:center;" class="md-caption">Don't have account? <a href="#/signup">Sign up</a></span>
        </div>
    </form>
</md-content>
