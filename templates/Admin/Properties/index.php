<?php
$from = $this->request->getQuery('from');
$to = $this->request->getQuery('to');
$k = $this->request->getQuery('k');
$col = $this->request->getQuery('col');
$method = $this->request->getQuery('method');

$params = http_build_query(($this->request->getQuery()));
// dd($params);

?>
<div class="right_col" role="main" ng-init="
        doGet('/admin/properties/index?list=1&page='+paging.page+'&<?= $params ?>', 'list', 'properties');
        doGet('/configs/cat/all', 'list', 'categories');
    ">
    <div class="">
        <div class="page-title">
            <div class=" col-6 col-sm-6 col-md-6  side_div1">
                <h3><?= __('properties_list') ?></h3>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2">
                <span class="icn">
                    <a href data-toggle="modal" data-target="#search_mdl" data-dismiss="modal" class="btn btn-info">
                        <span class="fa fa-search"></span> <span class="hideMob"><?= __('search_and_filter') ?></span>
                    </a>
                </span>
                <!-- <span class="icn">
                    <a href="<?= $app_folder ?>/<?= $currlang ?>/admin/properties/wizard" class="btn btn-info">
                        <span class="fa fa-plus"></span> <span class="hideMob"><?= __('add_property') ?></span>
                    </a>
                </span> -->
                <span class="icn">
                    <a href class="btn btn-info" ng-click="
                            newEntity('property');
                            openModal('#addEditProperty_mdl')" >
                        <span class="fa fa-plus"></span> <span class="hideMob"><?=__('add_property')?></span>
                    </a>
                </span>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-12">
                <div class="x_panel">

                    <div id="main_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div><?= __('please_wait') ?></div>
                    </div>

                    <div class="x_title">
                        <h2><b><?= __('properties_list') ?></b>
                            <span> <?= __('show') . ' ' . __('from') ?>
                                {{ paging.start  }} <?= __('to') ?>
                                {{ paging.end }} <?= __('of') ?> {{ paging.count }} </span>
                        </h2>
                        <div>
                            <div class="filterShow">
                                <div ng-repeat="(key, val) in rec.search" ng-if="!empty(val)">

                                    <?php // address
                                    ?>
                                    <div ng-if=" 'adrs_country,adrs_city,adrs_region,adrs_district'.indexOf(key) > -1">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span>
                                            <a href ng-click="removeFilter('adrs', key)"> {{ val }} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // my properties
                                    ?>
                                    <div ng-if=" key == 'user_id' ">
                                        <span>
                                            <a href ng-click="removeFilter('adrs', key)"><?=__('myProperties')?> <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // language
                                    ?>
                                    <div ng-if=" key == 'language_id' ">
                                        <b><?= __('language_id') ?></b>:
                                        <span>
                                            <a href ng-click="removeFilter('language_id')"> {{ DtSetter('language_id', val) }} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // category id
                                    ?>
                                    <div ng-if=" key == 'category_id' ">
                                        <b><?= __('category_id') ?></b>:
                                        <span>
                                            <a href ng-click="removeFilter('category_id')"> {{ DtSetter('PROP', val) }} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // projects 
                                    ?>
                                    <div ng-if="isArray(val) && key == 'project_id'">
                                        <b><?= __('projects') ?></b>:
                                        <span ng-repeat="(key2, val2) in val track by $index">
                                            <a href ng-click="removeFilter('specs', key, $index)"> {{lists.projects_list[val2]}}<i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // non numeric( non-sliders ) specs
                                    ?>
                                    <div ng-if="
                                        isArray(val) && 
                                        'project_id,param_isfurnitured,param_isresale,param_iscitizenship,param_iscommission_included,param_isresidence,param_monthlytax,param_deposit,param_grossspace,param_netspace,features_ids,old,property_price,property_usp'.indexOf(key) == -1">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span ng-repeat="(key2, val2) in val track by $index" ng-if="isArray(val)">
                                            <a href ng-click="removeFilter('specs', key, $index)"> {{lists.categories['PROP_SPECS'][val2]}}<i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // none array ( one id ) specs
                                    ?>
                                    <div ng-if="
                                        !isArray(val) && 
                                        'param_isfurnitured,param_isresale,property_price,param_iscitizenship,param_iscommission_included,param_isresidence'.indexOf(key) > -1">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span>
                                            <a href ng-click="removeFilter('specs_one_id', key, $index)"> {{DtSetter('bool3', val)}} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // numeric( sliders ) specs
                                    ?>
                                    <div ng-if="
                                        'param_monthlytax,param_deposit,param_grossspace,param_netspace,property_price'.indexOf(key) > -1">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span>
                                            <a href ng-click="removeFilter('slide', key, val)"> {{ nFormat(val[0])+' - '+nFormat(val[1]) }} {{key=='property_price' ? DtSetter('currencies', rec.search.property_currency) : ''}}<i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // search input
                                    ?>
                                    <div ng-if=" key == 'keyword' ">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span>
                                            <a href ng-click="removeFilter('keyword')"> {{val}} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // search updated
                                    ?>
                                    <div ng-if=" key == 'stat_updated' ">
                                        <b><?= __('rec_state') ?></b>:
                                        <span>
                                            <a href ng-click="removeFilter(key)"> {{val==1 ? '<?= __('updated') ?>' : '<?= __('outdated') ?>'}} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // search stat_created
                                    ?>
                                    <div ng-if=" key == 'stat_created' ">
                                        <b><?= __('rec_state') ?></b>:
                                        <span>
                                            <a href ng-click="removeFilter(key)"> {{val}} <i class="fa fa-times"></i> </a>
                                        </span>
                                    </div>

                                    <?php // features checkbox
                                    ?>
                                    <div ng-if=" key == 'features_ids' && !empty(val)">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span ng-repeat="(key3, val3) in val" ng-if="val3">
                                            <a href ng-click="removeFilter('features_ids', key3)"> {{lists.categories['PROP_FEATURES'][key3]}}<i class="fa fa-times"></i></a>
                                        </span>
                                    </div>

                                    <?php // usp checkbox
                                    ?>
                                    <div ng-if=" key == 'property_usp' && !empty(val)">
                                        <b>{{lists.categories['PROP_SPECS_keys'][key]}}</b>:
                                        <span ng-repeat="(key4, val4) in val" ng-if="val4">
                                            <a href ng-click="removeFilter('property_usp', key4)"> {{DtSetter( 'USP', key4 )}}<i class="fa fa-times"></i></a>
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])) { ?>
                            <ul class="nav navbar-right panel_toolbox">
                                <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li> -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-paper-plane"></i> <?= __('assign_to_content_manager') ?>
                                    </a>
                                    <div class="dropdown-menu  <?= $currlang != 'ar' ? 'dropdown-menu-right' : '' ?>">
                                        <?php foreach ($contentManagers as $id => $contentManager) { ?>
                                            <a href ng-click="multiHandle('/admin/properties/assign/<?= $id ?>');" class="dropdown-item">
                                                <i class="fa fa-user"></i> <?= $contentManager ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu  <?= $currlang != 'ar' ? 'dropdown-menu-right' : '' ?>">

                                        <a href ng-click="multiHandle('/admin/properties/enable/1')" class="dropdown-item">
                                            <i class="fa fa-check"></i> <?= __('enable_selected') ?>
                                        </a>
                                        <a href ng-click="multiHandle('/admin/properties/enable/0')" class="dropdown-item">
                                            <i class="fa fa-times"></i> <?= __('disable_selected') ?>
                                        </a>
                                        <a href ng-click="multiHandle('/admin/properties/enable/2')" class="dropdown-item">
                                            <i class="fa fa-bookmark"></i> <?= __('sold_selected') ?>
                                        </a>

                                        <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin'])) { ?>
                                            <a href ng-click="multiHandle('/admin/properties/delete')" class="dropdown-item">
                                                <i class="fa fa-trash"></i> <?= __('delete_selected') ?>
                                            </a>
                                        <?php } ?>

                                    </div>
                                </li>
                                <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> 
                            </li> -->
                            </ul>
                        <?php } ?>

                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="grayText">
                            <span class="badge badge-bordered">
                                <i class="fa fa-retweet greenText"></i> = <?= __('param_isresale') ?>
                            </span>
                            <span class="badge badge-bordered">
                                <i class="fa fa-address-card-o orangeText"></i> = <?= __('param_iscitizenship') ?>
                            </span>
                            <span class="badge badge-bordered">
                                <i class="fa fa-check-circle greenText"></i> = <?= __('active') ?>
                                <i class="fa fa-times-circle redText"></i> = <?= __('inactive') ?>
                                <i class="fa fa-bookmark orangeText"></i> = <?= __('sold') ?>
                            </span>
                            <span class="badge badge-bordered">
                                <i class="fa fa-thumb-tack greenText"></i> = <?= __('published_on_website') ?>
                                <i class="fa fa-thumb-tack redText"></i> = <?= __('assigned_to_content') ?>
                            </span>
                            <span class="badge badge-bordered">
                                <i class="fa fa-globe greenText"></i> = <?= __('param_isresidence') ?>
                            </span>
                        </div>
                    </div>

                    <div class="x_content">
                        <div class="grid ">
                            <div class="grid_header row">
                                <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])) { ?>
                                    <div class="col-sm-1 col column-title">
                                        <?= $this->element('colActions', ['url' => 'properties/index/', 'col' => 'id']) ?>
                                        <label class="mycheckbox">
                                            <input type="checkbox" ng-click="chkAll('.chkb', !selectAll)" ng-model="selectAll">
                                            <span></span>
                                            <?= __('id') ?>
                                        </label>
                                    </div>
                                <?php } ?>

                                <div class="col-sm-3 col column-title">
                                    <?= $this->element('colActions', ['url' => 'properties/index/', 'col' => 'property_title', 'search' => 'property_title']) ?>
                                    <?= __('property_title') ?> </div>

                                <div class="col-sm-2 col column-title">
                                    <?= $this->element('colActions', ['url' => 'properties/index/', 'col' => 'property_price']) ?>
                                    <?= __('property_price') ?> </div>

                                <div class="col-sm-3 col column-title"> <?= __('address') ?> </div>

                                <div class="col-sm-1 col column-title">
                                    <?= $this->element('colActions', ['url' => 'properties/index/', 'col' => 'rec_state', 'filter' => $this->Do->lcl($this->Do->get('stats'))]) ?>
                                    <?= __('rec_state') ?> </div>

                                <div class="col-sm-2 col column-title hideMob"><span class="nobr"><?= __('action') ?></span>
                                </div>
                            </div>

                            <div class="grid_row row" ng-repeat="itm in lists.properties track by $index">

                                <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])) { ?>
                                    <div class="col-sm-1 hideMobSm grid_header">
                                        <label class="mycheckbox chkb">
                                            <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                            <span></span> {{ itm.id }}
                                        </label>
                                    </div>

                                    <div class="col-4 hideWeb grid_header">
                                        <?= __('id') ?>
                                        <label class="mycheckbox chkb">
                                            <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                            <span></span>
                                        </label>
                                    </div>

                                    <div class="col-md-1 col-8 hideWeb">{{ itm.id }}</div>
                                <?php } ?>

                                <div class="col-4 hideWeb grid_header"><?= __('property_title') ?></div>
                                <div class="col-md-3 col-8 notwrapped">
                                    
                                    <div>{{itm.property_title}}</div>
                                    <div>
                                        <i ng-if="itm.user_property.rec_state" class="fa fa-thumb-tack" title="<?= __('assign_status') ?>" ng-class="{greenText: itm.user_property.rec_state == '2', redText: itm.user_property.rec_state == '1'}"></i>
                                        <i ng-if="itm.param_isresale == 1" class="fa fa-retweet greenText" title="<?= __('param_isresale') ?>"></i>
                                        <i ng-if="itm.param_iscitizenship == 1" class="fa fa-address-card-o orangeText" title="<?= __('param_iscitizenship') ?>"></i>
                                        <i ng-if="itm.param_isresidence == 1" class="fa fa-globe greenText" title="<?= __('param_isresidence') ?>"></i>
                                        <i class="grayText" ng-if="itm.project"><?= __('project_title') ?>: {{ itm.project.project_title }}</i>
                                    </div>
                                    <div class="clearfix">
                                        <span class="badge badge-info"><?=__('param_rooms')?>: {{DtSetter('PROP_SPECS', itm.param_rooms)}}</span>
                                        <span class="badge badge-info"><?=__('floor')?>: {{DtSetter('PROP_SPECS', itm.param_floor)}}</span>
                                        <span class="badge badge-info"><?=__('param_floors')?>: {{DtSetter('PROP_SPECS', itm.param_floors)}}</span>
                                        <span class="badge badge-info"><?=__('param_netspace')?>: {{itm.param_netspace}} <?= __('m2') ?></span>
                                        <span class="badge badge-info"><?=__('param_grossspace')?>: {{itm.param_grossspace}} <?= __('m2') ?></span>
                                    </div>
                                    <div class="greenText"><?= __('addedby') ?>: {{itm.user.user_fullname}}</div>

                                </div>

                                <div class="col-4 hideWeb grid_header"><?= __('property_price') ?></div>
                                <div class="col-md-2 col-8 notwrapped">
                                    {{DtSetter('currencies_icons', itm.property_currency)}}{{ nFormat(itm.property_price, false, true)}}
                                    <i class="grayText">
                                        ({{DtSetter('currencies_icons', '<?= $currCurrency ?>')}}{{currencyConverter( DtSetter('currencies', itm.property_currency), '<?= $this->Do->get('currencies')[$currCurrency] ?>', itm.property_price )}})</i>
                                    <div ng-if="compareDate( itm.stat_expired )" class="update_div">
                                        <i class="fa fa-clock-o redText movScale"></i>
                                        <a href="javascript:void(0);"  
                                            ng-click=" 
                                                rec.ind = $index;
                                                rec.property = itm;
                                                openModal('#updateProperty_mdl');
                                                ">
                                            {{itm.stat_updated.split(' ')[0]}}
                                        </a>
                                    </div>
                                    <div ng-if="!compareDate( itm.stat_expired )">
                                        <i class="fa fa-clock-o greenText"> {{itm.stat_updated.split(' ')[0]}}</i>
                                    </div>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?= __('address') ?></div>
                                <div class="col-md-3 col-8 notwrapped">{{ itm.adrs_city }} - {{ itm.adrs_region }}<br />
                                    <b class="badge badge-success" ng-repeat="itm in itm.property_usp">
                                        <i>{{ DtSetter('USP', itm) }}</i>
                                    </b>
                                </div>

                                <div class="col-4 hideWeb grid_header"><?= __('rec_state') ?></div>
                                <div class="col-md-1 col-8" ng-bind-html="DtSetter('bool2', itm.rec_state)"></div>

                                <div class="col-4 hideWeb grid_header"><?= __('actions') ?></div>
                                <div class="col-md-2 col-8 action">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#viewProperty_mdl" class="inline-btn" ng-click="doGet('/admin/properties?id='+itm.id, 'rec', 'property'); curr_t = 'property';">
                                        <i class="fa fa-eye"></i> <?= __('view') ?>
                                    </a> &nbsp;
                                    <?php if (in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.portfolio', 'admin.supervisor'])) { ?>
                                        <!-- <a ng-hide="('<?= in_array($authUser['user_role'], ['admin.portfolio', 'user.portfolio']) ? 1 : 0 ?>' == '1' && '<?= $authUser['id'] ?>' != itm.user_id)" href="<?= $app_folder . '/' . $currlang ?>/admin/properties/wizard/{{itm.id}}" class="inline-btn">
                                            <i class="fa fa-pencil"></i> <?= __('edit') ?>
                                        </a> -->
                                        <a href ng-hide="('<?=$authUser['user_role']?>' == 'admin.portfolio' && '<?=$authUser['id']?>' != itm.user_id)"
                                            ng-click="
                                                doGet('/admin/properties?id='+itm.id, 'rec', 'property');
                                                openModal('#addEditProperty_mdl');
                                                initMapDelay('map_mdl', 'property', 'mapPlacesSearch_mdl');
                                                "  class="inline-btn">
                                            <i class="fa fa-pencil"></i> <?=__('edit')?>
                                        </a>
                                    <?php } ?>

                                    <?php if (in_array($authUser['user_role'], ['admin.content'])) { ?>
                                        <a href ng-click=" selected[itm.user_property.id] = true; multiHandle('/admin/properties/assign/publish')" ng-class="{disabled: itm.user_property.rec_state>1}" class="inline-btn">
                                            <i class="fa fa-pencil"></i> <?= __('mark_as_published') ?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <?php echo $this->element('paginator-ng') ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('Modals/search') ?>
<?php echo $this->element('Modals/updateProperty') ?>
<?php echo $this->element('Modals/viewProperty') ?>
<?php echo $this->element('Modals/addEditProperty')?>
<?php echo $this->element('Modals/map')?>
<?php echo $this->element('Modals/camera')?>
<?php echo $this->element('Modals/addEditSeller')?>
<?php echo $this->element('Modals/addEditDeveloper')?>
<?php echo $this->element('Modals/addEditProject')?>

