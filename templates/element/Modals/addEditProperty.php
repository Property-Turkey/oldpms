
<?php
$fields = ['id', 'language_id', 'project_id', 'category_id', 'features_ids', 'property_title', 'property_desc', 'property_photos', 'property_price', 'property_oldprice', 'property_currency', 'property_loc', 'property_ref', 'adrs_country', 'adrs_city', 'adrs_region', 'adrs_district', 'adrs_street', 'adrs_block', 'adrs_no', 'param_netspace', 'param_grossspace', 'param_rooms', 'param_bedrooms', 'param_buildage', 'param_floors', 'param_floor', 'param_heat', 'param_bathrooms', 'param_balconies', 'param_isfurnitured', 'param_usestatus', 'param_monthlytax', 'param_payment', 'param_ownership', 'param_ownertype', 'param_deposit', 'seo_title', 'seo_keywords', 'seo_desc', 'stat_created', 'stat_updated', 'stat_views', 'stat_shares', 'rec_state'];
$ctrl = $this->request->getParam('controller');
$isAdmin = in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor']);

$steps_icons = ['address' => 'map', 'specifications' => 'bars', 'features' => 'asterisk', 'usp' => 'diamond', 'photos_and_more' => 'picture-o', 'docs' => 'file'];
$steps_stats = [
    " 'current', '', '', '', '', '' ",
    " 'done', 'current', '', '', '', '' ",
    " 'done', 'done', 'current', '', '', '' ",
    " 'done', 'done', 'done', 'current', '', '' ",
    " 'done', 'done', 'done', 'done', 'current', '' ",
    " 'done', 'done', 'done', 'done', 'done', 'current' ",
];
?>

