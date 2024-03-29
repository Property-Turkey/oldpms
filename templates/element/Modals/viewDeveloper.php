<div class="modal fade" id="viewDeveloper_mdl" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <b><?=__('developer')?>: </b>{{ rec.developer.dev_name }}
                                </h4>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('dev_configs')?></div>
                                <div class="col-md-9 notwrapped">

                                    <h5><?=__('contacts')?></h5>
                                    <div><i class="fa fa-user w20px"></i> {{rec.developer.dev_configs.fullname}}</div>
                                    <div><i class="fa fa-phone w20px"></i> {{rec.developer.dev_configs.phone}}</div>
                                    <div><i class="fa fa-at w20px"></i> {{rec.developer.dev_configs.email}}</div>
                                    <div><i class="fa fa-mobile w20px"></i> {{rec.developer.dev_configs.mobile}}</div>

                                </div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                <div class="col-md-9 notwrapped">{{rec.developer.stat_created}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.developer.rec_state )"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>