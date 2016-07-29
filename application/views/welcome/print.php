<md-content flex layout-fill layout="row" layout-align="center center" layout-padding class="md-inline-form xbg" ng-cloak>
    <div flex="80" class="xcontent md-whiteframe-z2">
        <h1 class="md-headline">Application Form</h1>
        <div layout-gt-xs="row" layout-align="space-between end">
            <md-input-container class="md-block" flex-gt-sm>
                <img ng-show="reg.reg_picture" class="md-whiteframe-z1" width='200'
                title='' alt='' src='data:{{reg.reg_picture}}'>
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="fullname">Registration Type</label>
                <input disabled type="text" name="fullname" ng-model="reg.reg_type">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="fullname">Full Name</label>
                <input disabled type="text" name="fullname" ng-model="reg.reg_name">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="namecard">Name to appear on the card</label>
                <input disabled type="text" name="namecard" ng-model="reg.reg_card">
            </md-input-container>
            <md-input-container class="md-block" flex-gt-xs>
                <label for="gender">Gender</label>
                <input disabled type="text" ng-model="reg.reg_gender">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="idtype">Identification Type</label>
                <input disabled type="text" ng-model="reg.reg_idtype">
            </md-input-container>
            <md-input-container ng-show="isNewIC" class="md-block" flex-gt-xs>
                <label for="newic">New IC No</label>
                <input disabled type="text" ng-model="reg.reg_idno">
            </md-input-container>
            <md-input-container ng-show="isOldIC" class="md-block" flex-gt-xs>
                <label for="oldic">Old IC No</label>
                <input disabled type="text" ng-model="reg.reg_idno">
            </md-input-container>
        </div>
        <div layout-gt-xs="row" ng-show="isPassport" layout-align="center center">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="passport">Passport No</label>
                <input disabled type="text" ng-model="reg.reg_idno">
            </md-input-container>
            <md-datepicker name="expdate" class="mygap" ng-model="reg.expdate" md-placeholder="Expiry Date" disabled></md-datepicker>
            <md-input-container class="md-block" flex-gt-xs>
                <btn-upload-file2></btn-upload-file2><br/>
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-datepicker name="dob" ng-model="reg.dob" class="rightgap" md-placeholder="Date of Birth"></md-datepicker>
            <md-input-container class="md-block" flex-gt-xs>
                <label for="nationality">Nationality</label>
                <input disabled type="text" ng-model="reg.reg_nationality">
            </md-input-container>
        </div>
        <h1 class="md-headline">Organisation Info</h1>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgname">Name of Organisation</label>
                <input disabled type="text" ng-model="reg.org_name">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgadd">Organisation Address</label>
                <input disabled type="text" ng-model="reg.org_address">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgcountry">Country</label>
                <input disabled type="text" ng-model="reg.org_country">
            </md-input-container>
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgemail">Email</label>
                <input disabled type="text" ng-model="reg.org_email">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgtelo">Tel No (Office)</label>
                <input disabled type="text" ng-model="reg.org_telo">
            </md-input-container>
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgmobile">Handphone No</label>
                <input disabled type="text" ng-model="reg.org_mobile">
            </md-input-container>
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgfax">Fax No</label>
                <input disabled type="text" ng-model="reg.org_fax">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgtype">Type of Organisation</label>
                <input disabled type="text" ng-model="reg.org_type">
            </md-input-container>
            <md-input-container ng-show="isOtherOrganisation" class="md-block" flex-gt-xs>
                <label for="orgtypeo">Others (please specify)</label>
                <input disabled type="text" ng-model="reg.org_typeo">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="orgdesg">Designation</label>
                <input disabled type="text" ng-model="reg.org_desig">
            </md-input-container>
            <md-input-container ng-show="isOtherDesignation" class="md-block" flex-gt-xs>
                <label for="orgdesgo">Others (please specify)</label>
                <input disabled type="text" ng-model="reg.org_desigo">
            </md-input-container>
        </div>
        <div layout-gt-xs="row" layout-align="start center">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="presscardno">Press Card Number and issuer</label>
                <input disabled type="text" ng-model="reg.pc_no">
            </md-input-container>
        </div>
        <div layout-gt-xs="row" layout-align="start center">
            <md-input-container class="md-block" flex-gt-xs>
                <img ng-show="reg.pc_file" class="md-whiteframe-z1" width='400' title='' alt='' src="<?php echo base_url(); ?>/repos/press_{{reg.uid}}.png">
            </md-input-container>
        </div>
        <div layout-gt-xs="row">
            <md-input-container class="md-block" flex-gt-xs>
                <label for="pressedi">Name of Editor/Head/Producer</label>
                <input disabled type="text" ng-model="reg.pc_editor">
            </md-input-container>
        </div>
        <div layout-gt-sm="row" layout-align="end">
            <md-button class="md-warn md-raised" ng-click="printNow();" >Print Form</md-button>
        </div>
    </div>
</md-content>
