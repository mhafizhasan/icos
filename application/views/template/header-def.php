<md-toolbar class="md-whiteframe-z2">
  <div class="md-toolbar-tools" style="padding-left:0px;">
    <h1 class="header-name"><span><?php echo APPNAME; ?></span></h1>
    <span flex></span>
    <div>
        <md-button class="md-icon-button" aria-label="Profile" ng-click="showProfile();">
            <md-tooltip md-direction="bottom">My Profile</md-tooltip>
          <md-icon md-font-library="material-icons">face</md-icon>
        </md-button>
    </div>
    <div ng-hide="isShowDashboard">
        <md-button class="md-icon-button" aria-label="Profile" ng-click="showDashboardPage();">
            <md-tooltip md-direction="bottom">My Dashboard</md-tooltip>
          <md-icon md-font-library="material-icons">view_compact</md-icon>
        </md-button>
    </div>
    <div ng-hide="isShowAdmin">
        <md-button class="md-icon-button" aria-label="Admin" ng-click="showAdminPage();">
            <md-tooltip md-direction="bottom">Admin Page</md-tooltip>
          <md-icon md-font-library="material-icons">settings</md-icon>
        </md-button>
    </div>
    <md-button class="md-icon-button" aria-label="Logout" ng-click="logout();">
        <md-tooltip md-direction="bottom">Logout</md-tooltip>
      <md-icon md-font-library="material-icons">exit_to_app</md-icon>
    </md-button>
  </div>
</md-toolbar>
