<div class="right_col" role="main" 
     ng-init="(param1 > 0) ? doGet('/admin/properties?id='+param1, 'rec', 'property') : doGet('/admin/properties?cats=1', 'rec', 'property')">

<button type="button" id="property_btn" class="hideIt" ng-click="
    filesInfo.property_photos=[];
    doGet('/admin/properties?id='+param1, 'rec', 'property');
    "></button>
 
    <div class="">
        <div class="page-title">
            <div class="">
                <h3><?=__('property_info_sec')?></h3>
            </div>
            <div class="title_right">
                
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">

                <form class="row" id="properties_form" ng-submit="
                    rec.property.img = filesInfo.property_photos;
                    doSave(rec.property, 'property', 'properties', (param1>0) ? '#property_btn' : false, '#properties_preloader'); ">
                    
                    <!-- PROPERTY INFO SECTION -->
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-home"></i> <?=__('property_info')?></h2>
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
                                            'ng-model'=>'rec.property.language_id',
                                            'options'=>$this->Do->lcl( $this->Do->get('langs') )
                                        ])?>
                                        <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('category_id')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('category_id', [
                                            'options'=>$this->Do->lcl( $this->Do->cat('PROP_CATEGORIES') ), 
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'select',
                                            'ng-model'=>'rec.property.category_id'
                                        ])?>
                                        <span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('developer_id')?></label>
                                    <div class="div">
                                        
                                        <select class="form-control has-feedback-left"
                                            ng-model="rec.property.developer_id"
                                            ng-change="rec.property.developer_id=='add' ? openModal('#addEditDeveloper_mdl') : ''">
                                            <option value=""><?=__('select_developer')?></option>
                                            <option value="add"><?=__('add_new_developer')?></option>
                                            <option ng-value="key" ng-repeat="(key, itm) in lists.developers_list">{{itm}}</option>
                                        </select>

                                        <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('seller_id')?></label>
                                    <div class="div">

                                        <select class="form-control has-feedback-left"
                                            ng-change="rec.property.seller_id=='add' ? openModal('#addEditSeller_mdl') : ''"
                                            ng-model="rec.property.seller_id">
                                            <option value=""><?=__('select_seller')?></option>
                                            <option value="add"><?=__('add_new_seller')?></option>
                                            <option ng-value="key" ng-repeat="(key, itm) in lists.sellers_list">{{itm}}</option>
                                        </select>
                                        
                                        <span class="fa fa-handshake-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('project_id')?></label>
                                    <div class="div">

                                        <select class="form-control has-feedback-left"
                                            ng-change="rec.property.project_id=='add' ? openModal('#addEditProject_mdl') : ''"
                                            ng-model="rec.property.project_id">
                                            <option value=""><?=__('select_project')?></option>
                                            <option value="add"><?=__('add_new_project')?></option>
                                            <option ng-value="key" ng-repeat="(key, itm) in lists.projects_list">{{itm}}</option>
                                        </select>
                                        
                                        <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6  form-group has-feedback" ng-if="rec.property.property_ref">
                                    <label><?=__('property_ref')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('property_ref', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'text',
                                            'disabled'=>true,
                                            'ng-value'=>'rec.property.property_ref'
                                        ])?>
                                        <span class="fa fa-anchor form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 col-sm-8  form-group has-feedback">
                                    <label><?=__('property_title')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('property_title', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'text',
                                            'ng-model'=>'rec.property.property_title'
                                        ])?>
                                        <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('property_price')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('property_price', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'text',
                                            'ng-model'=>'rec.property.property_price',
                                        ])?>
                                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('property_oldprice')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('property_oldprice', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'text',
                                            'ng-model'=>'rec.property.property_oldprice'
                                        ])?>
                                        <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6  form-group has-feedback">
                                    <label><?=__('property_currency')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('property_currency', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'select',
                                            'options'=>$this->Do->lcl( $this->Do->get('currencies') ),
                                            'ng-model'=>'rec.property.property_currency'
                                        ])?>
                                        <span class="fa fa-dollar form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('property_desc')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('property_desc', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'textarea',
                                            // 'ckeditor'=>'ckoptions',
                                            'ng-model'=>'rec.property.property_desc'
                                        ])?>
                                        <span class="fa fa-info form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-12 mt-5 mb-5">

                                    <label class="big-icon">
                                        <span>
                                            <i class="fa fa-picture-o"></i> <?=__("add_photos")?>
                                            <?=$this->Form->control('property_photos', [
                                                'class'=>'form-control hideIt', 'type'=>'file',
                                                'file-model'=>'files.property_photos', 'multiple'=>true,
                                                'ng-model'=>'rec.property.property_photos', 
                                                'id'=>'property', 'label'=>false,
                                                'accept'=>'.png,.jpeg,.jpg',
                                                'capture'=>'capture',
                                            ])?>
                                        </span>
                                        <!-- <span class="hideWebInline">
                                            <a href="" ng-click="openCamera(); currTab = 'take_photo'; ">
                                                <i class="fa fa-camera"></i> <?=__("open_camera")?>
                                            </a>
                                        </span> -->
                                    </label>
                                    <div class="img_thumb" >
                                        <span ng-repeat="img in rec.property.property_photos track by $index" class="img">
                                            <a href class="overly_btn" ng-click="
                                                    delImage('/admin/properties/delimage/'+param1,{image: img, id: param1}, '#property_btn')">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <img
                                                ng-src="{{getPhoto( img.tmp_name, img, 'properties')}}" 
                                                alt=""
                                                show-img="">
                                        </span>
                                        <span ng-repeat="img in filesInfo.property_photos track by $index" class="img">
                                            <a href class="overly_btn" ng-click="
                                                    filesInfo.property_photos.splice($index, 1);">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <img
                                                ng-src="{{getPhoto( img.tmp_name, img, 'properties')}}" 
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
                                    <div class="col-md-12 gmapImg" ng-if="rec.property.property_loc">
                                        <a href data-toggle="modal" data-target="#map_mdl" data-dismiss="modal"  
                                                ng-click="
                                                    initMap();
                                                ">
                                            <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center={{rec.property.property_loc}}&zoom=13&size=600x300&maptype=roadmap&markers=color:green%7Clabel:S%7C{{rec.property.property_loc}}&key=<?=$gmapKey?>">
                                        </a>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row dashed-btn-line">
                                        <div class="col-5"><b><?=__('adrs_country')?></b></div>
                                        <div class="col-7"> {{rec.property.adrs_country}}</div>
                                        <div class="col-5"><b><?=__('adrs_city')?></b></div>
                                        <div class="col-7"> {{rec.property.adrs_city}}</div>
                                        <div class="col-5"><b><?=__('adrs_region')?></b></div>
                                        <div class="col-7"> {{rec.property.adrs_region}}</div>
                                        <div class="col-5"><b><?=__('adrs_district')?></b></div>
                                        <div class="col-7"> {{rec.property.adrs_district}}</div>
                                        <div class="col-5"><b><?=__('adrs_street')?></b></div>
                                        <div class="col-7"> {{rec.property.adrs_street}}</div>
                                        <div class="col-5"><b><?=__('adrs_block')?></b></div>
                                        <div class="col-7"> {{rec.property.adrs_block}}</div>
                                        <div class="col-5"><b><?=__('adrs_no')?></b></div>
                                        <div class="col-7"> {{rec.property.adrs_no}}</div>
                                        <div class="col-5"><b><?=__('property_loc')?></b></div>
                                        <div class="col-7"> {{rec.property.property_loc}}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('property_videos')?></label>
                                    <div class="div form-control">
                                        <i><?=__('upload_videos_desc')?></i>
                                        <?=$this->element("tagInput-ng", ["ng"=>"rec.property.property_videos", "placeholder"=>__("property_videos_ph")]);?>
                                    </div>
                                </div>
                                
                                <?php if(in_array($authUser['user_role'], ['admin.content', 'admin.root'])){?>
                                
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('seo_keywords')?></label>
                                    <div class="div form-control">
                                        <?=$this->element("tagInput-ng", ["ng"=>"rec.property.seo_keywords", "placeholder"=>__("seo_keywords_ph")]);?>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12  form-group has-feedback">
                                    <label><?=__('seo_title')?></label>
                                    <div class="div">
                                        <?=$this->Form->control('seo_title', [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>'text',
                                            'ng-model'=>'rec.property.seo_title'
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
                                            'ng-model'=>'rec.property.seo_desc'
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
                                        <button type="submit" id="properties_preloader" class="btn btn-info"><span></span> <i class="fa fa-save"></i> <?=__('save')?></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- SPECS (PARAMS) SECTION -->
                    <div class="col-md-12 col-sm-12" ng-if="rec.property.id>0">
                        <h3><?=__('property_specs_sec')?></h3>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-file-text-o"></i> <?=__('specs_sec')?></h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content" >

                                <?php foreach($this->Do->cat('PROP_SPECS.main') as $k=>$spec){
                                        $list = $this->Do->cat('PROP_SPECS.'.$k);
                                        $type = 'select';
                                        if(!is_array($list)){ $type = 'text'; }
                                    ?>

                                <div class="col-md-4 col-sm-4  form-group has-feedback">
                                    <label><?=__($spec)?></label>
                                    <div class="div">
                                        <?=$this->Form->control($spec, [
                                            'class'=>'form-control has-feedback-left',
                                            'label'=>false,
                                            'type'=>$type,
                                            'ng-model'=>'rec.property.'.$spec,
                                            'options'=>$type=='select' ? $this->Do->lcl( $list ) : false
                                        ])?>
                                        <span class="fa fa-info-circle form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                </div>

                                <?php }?>


                                <div class="clearfix"></div>

                                <div class="form-group ">
                                    <div class="col-md-6 col-sm-6  form-group has-feedback ">
                                        <button type="submit" id="properties_preloader" class="btn btn-info"><span></span> <i class="fa fa-save"></i> <?=__('save')?></button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <!-- FEATURES SECTION -->
                    <div class="col-md-12 col-sm-12" ng-if="rec.property.id>0">
                        <h3><?=__('property_features_sec')?></h3>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2><i class="fa fa-asterisk"></i> <?=__('features_sec')?></h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <?php foreach($this->Do->cat('PROP_FEATURES.main') as $k=>$group){ ?>

                                <div class="">
                                    <b><?=__($group)?></b>
                                </div>

                                    <?php foreach($this->Do->cat('PROP_FEATURES.'.$k) as $k2=>$feature){ ?>

                                    <div class="col-lg-3 col-sm-4 col-6 ">
                                        <label class="mycheckbox">
                                            <?=$this->Form->control($feature, [
                                                'class'=>'form-control ',
                                                'label'=>false,
                                                'type'=>'checkbox',
                                                'ng-model'=>'rec.property.features_ids['.$k2.']',
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
                                        <button type="submit" id="properties_preloader" class="btn btn-info"><span></span> <i class="fa fa-save"></i> <?=__('save')?></button>
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
<?php echo $this->element('Modals/camera')?>
<?php echo $this->element('Modals/addEditSeller')?>
<?php echo $this->element('Modals/addEditDeveloper')?>
<?php echo $this->element('Modals/addEditProject')?>