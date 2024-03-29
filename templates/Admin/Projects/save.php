<div class="right_col" role="main" 
     ng-init="(param1 > 0) ? doGet('/admin/projects?id='+param1, 'rec', 'project') : ''">

<button type="button" id="project_btn" class="hideIt" ng-click="
        doGet('/admin/projects?id='+param1, 'rec', 'project');
        filesInfo.project_photos=[];
        filesInfo.floorplan_photo=[];
        rec.floorplan = {};
    "></button>
 
    <div class="">
        <div class="page-title">
            <div class="">
                <h3><?=__('project_info_sec')?></h3>
            </div>
            <div class="title_right">
                
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <select style="text-indent: 40px; width: 100%">
                    <option>OPTIONS 1</option>
                    <option>OPTIONS 2</option>
                </select>
                <form class="row" id="project_form" ng-submit="
                
                    rec.project.img = filesInfo.project_photos;
                    doSave(rec.project, 'project', 'projects', (param1>0) ? '#project_btn' : false, '#project_preloader'); ">
                    
                    <!-- PROJECT INFO SECTION -->
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-home"></i> <?=__('project_info')?></h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content" >

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('language_id')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('language_id', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'select',
                                            'ng-model'=>'rec.project.language_id',
                                            'options'=>$this->Do->lcl( $this->Do->get('langs') )
                                        ])?>
                                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('category_id')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('category_id', [
                                            'options'=>$this->Do->lcl( $this->Do->cat('PROJ_CATEGORIES') ), 
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'select',
                                            'ng-model'=>'rec.project.category_id'
                                        ])?>
                                        <span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('developer_id')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('developer_id', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'select',
                                            'ng-model'=>'rec.project.developer_id',
                                            'options'=>$developers
                                        ])?>
                                        <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('seller_id')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('seller_id', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'select',
                                            'ng-model'=>'rec.project.seller_id',
                                            'options'=>$sellers
                                        ])?>
                                        <span class="fa fa-handshake-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback" ng-if="rec.project.project_ref">
                                    <label><?=__('project_ref')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('project_ref', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'text',
                                            'disabled'=>true,
                                            'ng-model'=>'rec.project.project_ref',
                                        ])?>
                                        <span class="fa fa-anchor form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 col-sm-8  form-group has-feedback">
                                    <label><?=__('project_title')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('project_title', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'text',
                                            'ng-model'=>'rec.project.project_title'
                                        ])?>
                                        <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('project_desc')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('project_desc', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'textarea',
                                            // 'ckeditor'=>'ckoptions',
                                            'ng-model'=>'rec.project.project_desc'
                                        ])?>
                                        <span class="fa fa-info form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12 mt-5 mb-5">
                                    <label class="big-icon">
                                        <span>
                                            <i class="fa fa-camera"></i> <?=__("add_photos")?>
                                            <?=$this->Form->control('project_photos', [
                                                'class'=>'form-control hideIt', 'type'=>'file',
                                                'file-model'=>'files.project_photos', 'multiple'=>true,
                                                'ng-model'=>'rec.project.project_photos', 
                                                'id'=>'project', 'label'=>false,
                                                'accept'=>'.png,.jpeg,.jpg',
                                            ])?>
                                        </span>
                                        <span class="hideWebInline">
                                            <a href="" ng-click="openCamera(); currTab = 'take_photo'; ">
                                                <i class="fa fa-camera"></i> <?=__("open_camera")?>
                                            </a>
                                        </span>
                                    </label>
                                    <div class="img_thumb">
                                        <span ng-repeat="img in rec.project.project_photos track by $index" class="img">
                                            <a href class="overly_btn" ng-click="
                                                    delImage('/admin/projects/delimage/'+param1,{image: img, id: param1}, '#project_btn')">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <img
                                                ng-src="{{getPhoto( img.tmp_name, img, 'projects')}}" 
                                                alt=""
                                                show-img="">
                                        </span>

                                        <span ng-repeat="img in filesInfo.project_photos track by $index" class="img">
                                            <a href class="overly_btn" ng-click="
                                                    filesInfo.project_photos.splice($index, 1);">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <img
                                                ng-src="{{getPhoto( img.tmp_name, img, 'projects')}}" 
                                                alt=""
                                                show-img=""
                                                class="newImg">
                                        </span>
                                    </div>

                                </div>
                                
                                <div class="col-md-6 col-12 mt-5 mb-5">
                                    <label class="big-icon">
                                        <span>
                                            <a href data-toggle="modal" data-target="#map_mdl" data-dismiss="modal"
                                                ng-click="
                                                    initMap();
                                                ">
                                                <i class="fa fa-map"></i> <?=__("add_location")?>
                                            </a>
                                        </span>
                                    </label>
                                    <div class="col-md-12 gmapImg" ng-if="rec.project.project_loc">
                                        <a href data-toggle="modal" data-target="#map_mdl" data-dismiss="modal" 
                                                ng-click="
                                                    initMap();
                                                ">
                                            <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center={{rec.project.project_loc}}&zoom=13&size=600x300&maptype=roadmap&markers=color:green%7Clabel:S%7C{{rec.project.project_loc}}&key=<?=$gmapKey?>">
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row dashed-btn-line">
                                        <div class="col-5"><b><?=__('adrs_country')?></b></div>
                                        <div class="col-7"> {{rec.project.adrs_country}}</div>
                                        <div class="col-5"><b><?=__('adrs_city')?></b></div>
                                        <div class="col-7"> {{rec.project.adrs_city}}</div>
                                        <div class="col-5"><b><?=__('adrs_region')?></b></div>
                                        <div class="col-7"> {{rec.project.adrs_region}}</div>
                                        <div class="col-5"><b><?=__('adrs_district')?></b></div>
                                        <div class="col-7"> {{rec.project.adrs_district}}</div>
                                        <div class="col-5"><b><?=__('adrs_street')?></b></div>
                                        <div class="col-7"> {{rec.project.adrs_street}}</div>
                                        <div class="col-5"><b><?=__('project_loc')?></b></div>
                                        <div class="col-7"> {{rec.project.project_loc}}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('project_videos')?></label>
                                    <div class="div form-control">
                                        <i><?=__('upload_videos_desc')?></i>
                                        <?=$this->element("tagInput-ng", ["ng"=>"rec.project.project_videos", "placeholder"=>__("property_videos_ph")]);?>
                                    </div>
                                </div>
                                
                                <?php if(in_array($authUser['user_role'], ['admin.content', 'admin.root'])){?>
                                
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('seo_keywords')?></label>
                                    <div class="div form-control">
                                        <?=$this->element("tagInput-ng", ["ng"=>"rec.project.seo_keywords", "placeholder"=>__("seo_keywords_ph")]);?>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('seo_title')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('seo_title', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'text',
                                            'ng-model'=>'rec.project.seo_title'
                                        ])?>
                                        <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('seo_desc')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('seo_desc', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'textarea',
                                            'rows'=>2,
                                            // 'ckeditor'=>'ckoptions',
                                            'ng-model'=>'rec.project.seo_desc'
                                        ])?>
                                        <span class="fa fa-info form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <?php }?>

                                <?php if($authUser['user_role'] == 'admin.root'){
                                    //echo $this->element('root_zone');
                                }?>

                                <div class="clearfix"></div>

                                <div class="form-group ">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback ">
                                        <button type="submit" id="project_preloader" class="btn btn-info"><span></span> <i class="fa fa-save"></i> <?=__('save')?></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- SPECS SECTION -->
                    <div class="col-md-12 col-sm-12" ng-if="rec.project.id>0">
                        <h3><?=__('project_specs_sec')?></h3>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-file-text-o"></i> <?=__('project_specs')?></h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content" >
                                <?php foreach($this->Do->cat('PROJ_SPECS.main') as $k=>$spec){
                                        $list = $this->Do->cat('PROJ_SPECS.'.$k);
                                        $type = 'select';
                                        $isDatePicker = $spec == 'param_deliverdate' ? 1 : 0;
                                        $icn = 'info-circle';
                                        if($spec == 'param_deliverdate'){$icn = 'calendar';}
                                        if(!is_array($list)){ $type = 'text'; }
                                        if(!in_array($spec, ['param_unit_types', 'param_units_size_range'])){ 
                                    ?>

                                    <div class="col-md-4 col-sm-4  form-group has-feedback">
                                        <label><?=__($spec)?></label>
                                        <div class="div">
                                            <?=$this->Form->control($spec, [
                                                'class'=>'form-control has-feedback-left',
                                                'label'=>false,
                                                'type'=>$type,
                                                'ng-model'=>'rec.project.'.$spec,
                                                'options'=>in_array($type, ['checkbox', 'select']) ? $this->Do->lcl( $list ) : false,
                                                'date-picker'=>$isDatePicker ? 'onlyMonthYear' : false,
                                                'initval'=>'{{rec.project.'.$spec.'}}',
                                            ])?>
                                            <span class="fa fa-<?=$icn?> form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <?php }elseif($spec=='param_unit_types'){ ?>

                                    <div class="col-md-4 col-sm-4  form-group has-feedback">
                                        <label><?=__($spec)?></label>
                                        <div class="div">
                                            <?=$this->Form->control($spec, [
                                                'class'=>'form-control', //has-feedback-left
                                                'label'=>false,
                                                'type'=>'select',
                                                'multiple'=>true,
                                                'multi-select'=>true,
                                                'empty'=>true,
                                                'ng-model'=>'rec.project.'.$spec,
                                                'options'=>$this->Do->lcl( $list ),
                                                // 'data-done-button'=>true,  
                                                // 'data-live-search'=>true,
                                            ])?>
                                            <!-- <span class="fa fa-info-circle form-control-feedback left" aria-hidden="true"></span> -->
                                        </div>
                                    </div>
                                        
                                    <?php }elseif($spec=='param_units_size_range'){?>

                                        <div class="col-md-4 col-sm-4  form-group has-feedback">
                                        <label><?=__($spec)?></label>
                                            <div set-slider="" 
                                                _fromto="{{rec.project.param_units_size_range}}" 
                                                end="100" 
                                                unit="<?=__('m2')?>" 
                                                step="1" 
                                                tar="project.param_units_size_range"></div>
                                        
                                            <div class="fromToDiv">
                                                <b><?=__('from')?></b>
                                                <span>{{nFormat( rec.project.<?=$spec?>[0] ,'<?=__('m2')?>')}}</span> 
                                                <b><?=__('to')?></b> 
                                                <span>{{nFormat( rec.project.<?=$spec?>[1] ,'<?=__('m2')?>')}}</span> 
                                            </div>
                                        </div>
                                    <?php }?>
                                <?php }?>

                                <div class="clearfix"></div>

                                <div class="form-group ">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback ">
                                        <button type="submit" id="project_preloader" class="btn btn-info">
                                            <span></span> <i class="fa fa-save"></i> <?=__('save')?>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!-- FLOORPLANS SECTION -->
                    <div class="col-md-12 col-sm-12" ng-if="rec.project.id>0">
                        <h3><?=__('project_floorplans_sec')?></h3>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-sitemap"></i> <?=__('project_floorplans')?></h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content" >

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-6 img_thumb text-center" ng-repeat="itm in rec.project.floorplans">
                                        <div class="img">
                                            <img ng-src="{{getPhoto(false, itm.floorplan_photo, 'floorplans')}}" show-img=""/>
                                        </div>
                                        
                                        <div class="flex_center">
                                            <div><b>{{itm.floorplan_name}}</b></div>
                                                <hr>
                                            <div>
                                                <a href class="small-btn" ng-click="rec.floorplan = itm" data-toggle="modal" data-target="#addEditFloorplan_mdl" data-dismiss="modal">
                                                    <i class="fa fa-pencil"></i> <?=__('edit')?>
                                                </a> &nbsp; 
                                                <a href class="small-btn" ng-click="doDelete('/admin/floorplans/delete/'+itm.id, '#project_btn')">
                                                    <i class="fa fa-times"></i> <?=__('delete')?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="form-group ">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback ">
                                        <button type="button" class="btn btn-info"
                                            data-toggle="modal" data-target="#addEditFloorplan_mdl" data-dismiss="modal"><i class="fa fa-plus"></i> <?=__('add_floorplan')?></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- FEATURES SECTION -->
                    <div class="col-md-12 col-sm-12" ng-if="rec.project.id>0">
                        <h3><?=__('project_features_sec')?></h3>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-asterisk"></i> <?=__('project_features')?></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <?php foreach($this->Do->cat('PROJ_FEATURES.main') as $k=>$group){ ?>

                                <div class="">
                                    <b><?=__($group)?></b>
                                </div>

                                    <?php foreach($this->Do->cat('PROJ_FEATURES.'.$k) as $k2=>$feature){ ?>

                                    <div class="col-lg-3 col-sm-4 col-6 ">
                                        <label class="mycheckbox">
                                            <?=$this->Form->control($feature, [
                                                'class'=>'form-control ',
                                                'label'=>false,
                                                'type'=>'checkbox',
                                                'ng-model'=>'rec.project.features_ids['.$k2.']',
                                                'ng-value'=>$k2,
                                                'templates' => [
                                                    'inputContainer' => '{{content}}'
                                                ]
                                            ])?>
                                             <span></span>&nbsp;<?=__($feature)?> 
                                        </label>
                                    </div>

                                    <?php }?>

                                    <div class="clearfix mb-5"></div>
                                <?php }?>


                                <div class="clearfix"></div>

                                <div class="form-group ">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback ">
                                        <button type="submit" id="project_preloader" class="btn btn-info"><span></span> <i class="fa fa-save"></i> <?=__('save')?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        
        </div>
    </div>
</div>
<?php echo $this->element('Modals/map')?>
<?php echo $this->element('Modals/addEditFloorplan')?>
<?php echo $this->element('Modals/camera')?>