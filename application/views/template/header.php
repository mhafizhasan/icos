<md-content layout="column">
    <md-toolbar class="md-hue-2 md-whiteframe-z2">
        <div layout="column" class="md-toolbar-tools-bottom inset">
            <h2 class="header-name"><span><?php echo APPNAME; ?></span></h2>
            <md-button class="md-raised md-primary">Register New Property</md-button>
        </div>
    </md-toolbar>
    <md-list class="sidemenu-list">
        <md-list-item href="#/dashboard" role="link" layout-align="start-center" md-ink-ripple>
            <span><md-icon md-font-library="material-icons">view_compact</md-icon>&nbsp;Dashboard</span>
        </md-list-item>
        <md-list-item href="#/property/new" role="link" layout-align="start-center" md-ink-ripple>
            <span><md-icon md-font-library="material-icons">store</md-icon>&nbsp;Property Management</span>
        </md-list-item>
        <md-list-item href="#/rental" role="link" layout-align="start-center" md-ink-ripple>
            <span><md-icon md-font-library="material-icons">hotel</md-icon>&nbsp;Rental Management</span>
        </md-list-item>
        <md-list-item href="#/payment" role="link" layout-align="start-center" md-ink-ripple>
            <span><md-icon md-font-library="material-icons">local_atm</md-icon>&nbsp;Payment Management</span>
        </md-list-item>
    </md-list>
</md-content>