<div class="modal fade" id="addEditProperty_mdl" tabindex="-1" role="dialog" aria-hidden="true"
    ng-init="'<?= $ctrl ?>' == 'projects' ? doGet('/admin/properties?cats=1', 'rec', 'projects') : '';">
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <div ng-if="!rec.property.id">
                        <?= __('add_property') ?>
                    </div>
                    <div ng-if="rec.property.id">
                        <?= __('edit_property') ?>
                    </div>
                </h4>
            </div>
            <div class="modal-body" id="accordion">
            <div id="properties_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div>
                            <?= __('please_wait') ?>
                        </div>
                    </div>
                <button type="button" id="property_btn" class="hideIt" ng-click="
                    newEntity('doc');
                    filesInfo.doc_file=[];
                    filesInfo.property_photos=[];
                    param1>0 ? doGet('/admin/properties?id='+param1, 'rec', 'property') : '';
                    "></button>

                <form class="row"  id="property_form" ng-submit="
                    chkSteps(rec.property, curr_step);
                ">
                    
                    <div id="properties_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div>
                            <?= __('please_wait') ?>
                        </div>
                    </div>

                    <div id="main_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div>
                            <?= __('please_wait') ?>
                        </div>
                    </div>


                <!-- STEP 1 Set Address -->
                    <div class="accordion col-12"data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        <div class="card-header  text-center" id="step1">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold" type="button" >
                                    <i class="fa fa-map-marker"></i> <?= __('Map') ?>
                                </button>
                            </h2>
                        </div>
                     </div>   

                    <div id="collapse1" class="mb-2collapse show" aria-labelledby="step1" data-parent="#accordion">
                        <div class="card-body">
                        <div class="col-12 ">
                    <div class="x_title">
                        <h2><i class="fa fa-map-marker"></i>
                            <?= __('set_address') ?>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Prompet 1 -->
                    <div class="col-md-12 col-12 mb-3 ngif"
                        ng-if="step2.isCurrentLocPrompet && !rec.property.adrs_country">
                        <div class="prompet">
                            <div class="big-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <p>
                                <?= __('are_you_in_the_location') ?>
                            </p>
                            <button type="button" class="btn btn-success" ng-click="
                getLoc('', 'property');
                step2.isCurrentLocPrompet=false;
                step2.isMapShow=true;">
                                <?= __('yes') ?>
                            </button>
                            <button type="button" class="btn btn-danger" ng-click="
                step2.isItInProjectPrompet=true;
                step2.isCurrentLocPrompet=false;">
                                <?= __('no') ?>
                            </button>
                        </div>
                    </div>
                    <!-- Prompet 2 -->
                    <div class="col-md-12 col-12 mb-3 ngif"
                        ng-if="step2.isItInProjectPrompet && !rec.property.adrs_country">
                        <div class="prompet">
                            <div class="big-icon">
                                <i class="fa fa-building"></i>
                            </div>
                            <p>
                                <?= __('is_it_in_project') ?>
                            </p>
                            <button type="button" class="btn btn-success" ng-click="
                step2.isProjectShow=true;
                step2.isItInProjectPrompet=false;">
                                <?= __('yes') ?>
                            </button>
                            <button type="button" class="btn btn-danger" ng-click="
                step2.isMapShow=true;
                step2.isItInProjectPrompet=false;
                openModal('#map_mdl');
                initMap();">
                                <?= __('no') ?>
                            </button>
                        </div>
                    </div>

                    <div class="col-md-12 col-12 mb-3 ngif" ng-show="step2.isMapShow">

                        <label class="big-icon">
                            <span>
                                <a href data-toggle="modal" data-target="#map_mdl" data-dismiss="modal"
                                    ng-click="
                        initMap();
                    ">
                                    <i class="fa fa-map"></i>
                                    <?= __("add_location") ?>
                                </a>
                            </span>

                            <div id="getLoc_loader" class="float-icon"><span></span></div>

                        </label>
                        <?php /*?>
                            <div class="col-md-12 gmapImg" ng-if="rec.property.property_loc">
                                <a href data-toggle="modal" data-target="#map_mdl" data-dismiss="modal"  
                                        ng-click="
                                            initMap();
                                        ">
                                    <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center={{rec.property.property_loc}}&zoom=13&size=600x300&maptype=roadmap&markers=color:green%7Clabel:S%7C{{rec.property.property_loc}}&key=<?=$gmapKey?>">
                                </a>
                            </div>
                            <?php */ ?>
                    </div>

                    <div class="col-md-12 col-sm-12 form-group has-feedback ngif"
                        ng-show="step2.isProjectShow">
                        <label>
                            <?= __('project_id') ?>
                        </label>
                        <div class="div">
                            <select class="form-control selectpicker" ng-change="rec.property.project_id=='add' ?
                    openModal('#addEditProject_mdl') : 
                    (rec.property.project_id > 0 ? getProjectLoc(rec.property.project_id) : '')"
                                ng-model="rec.property.project_id" data-live-search="true"
                                data-size="4">
                                <option value="0">
                                    <?= __('select_project') ?>
                                </option>
                                <option value="add">
                                    <?= __('add_new_project') ?>
                                </option>
                                <option ng-value="key" ng-repeat="(key, itm) in lists.projects_list">
                                    {{itm}}</option>
                            </select>
                            <!-- <span class="fa fa-building-o form-control-feedback left" aria-hidden="true"></span> -->
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 form-group has-feedback"
                        ng-show="rec.property.adrs_country">
                        <label set-required>
                            <?= __('category_id') ?>
                        </label>
                        <div class="div">
                            <?= $this->Form->control('category_id', [
                                'options' => $this->Do->lcl($this->Do->cat('PROP_CATEGORIES')),
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select',
                                'ng-model' => 'rec.property.category_id'
                            ]) ?>
                            <span class="fa fa-bars form-control-feedback left"
                                aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <label>
                            <?= __('property_ref') ?>
                        </label>
                        <div class="div">
                            <?= $this->Form->control('property_ref', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'text',
                                'ng-disabled' => "!isDisabled['property_ref']",
                                'ng-model' => 'rec.property.property_ref',
                            ]) ?>
                            <span class="fa fa-anchor form-control-feedback left"
                                aria-hidden="true"></span>
                        </div>
                        <a href class="btn btn-info btn-sm float-btn"
                            ng-show="!isDisabled['property_ref']" ng-click="
                isDisabled['property_ref']=true;">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>

                    <div class="col-md-12" ng-show="rec.property.adrs_country">
                        <div class="row dashed-btn-line">

                            <div class="col-5"><b set-required>
                                    <?= __('adrs_country') ?>
                                </b></div>
                            <div class="col-7">
                                <input type="text" placeholder="<?= __('adrs_country') ?>"
                                    class="btm-line-input" ng-model="rec.property.adrs_country"
                                    name="adrs_country">
                            </div>

                            <div class="col-5"><b set-required>
                                    <?= __('adrs_city') ?>
                                </b></div>
                            <div class="col-7">
                                <input type="text" placeholder="<?= __('adrs_city') ?>"
                                    class="btm-line-input" ng-model="rec.property.adrs_city"
                                    name="adrs_city">
                            </div>

                            <div class="col-5"><b set-required>
                                    <?= __('adrs_region') ?>
                                </b></div>
                            <div class="col-7">
                                <input type="text" placeholder="<?= __('adrs_region') ?>"
                                    class="btm-line-input" ng-model="rec.property.adrs_region"
                                    name="adrs_region">
                            </div>

                            <div class="col-5"><b>
                                    <?= __('adrs_district') ?>
                                </b></div>
                            <div class="col-7">
                                <input type="text" placeholder="<?= __('adrs_district') ?>"
                                    class="btm-line-input" ng-model="rec.property.adrs_district"
                                    name="adrs_district">
                            </div>

                            <div class="col-5"><b>
                                    <?= __('adrs_street') ?>
                                </b></div>
                            <div class="col-7">
                                <input type="text" placeholder="<?= __('adrs_street') ?>"
                                    class="btm-line-input" ng-model="rec.property.adrs_street"
                                    name="adrs_street">
                            </div>

                            <div class="col-5"><b set-required>
                                    <?= __('adrs_block') ?>
                                </b></div>
                            <div class="col-7">
                                <input type="text" placeholder="<?= __('adrs_block') ?>"
                                    class="btm-line-input" ng-model="rec.property.adrs_block"
                                    name="adrs_block">
                            </div>

                            <div class="col-5"><b set-required>
                                    <?= __('adrs_no') ?>
                                </b></div>
                            <div class="col-7">
                                <input type="text" placeholder="<?= __('adrs_no') ?>"
                                    class="btm-line-input" ng-model="rec.property.adrs_no"
                                    name="adrs_no">
                            </div>

                            <div class="col-5"><b>
                                    <?= __('property_loc') ?>
                                </b></div>
                            <div class="col-7"> {{rec.property.property_loc}}</div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">

                        <!-- <button type="submit" id="properties_preloader" class="btn btn-info"
                            ng-click="toElm();">
                            <span></span> <i class="fa fa-save"></i>
                            <?= __('save_and_continue') ?>
                        </button> -->

                        <button type="button" ng-click="
                            step2 = {
                                isCurrentLocPrompet: true,
                                isItInProjectPrompet: false,
                                isMapShow: false,
                                isProjectShow: false
                            };
                            rec.property.adrs_country = '';
                            rec.property.adrs_city = '';
                            rec.property.adrs_region = '';
                            rec.property.adrs_district = '';
                            rec.property.adrs_street = '';
                            rec.property.adrs_block = '';
                            rec.property.adrs_no = '';
                            rec.property.property_loc = '';
                            rec.property.project_id = '0';
                        " class="btn btn-warning">
                            <span></span> <i class="fa fa-refresh"></i>
                            <?= __('reset') ?>
                        </button>

                    </div>
                </div>

                        </div>
                    </div>
                    
                    
                    

                    <?php // STEP 2 Set Specifications   ?>
                    <div class="accordion col-12"data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
                        <div class="card-header  text-center" id="step2">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold" type="button">
                                    <i class="fa fa-map-marker"></i> <?= __('specs_sec') ?>
                                </button>
                            </h2>
                        </div>
                    </div>


                    <div class="col-12 absMessage collapse" id="collapse2"  aria-labelledby="step2" data-parent="#accordion">
                        <div class="x_title">
                            <h2><i class="fa fa-file-text-o"></i>
                                <?= __('specs_sec') ?>
                            </h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <?php
                            foreach ($this->Do->cat('PROP_SPECS.main') as $k => $spec) {
                                // if(in_array($spec, ['param_payment', 'param_ownership', 'param_deposit', 'param_bedrooms', 'param_ownertype', 'param_monthlytax'])){
                                //     continue;
                                // } 
                                $icon = $spec == 'param_titledeed' ? 'try' : 'info-circle';
                                $isRequired = '';
                                if (in_array($spec, ['param_isresale', 'param_iscitizenship', 'param_rooms', 'param_floor', 'param_buildage', 'param_grossspace'])) {
                                    $isRequired = 'set-required';
                                }
                                $list = $this->Do->cat('PROP_SPECS.' . $k);
                                $type = 'select';
                                if (!is_array($list)) {
                                    $type = 'text';
                                }
                                if (is_array($list)) {
                                    if (count($list) < 3) {
                                        $type = 'radio';
                                    }
                                }
                                if ($type == "radio") { ?>

                                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                                        <label <?= $isRequired ?>>
                                            <?= __($spec) ?>
                                        </label>
                                        <div class="div specsRadioBtn">
                                            <label class="myradiobtn">
                                                <input type="radio" ng-model="rec.property.<?= $spec ?>"
                                                    name="<?= $spec ?>" value="1" /> <span></span>
                                                <?= __('yes') ?>
                                            </label>&nbsp;
                                            <label class="myradiobtn">
                                                <input type="radio" ng-model="rec.property.<?= $spec ?>"
                                                    name="<?= $spec ?>" value="0" /> <span></span>
                                                <?= __('no') ?>
                                            </label>
                                        </div>
                                    </div>

                                <?php } else { ?>

                                    <div class="col-md-6 col-sm-6 form-group has-feedback">
                                        <label <?= $isRequired ?>>
                                            <?= __($spec) ?>
                                        </label>
                                        <div class="div">
                                            <?= $this->Form->control($spec, [
                                                'class' => 'form-control has-feedback-left',
                                                'label' => false,
                                                'type' => $type,
                                                'ng-model' => 'rec.property.' . $spec,
                                                'options' => $type == 'select' ? $this->Do->lcl($list) : false,
                                                'mask-currency' => 'false',
                                                'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
                                            ]) ?>
                                            <span class="fa fa-<?= $icon ?> form-control-feedback left"
                                                aria-hidden="true"></span>
                                        </div>
                                    </div>

                                <?php } ?>
                            <?php } ?>

                            <div class="clearfix"></div>

                            <div class="col-md-12 col-sm-12">
                                <!-- <button type="submit" id="properties_preloader" class="btn btn-info"
                                    ng-click="toElm();">
                                    <span></span> <i class="fa fa-save"></i>
                                    <?= __('save_and_continue') ?>
                                </button> -->
                            </div>
                        </div>
                    </div>
                        


                    <?php // STEP 3 Set Features   ?>

                    <div class="accordion col-12"data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
                        <div class="card-header  text-center" id="step3">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold" type="button">
                                    <i class="fa fa-map-marker"></i> <?= __('features_sec') ?>
                                </button>
                            </h2>
                        </div>
                
                    </div>
                    
                    <div  id="collapse3" class="col-12 absMessage collapse" aria-labelledby="step3" data-parent="#accordion">

                        <div class="col-12 ">
                        <div class="x_title">
                            <h2><i class="fa fa-asterisk"></i>
                                <?= __('features_sec') ?>
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" id="accordion_features">

                            <?php foreach ($this->Do->cat('PROP_FEATURES.main') as $k => $group) {
                                $isRequired2 = '';
                                if (in_array($group, ['direction', 'scenery'])) {
                                    $isRequired2 = 'set-required';
                                } ?>

                                <div class="accordion_header absMessage" data-toggle="collapse"
                                    data-target="#<?= $group ?>">
                                    <div name="<?= $group ?>"></div>
                                    <h2 <?= $isRequired2 ?>>
                                        <?= __($group) ?> <span class="fa fa-caret-down"></span>
                                    </h2>
                                </div>

                                <div id="<?= $group ?>"
                                    class="row collapse <?= $group == 'direction' ? 'show' : '' ?>"
                                    data-parent="#accordion_features" style="padding-bottom: 6px;">
                                    <?php foreach ($this->Do->cat('PROP_FEATURES.' . $k) as $k2 => $feature) { ?>

                                        <div class="col-lg-3 col-sm-4 col-6 " style="padding-bottom:10px">
                                            <label class="mycheckbox">
                                                <?= $this->Form->control($feature, [
                                                    'class' => 'form-control ',
                                                    'label' => false,
                                                    'type' => 'checkbox',
                                                    'ng-model' => 'rec.property.features_ids[' . $k2 . ']',
                                                    'ng-value' => $k2,
                                                    'templates' => [
                                                        'inputContainer' => '{{content}}'
                                                    ]
                                                ]) ?>
                                                <span></span>&nbsp;<span class="chkbox_text">
                                                    <?= __($feature) ?>
                                                </span>
                                            </label>
                                        </div>

                                    <?php } ?>
                                </div>
                                <div class="clearfix mb-2"></div>
                                <?php $isRequired2 = '';
                            } ?>

                            <div class="accordion_header absMessage" data-toggle="collapse"
                                data-target="#facilities" ng-hide="rec.property.project_id>1">
                                <div name="facilities"></div>
                                <h2 <?= $isRequired2 ?>>
                                    <?= __('facilities') ?> <span class="fa fa-caret-down"></span>
                                </h2>
                            </div>
                            <div id="facilities" class="row collapse" data-parent="#accordion_features"
                                style="padding-bottom: 6px;">

                                <?php foreach ($this->Do->cat('PROP_FACILITIES.main') as $k => $group) { ?>
                                    <div class="col-12"><b>
                                            <?= __($group) ?>
                                        </b></div>

                                    <?php foreach ($this->Do->cat('PROP_FACILITIES.' . $k) as $k2 => $facility) { ?>
                                        <div class="col-lg-3 col-sm-4 col-6 " style="padding-bottom:10px">
                                            <label class="mycheckbox">
                                                <?= $this->Form->control($facility, [
                                                    'class' => 'form-control ',
                                                    'label' => false,
                                                    'type' => 'checkbox',
                                                    'ng-model' => 'rec.property.features_ids[' . $k2 . ']',
                                                    'ng-value' => $k2,
                                                    'templates' => [
                                                        'inputContainer' => '{{content}}'
                                                    ]
                                                ]) ?>
                                                <span></span>&nbsp;<span class="chkbox_text">
                                                    <?= __($facility) ?>
                                                </span>
                                            </label>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <div class="">
                                <!-- <button type="submit" id="properties_preloader" class="btn btn-info"
                                    ng-click="toElm();">
                                    <span></span> <i class="fa fa-save"></i>
                                    <?= __('save_and_continue') ?>
                                </button> -->
                            </div>
                        </div>
                    </div>
                        
                    </div>
                


                    <?php // STEP 4 Set Unique Sell Points   ?>

                    <div class="accordion col-12"data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapse4">
                        <div class="card-header  text-center" id="step4">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold" type="button">
                                    <i class="fa fa-map-marker"></i> <?= __('usp') ?>
                                </button>
                            </h2>
                        </div>
                    </div>
                    
                    <div  id="collapse4" class="col-12 absMessage collapse" aria-labelledby="step4" data-parent="#accordion">

                            <div class="col-12 ">
                            <div class="x_title">
                                <h2><i class="fa fa-diamond"></i>
                                    <?= __('usp') ?>
                                </h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <?php if ($isAdmin || $authUser['user_role'] == 'admin.portfolio') { ?>
                                    <div class="col-md-12 col-sm-12">
                                        <?= $this->element('tagInput-ng', ['ng' => 'rec.property.property_usp', 'placeholder' => __('add_usp')]) ?>
                                    </div>

                                    <div class="col-md-12 col-sm-12">
                                        <!-- <button type="submit" id="properties_preloader" class="btn btn-info"
                                            ng-click="toElm();">
                                            <span></span> <i class="fa fa-save"></i>
                                            <?= __('save_and_continue') ?>
                                        </button> -->
                                    </div>
                                <?php } else { ?>

                                    <div class="col-12 not_found_div"><i class="fa fa-info-circle"></i>
                                        <?= __('available_only_for_admins') ?>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                    

                    


                    <?php // STEP 5 Set Description, Price, Photos, Videos and more   ?>

                    <div class="accordion col-12"data-toggle="collapse" data-target="#collapse5" aria-expanded="true" aria-controls="collapse5">
                        <div class="card-header  text-center" id="step6">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold" type="button">
                                    <i class="fa fa-map-marker"></i> <?= __('property_desc') ?>
                                </button>
                            </h2>
                        </div>
                    </div>
                    
                    <div  id="collapse5" class="col-12 absMessage collapse" aria-labelledby="step5" data-parent="#accordion">

                    <div class="col-12 ">
                    <div class="x_title">
                        <h2><i class="fa fa-picture-o"></i>
                            <?= __('property_desc') ?>
                        </h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <label>
                            <?= __('property_title') ?>
                        </label>
                        <div class="div">
                            <?= $this->Form->control('property_title', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'textarea',
                                'textarea-expander' => '',
                                'rows' => '2',
                                'ng-model' => 'rec.property.property_title',
                                'ng-disabled' => "!isDisabled['property_title']",
                            ]) ?>
                            <span class="fa fa-header form-control-feedback left"
                                aria-hidden="true"></span>

                            <a href class="btn btn-info btn-sm float-btn"
                                ng-show="!isDisabled['property_title']" ng-click="
                    rec.property.property_title=rec.property.property_title.replace('[auto]', '');
                    isDisabled['property_title']=true;">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-6 mb-3 ngif">
                        <label>
                            <?= __('property_currency') ?>
                        </label>
                        <div class="div">
                            <?= $this->Form->control('property_currency', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'select',
                                'ng-model' => 'rec.property.property_currency',
                                'options' => $this->Do->lcl($this->Do->get('currencies'))
                            ]) ?>
                            <span class="fa fa-money form-control-feedback left"
                                aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-8 mb-3 ngif">
                        <label>
                            <?= __('property_price') ?>
                        </label>
                        <div class="div">
                            <?= $this->Form->control('property_price', [
                                'class' => 'form-control has-feedback-left money',
                                'label' => false,
                                'type' => 'text',
                                'ng-model' => 'rec.property.property_price',
                                'mask-currency' => 'false',
                                'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
                            ]) ?>
                            <span
                                class="fa fa-{{DtSetter('currencies', rec.property.property_currency ).toLowerCase()}} form-control-feedback left"
                                aria-hidden="true"></span>
                        </div>
                    </div>


                    <?php /*<div class="col-md-6 col-sm-6 mb-3 ngif">
<label><?=__('property_oldprice')?></label>
<div class="div">
    <?=$this->Form->control('property_oldprice', [
        'class'=>'form-control has-feedback-left money',
        'label'=>false,
        'type'=>'text',
        'ng-model'=>'rec.property.property_oldprice',
        'mask-currency'=>'false',
        'config'=>"{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
    ])?>
    <span class="fa fa-{{DtSetter('currencies', rec.property.property_currency ).toLowerCase()}} form-control-feedback left" aria-hidden="true"></span>
</div>
</div> */ ?>

                    <div class="col-md-12 col-sm-12 mb-3 ngif">
                        <label>
                            <?= __('param_ownertype') ?>
                        </label>
                        <div class="div">
                            <select class="form-control has-feedback-left"
                                ng-change="rec.property.param_ownertype > 0 ? doGet('/admin/properties?seller_cat='+rec.property.param_ownertype, 'rec', 'sellers_list') : ''; "
                                ng-model="rec.property.param_ownertype">
                                <option value="0">
                                    <?= __('param_ownertype') ?>
                                </option>
                                <option value="-1">
                                    <?= __('the_seller_is_the_developer') ?>
                                </option>
                                <option ng-value="key"
                                    ng-repeat="(key, itm) in DtSetter('SELLERS_TYPE', 'list')">{{itm}}
                                </option>
                            </select>
                            <span class="fa fa-bars form-control-feedback left"
                                aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 mb-3 ngif"
                        ng-if="rec.property.param_ownertype !== '-1'">
                        <label>
                            <?= __('seller_id') ?>
                        </label>
                        <div class="div">
                            <select class="form-control has-feedback-left"
                                ng-change="rec.property.seller_id=='add' ? openModal('#addEditSeller_mdl') : ''"
                                ng-model="rec.property.seller_id"
                                ng-disabled="rec.property.param_ownertype<1">
                                <option value="0">
                                    <?= __('select_seller') ?>
                                </option>
                                <option value="add">
                                    <?= __('add_new_seller') ?>
                                </option>
                                <option ng-value="key" ng-repeat="(key, itm) in lists.sellers_list">
                                    {{itm}}</option>
                            </select>
                            <span class="fa fa-handshake-o form-control-feedback left"
                                aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 mb-3 ngif">
                        <label>
                            <?= __('developer_id') ?>
                        </label>
                        <div class="div">
                            <select class="form-control has-feedback-left"
                                ng-change="rec.property.developer_id=='add' ? openModal('#addEditDeveloper_mdl') : ''"
                                ng-model="rec.property.developer_id">
                                <option value="0">
                                    <?= __('select_developer') ?>
                                </option>
                                <option value="add">
                                    <?= __('add_new_developer') ?>
                                </option>
                                <option ng-value="key" ng-repeat="(key, itm) in lists.developers_list">
                                    {{itm}}</option>
                            </select>

                            <span class="fa fa-cubes form-control-feedback left"
                                aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <label class="big-icon">
                            <span>
                                <i class="fa fa-picture-o"></i>
                                <?= __("add_photos") ?>
                                <?= $this->Form->control('property_photos', [
                                    'class' => 'form-control hideIt',
                                    'type' => 'file',
                                    'file-model' => 'files.property_photos',
                                    'multiple' => true,
                                    'ng-model' => 'rec.property.property_photos',
                                    'id' => 'property',
                                    'label' => false,
                                    'accept' => '.png,.jpeg,.jpg',
                                    'capture' => 'capture',
                                ]) ?>
                            </span>
                            <span class="hideWebInline">
                                <a href="" ng-click="openCamera(); currTab = 'take_photo'; ">
                                    <i class="fa fa-camera"></i>
                                    <?= __("open_camera") ?>
                                </a>
                            </span>
                        </label>
                        <div class="img_thumb">
                            <span ng-repeat="img in rec.property.property_photos track by $index"
                                class="img">
                                <a href class="overly_btn"
                                    ng-click="
                        delImage('/admin/properties/delimage/'+rec.property.id,{image: img.name, id: rec.property.id}, '#property_btn')">
                                    <i class="fa fa-times"></i>
                                </a>
                                <img ng-src="{{getPhoto( img.tmp_name, img.name, 'properties')}}" alt=""
                                    show-img="">
                            </span>
                            <span ng-repeat="img in filesInfo.property_photos track by $index"
                                class="img">
                                <a href class="overly_btn" ng-click="
                        filesInfo.property_photos.splice($index, 1);">
                                    <i class="fa fa-times"></i>
                                </a>
                                <img ng-src="{{getPhoto( img.tmp_name, img.name, 'properties')}}" alt=""
                                    show-img="" class="newImg">
                            </span>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12  form-group has-feedback">
                        <label>
                            <?= __('property_videos') ?>
                        </label>
                        <div class="div form-control">
                            <i>
                                <?= __('upload_videos_desc') ?>
                            </i>
                            <?= $this->element("tagInput-ng", ["ng" => "rec.property.property_videos", "placeholder" => __("property_videos_ph")]); ?>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 form-group has-feedback">
                        <label>
                            <?= __('property_desc') ?>
                        </label>
                        <div class="div">
                            <?= $this->Form->control('property_desc', [
                                'class' => 'form-control has-feedback-left',
                                'label' => false,
                                'type' => 'textarea',
                                'ng-model' => 'rec.property.property_desc',
                                'ckeditor' => 'ckoptions'
                            ]) ?>
                            <span class="fa fa-barssss form-control-feedback left"
                                aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <!-- <button type="submit" id="properties_preloader" class="btn btn-info"
                            ng-click="toElm()">
                            <span></span> <i class="fa fa-save"></i>
                            <?= __('save') ?>
                        </button> -->
                        <button type="submit" id="properties_preloader" class="btn btn-warning"
                            ng-click="isRedirect = true; toElm()">
                            <span></span> <i class="fa fa-save"></i>
                            <?= __('save_finish_and_close') ?>
                        </button>
                    </div>
                </div>
                        
                    </div>
                    

                    <?php // STEP 6 DOCS upload docs   ?>

                    <!-- <div class="accordion col-12"data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                        <div class="card-header  text-center" id="step6">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-dark font-weight-bold" type="button">
                                    <i class="fa fa-map-marker"></i> <?= __('property_desc') ?>
                                </button>
                            </h2>
                        </div>
                    </div>
                    
                    <div  id="collapse6" class="col-12 absMessage collapse" aria-labelledby="step6" data-parent="#accordion">

                        <div class="col-12 ">
                            <div class="x_title">
                                <h2><i class="fa fa-file"></i>
                                    <?= __('docs') ?>
                                </h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <?php echo $this->element('Includes/docs'); ?>

                            </div>
                        </div>
                        
                    </div> -->
                    

                </form>
                <!-- <div class="col-md-12 col-sm-12">
                        <button type="submit" id="properties_preloader" class="btn btn-info"
                            ng-click="toElm()">
                            <span></span> <i class="fa fa-save"></i>
                            <?= __('save') ?>
                        </button>
                        <button type="submit" id="properties_preloader" class="btn btn-warning"
                            ng-click="isRedirect = true; toElm()">
                            <span></span> <i class="fa fa-save"></i>
                            <?= __('finish_and_close') ?>
                        </button>
                    </div> -->
            </div>
            

                    
        </div>
    </div>
</div>

