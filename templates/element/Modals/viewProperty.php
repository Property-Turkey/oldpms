<?php
    $is_offer = in_array($authUser['user_role'], ['admin.callcenter', 'admin.root', 'admin.admin', 'admin.supervisor']);
?>

<div class="modal fade" id="viewProperty_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <?= __('view_property') ?>
                </h4>
            </div>

            <div class="modal-body">

                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            
                            <?php // Nav tabs ?>
                            <div class="bar-btns">
                                <a href ng-click="curr_t = 'main'" ng-class="{active: curr_t == 'main' }" class="small-btn"><?=__('property')?></a>
                                <a href ng-click="curr_t = 'project'" ng-class="{active: curr_t == 'project' }" class="small-btn"><?=__('project')?></a>
                                <a href ng-click="curr_t = 'portfolio_owner'" ng-class="{active: curr_t == 'portfolio_owner' }" class="small-btn"><?=__('portfolio_owner')?></a>
                                <a href ng-click="curr_t = 'developer'" ng-class="{active: curr_t == 'developer' }" class="small-btn"><?=__('developer')?></a>
                                <!-- <a href ng-click="curr_t = 'seller'" ng-class="{active: curr_t == 'seller' }" class="small-btn"><?=__('seller')?></a> -->
                                <?php if($is_offer){?>
                                <!-- <a href ng-click="curr_t = 'proposals'; rec.proposal.proposal_desc = rec.property.property_desc" ng-class="{active: curr_t == 'proposals' }" class="small-btn"><?=__('proposals')?></a> -->
                                <?php }?>
                                <!-- <a href ng-click="curr_t = 'docs'" ng-class="{active: curr_t == 'docs' }" class="small-btn"><?=__('docs')?></a> -->
                            </div>


                            <?php // Property  ?>
                            <div class="view_page tab-content">

                                <div class="grid" ng-show="curr_t=='main'">

                                    <div class="grid_row row">
                                        <h4 class="col-12"><span class="badge badge-info">{{rec.property.property_ref}}</span> {{rec.property.property_title}}</h4>
                                    </div>

                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('category_id')?></div>
                                        <div class="col-md-9 notwrapped">{{DtSetter('PROP', rec.property.category_id)}}</div>
                                    </div>

                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('property_desc')?></div>
                                        <div class="col-md-9 notwrapped" ng-bind-html="rec.property.property_desc"></div>
                                    </div>

                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('features_ids')?></div>
                                        <div class="col-md-9 notwrapped"> <span class="badge badge-warning" 
                                            ng-repeat="(k, itm) in rec.property.features_ids  track by $index">{{DtSetter('PROP_FEATURES', k)}}</span> 
                                        </div>
                                    </div>

                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('property_photos')?></div>
                                        <div class="col-md-9 notwrapped">
                                            <span class="thumb-img" ng-repeat="img in rec.property.property_photos track by $index">
                                                <img ng-src="<?=$app_folder?>/img/properties_photos/thumb/{{img.name}}" style="height:70px" 
                                                    show-img="{{rec.property.property_photos_names.join(',')}}" curr="{{img.name}}" />
                                            </span>
                                        </div>
                                    </div>

                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('property_videos')?></div>
                                        <div class="col-md-9 notwrapped">
                                            <div class="row">
                                                <div class="col-md-6" ng-repeat="vid in rec.property.property_videos track by $index" set-iframe="{{vid}}">
                                                    <!-- Here iframe vidoes will be included -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('property_price')?></div>
                                        <div class="col-md-9 notwrapped">
                                            {{DtSetter('currencies_icons', rec.property.property_currency)}} {{nFormat( rec.property.property_price )}} 
                                            <i class="grayText">
                                            ( {{DtSetter('currencies_icons', '<?=$currCurrency?>')}}
                                            {{ currencyConverter( DtSetter('currencies', rec.property.property_currency), '<?=$this->Do->get('currencies')[$currCurrency]?>', rec.property.property_price )}})</i> 
                                            <s class="grayText" ng-if="rec.property.property_oldprice"><br/>{{DtSetter('currencies_icons', rec.property.property_currency)}} {{nFormat( rec.property.property_oldprice )}}</s>
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('property_loc')?></div>
                                        <div class="col-md-9 notwrapped">
                                            <div class='gmapImg'>
                                                <img style='max-width:600px' show-img="" ng-src='https://maps.googleapis.com/maps/api/staticmap?center={{rec.property.property_loc}}&zoom=10&size=600x300&maptype=roadmap&markers=color:green%7Clabel:S%7C{{rec.property.property_loc}}&key=<?=$gmapKey?>'/>
                                                <a href="https://www.google.com/maps/place/{{rec.property.property_loc}}" target="_blank" class="btn btn-info mt-2">
                                                    <i class="fa fa-external-link"></i> <?=__('expand_map')?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('address')?></div>
                                        <div class="col-md-9 notwrapped">
                                            {{DtSetter('COUNTRIERS_CATEGORIES', rec.property.adrs_country)}}/
                                            {{DtSetter('COUNTRIERS_CATEGORIES', rec.property.adrs_city)}}/
                                            {{DtSetter('COUNTRIERS_CATEGORIES', rec.property.adrs_region)}}/
                                            {{DtSetter('COUNTRIERS_CATEGORIES', rec.property.adrs_district)}}/
                                            {{DtSetter('COUNTRIERS_CATEGORIES', rec.property.adrs_street)}},
                                            No: {{DtSetter('COUNTRIERS_CATEGORIES', rec.property.adrs_block)}}
                                            D: {{DtSetter('COUNTRIERS_CATEGORIES', rec.property.adrs_no)}}
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('property_space')?></div>
                                        <div class="col-md-9 notwrapped">{{rec.property.param_netspace}} <?=__('param_netspace')?> / {{rec.property.param_grossspace}} <?=__('param_grossspace')?></div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_rooms')?></div>
                                        <div class="col-md-9 notwrapped">{{DtSetter( 'PROP_SPECS', rec.property.param_rooms )}}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_buildage')?></div>
                                        <div class="col-md-9 notwrapped">
                                            {{DtSetter( 'PROP_SPECS', rec.property.param_buildage )}}
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_floor')?></div>
                                        <div class="col-md-9 notwrapped">
                                            {{DtSetter( 'PROP_SPECS', rec.property.param_floor )}} <?=__('of')?>
                                            {{DtSetter( 'PROP_SPECS', rec.property.param_floors )}} 
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_heat')?></div>
                                        <div class="col-md-9 notwrapped">{{DtSetter( 'PROP_SPECS', rec.property.param_heat )}}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_bathrooms')?></div>
                                        <div class="col-md-9 notwrapped">{{DtSetter( 'PROP_SPECS', rec.property.param_bathrooms )}}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_balconies')?></div>
                                        <div class="col-md-9 notwrapped">{{DtSetter( 'PROP_SPECS', rec.property.param_balconies )}}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_isfurnitured')?></div>
                                        <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.property.param_isfurnitured )"></div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_isresidence')?></div>
                                        <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.property.param_isresidence )"></div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_isresale')?></div>
                                        <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.property.param_isresale )"></div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_iscitizenship')?></div>
                                        <div class="col-md-9 notwrapped" ng-bind-html="DtSetter( 'bool2', rec.property.param_iscitizenship )"></div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_titledeed')?></div>
                                        <div class="col-md-9 notwrapped">{{nFormat( rec.property.param_titledeed )}}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_usestatus')?></div>
                                        <div class="col-md-9 notwrapped">{{DtSetter( 'PROP_SPECS', rec.property.param_usestatus )}}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_monthlytax')?></div>
                                        <div class="col-md-9 notwrapped">{{nFormat( rec.property.param_monthlytax )}}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('param_deposit')?></div>
                                        <div class="col-md-9 notwrapped">{{nFormat( rec.property.param_deposit )}}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('stat_created')?></div>
                                        <div class="col-md-9 notwrapped">{{ rec.property.stat_created }}</div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('stat_updated')?></div>
                                        <div class="col-md-9 notwrapped">{{ rec.property.stat_updated }}</div>
                                    </div>

                                </div>

                                <?php // Project ?>
                                <div ng-show="curr_t == 'project'" class="grid">
                                    <div class="grid_row row">
                                        <h4 class="col-12">
                                            <a href="<?=$app_folder?>/admin/projects?view_rec={{rec.property.project.id}}">
                                                <span class="badge badge-info">{{rec.property.project.project_ref}}</span> {{rec.property.project.project_title}}
                                            </a>
                                        </h4>
                                    </div>                                    
                                    <div class="grid_row row">
                                        <table class="table">
                                            <h5 class="col-12"><?=__('project_floorplans')?></h5>
                                            <tr ng-repeat="fp in rec.property.project.floorplans">
                                                <td> 
                                                    <img ng-src="{{getPhoto(false, fp.floorplan_photo, 'floorplans')}}" show-img style="max-height:90px"/>
                                                    <b>{{fp.floorplan_name}}</b>
                                                </td>
                                                <td>{{fp.floorplan_minsize}}<?=__('m2')?> - {{fp.floorplan_maxsize}}<?=__('m2')?></td>
                                                <td>{{DtSetter('currencies_icons', 3)}}{{nFormat( fp.floorplan_minprice )}} - {{DtSetter('currencies_icons', 3)}}{{nFormat( fp.floorplan_maxprice )}}</td>
                                            </tr>
                                        </table>
                                    </div>                              
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('features_ids')?></div>
                                        <div class="col-md-9 notwrapped"> <span class="badge badge-warning" 
                                            ng-repeat="(k, itm) in rec.property.project.features_ids track by $index">{{DtSetter('PROJ_FEATURES', itm)}}</span> 
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('project_photos')?></div>
                                        <div class="col-md-9 notwrapped">
                                            <span class="thumb-img" ng-repeat="img in rec.property.project.project_photos track by $index">
                                                <img ng-src="<?=$app_folder?>/img/projects_photos/thumb/{{img}}" style="height:70px" 
                                                    show-img="{{rec.property.project.project_photos.join(',')}}" curr="{{img}}" ctrl="projects" />
                                            </span>
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('project_videos')?></div>
                                        <div class="col-md-9 notwrapped">
                                            <div class="row">
                                                <div class="col-md-6" ng-repeat="vid in rec.property.project.project_videos track by $index" set-iframe="{{vid}}">
                                                    <!-- Here iframe vidoes will be included -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('project_desc')?></div>
                                        <div class="col-md-9 notwrapped" ng-bind-html="rec.property.project.project_desc"></div>
                                    </div>
                                </div>

                                <?php // Portfolio (USER) ?>
                                <div ng-show="curr_t == 'portfolio_owner'" class="grid">
                                    <div class="grid_row row">
                                        <h4 class="col-12">
                                            <span class="badge badge-info">{{rec.property.user.office.office_name}}</span> {{rec.property.user.user_fullname}}
                                        </h4>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('mobile')?></div>
                                        <div class="col-md-9 notwrapped" ng-bind-html="rec.property.user.user_configs.mobile"></div>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-3 grid_header2"><?=__('address')?></div>
                                        <div class="col-md-9 notwrapped" ng-bind-html="rec.property.user.user_configs.address"></div>
                                    </div>
                                </div>

                                <?php // Developer ?>
                                <div ng-show="curr_t == 'developer'" class="grid">
                                    <div class="grid_row row">
                                        <h4 class="col-12">{{rec.property.developer.dev_name}}</h4>
                                    </div>
                                    <div class="grid_row row">
                                        <div class="col-md-12 notwrapped">
                                            <div><i class="fa fa-phone w20px"></i> {{rec.property.developer.dev_configs.phone}} </div>
                                            <div><i class="fa fa-mobile w20px"></i> {{rec.property.developer.dev_configs.mobile}} </div>
                                            <div><i class="fa fa-at w20px"></i> {{rec.property.developer.dev_configs.email}} </div>
                                            <div><i class="fa fa-map-marker w20px"></i> {{rec.property.developer.dev_configs.address}} </div>
                                        </div>
                                    </div>
                                </div>

                                <?php // Seller ?>
                                <div ng-show="curr_t == 'seller'" class="grid">

                                    <div  ng-if="rec.property.param_ownertype != '-1'">
                                        <div class="grid_row row">
                                            <h4 class="col-12">{{rec.property.seller.seller_name}}</h4>
                                        </div>
                                        <div class="grid_row row" ng-if="rec.property.seller.seller_configs.mngr.fullname">
                                            <div class="col-md-12 notwrapped">
                                                <h5>{{rec.property.seller.seller_configs.mngr.fullname}}</h5>
                                                <div><i class="fa fa-phone w20px"></i> {{rec.property.seller.seller_configs.mngr.phone}} </div>
                                                <div><i class="fa fa-mobile w20px"></i> {{rec.property.seller.seller_configs.mngr.mobile}} </div>
                                                <div><i class="fa fa-at w20px"></i> {{rec.property.seller.seller_configs.mngr.email}} </div>
                                            </div>
                                        </div>
                                        <div class="grid_row row" ng-if="rec.property.seller.seller_configs.slr.fullname">
                                            <div class="col-md-12 notwrapped">
                                                <h5>{{rec.property.seller.seller_configs.slr.fullname}}</h5>
                                                <div><i class="fa fa-phone w20px"></i> {{rec.property.seller.seller_configs.slr.phone}} </div>
                                                <div><i class="fa fa-mobile w20px"></i> {{rec.property.seller.seller_configs.slr.mobile}} </div>
                                                <div><i class="fa fa-at w20px"></i> {{rec.property.seller.seller_configs.slr.email}} </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid_row row" ng-if="rec.property.param_ownertype == '-1'">
                                        <div class="col-md-12 notwrapped">
                                            <a href ng-click="$parent.curr_t = 'developer'" class="small-btn"><?=__('the_seller_is_the_developer')?></a>
                                        </div>
                                    </div>

                                </div>
                                
                                <?php // Proposals ?>
                                <?php if ($is_offer) { ?>
                                    <div ng-show="curr_t == 'proposals'" class="grid">

                                    <?php echo $this->element('Includes/proposals')?>

                                    </div>
                                <?php }?>

                                <?php // Documents  ?>
                                <div ng-show="curr_t == 'docs'" class="grid">
                                    
                                    <div class="grid_row row" ng-repeat="doc in rec.property.docs">
                                        <div class="col-sm-5 col-12 grid_header2">
                                            {{doc.doc_name}}
                                        </div>
                                        <div class="col-sm-5 col-6">
                                            {{doc.stat_created}}
                                        </div>
                                        <div class="col-sm-2 col-6 notwrapped text-right">
                                            <a class="small-btn" target="_blank" href="<?= $protocol . ':' . $path ?>/file/properties_files/{{ doc.doc_name }}"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>