<div layout="column" layout-fill class="relative" flex role="main">
    <div layout="row" flex>
        <md-content layout="column" class="xbg" flex>
            <md-card>
                <md-toolbar class="md-table-toolbar md-default" ng-hide="selected.length || filter.show">
                  <div class="md-toolbar-tools">
                    <h2 class="md-title">Applicants List</h2>
                    <div flex></div>
                    <md-button class="md-icon-button" ng-click="filter.show = true">
                      <md-icon>filter_list</md-icon>
                    </md-button>
                  </div>
                </md-toolbar>
                <md-toolbar class="md-table-toolbar md-default" ng-show="filter.show && !selected.length">
                  <div class="md-toolbar-tools">
                    <md-icon>search</md-icon>
                    <form flex name="filter.form">
                      <input type="text" ng-model="query.filter" ng-model-options="filter.options" placeholder="search">
                    </form>
                    <md-button class="md-icon-button" ng-click="removeFilter()">
                      <md-icon>close</md-icon>
                    </md-button>
                  </div>
                </md-toolbar>
                <md-toolbar class="md-table-toolbar alternate" ng-show="selected.length">
                  <div class="md-toolbar-tools" layout-align="space-between">
                    <div>{{selected.length}} {{selected.length > 1 ? 'items' : 'item'}} selected</div>
                    <md-button class="md-icon-button" ng-click="delete($event)">
                      <md-icon>delete</md-icon>
                    </md-button>
                  </div>
                </md-toolbar>

                <md-table-container>
                  <table md-table md-row-select multiple ng-model="selected">
                    <thead md-head md-order="query.order" md-on-reorder="refreshTable">
                      <tr md-row>
                        <th md-column md-order-by="reg_name"><span>Applicant Name</span></th>
                        <th md-column><span>Applicant ID No</span></th>
                        <th md-column><span>Registration Type</span></th>
                        <th md-column><span>Organisation Name</span></th>

                        <th md-column class="dt-edit">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody md-body>
                      <tr md-row md-select="user" md-select-id="name" md-auto-select="false" ng-repeat="user in users">
                        <td md-cell>{{user.reg_name}}</td>
                        <td md-cell>{{user.reg_idno}}</td>
                        <td md-cell>{{user.reg_type}}</td>
                        <td md-cell>{{user.org_name}}</td>
                        <td md-cell>
                            <md-button class="md-icon-button" target="_blank" ng-href="#/print/{{user.reg_idno}}">
                              <md-icon>print</md-icon>
                            </md-button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </md-table-container>

                <md-table-pagination md-limit="query.limit" md-limit-options="[5, 10, 15]" md-page="query.page" md-total="{{users.count}}" md-on-paginate="refreshTable" md-page-select></md-table-pagination>
            </md-card>
        </md-content>
    </div>
</div>
