<div class="modal fade" id="viewSeller_mdl" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <b><?=__('seller')?>: </b>{{ rec.seller.seller_name }}
                                </h4>
                            </div>

                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('seller_type')?></div>
                                <div class="col-md-9 notwrapped">{{DtSetter( 'SELLERS_TYPE', rec.seller.seller_type )}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('seller_nationality')?></div>
                                <div class="col-md-9 notwrapped">{{DtSetter( 'COUNTRIES', rec.seller.seller_nationality )}}</div>
                            </div>
                            
                            <!-- <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('seller_photos')?></div>
                                <div class="col-md-9 notwrapped">{{rec.seller.seller_photos}}</div>
                            </div> -->
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('seller_configs')?></div>
                                <div class="col-md-9 notwrapped">

                                    <h5><?=__('mngr_contacts')?></h5>
                                    <div><i class="fa fa-user w20px"></i> {{rec.seller.seller_configs.mngr.fullname}}</div>
                                    <div><i class="fa fa-phone w20px"></i> {{rec.seller.seller_configs.mngr.phone}}</div>
                                    <div><i class="fa fa-at w20px"></i> {{rec.seller.seller_configs.mngr.email}}</div>
                                    <div><i class="fa fa-mobile w20px"></i> {{rec.seller.seller_configs.mngr.mobile}}</div>

                                    <h5 class="mt-3"><?=__('slr_contacts')?></h5>
                                    <div><i class="fa fa-user w20px"></i> {{rec.seller.seller_configs.slr.fullname}}</div>
                                    <div><i class="fa fa-phone w20px"></i> {{rec.seller.seller_configs.slr.phone}}</div>
                                    <div><i class="fa fa-at w20px"></i> {{rec.seller.seller_configs.slr.email}}</div>
                                    <div><i class="fa fa-mobile w20px"></i> {{rec.seller.seller_configs.slr.mobile}}</div>
                                    
                                </div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                <div class="col-md-9 notwrapped">{{rec.seller.stat_created}}</div>
                            </div>
                            
                            <div class="grid_row row">
                                <div class="col-md-3 grid_header2"><?=__('rec_state')?></div>
                                <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.seller.rec_state )"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>