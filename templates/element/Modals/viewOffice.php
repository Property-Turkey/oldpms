<div class="modal fade" id="viewOffice_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <?= __('view') ?>
                </h4>
            </div>

            <div class="modal-body row">
                <div class="col-md-12 col-sm-12">
                    <div class="view_page">
                        <div class="grid">

                            <div class="grid_row row">
                                <h4 class="col-12">
                                    <b><?=__('office')?>: </b>{{ rec.office.office_name }}
                                </h4>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('office_desc')?></div>
                                <div class="col-md-9 notwrapped" ng-bind-html="rec.office.office_desc"></div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('office_configs')?></div>
                                <div class="col-md-9 notwrapped">

                                    <h5><?=__('contacts')?></h5>
                                    <div><i class="fa fa-phone w20px"></i> {{rec.office.office_configs.phone}}</div>
                                    <div><i class="fa fa-at w20px"></i> {{rec.office.office_configs.email}}</div>
                                    <div><i class="fa fa-mobile w20px"></i> {{rec.office.office_configs.mobile}}</div>

                                </div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                <div class="col-md-9 notwrapped">{{rec.office.stat_created}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.office.rec_state )"></div>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('users')?></div>
                                <div class="col-md-9 notwrapped">
                                    <span ng-repeat="user in rec.office.users">
                                        <a href="<?=$app_folder?>/admin/users/?view_rec={{user.id}}" 
                                            class="inline-btn">{{user.user_fullname}}</a> &nbsp;
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>