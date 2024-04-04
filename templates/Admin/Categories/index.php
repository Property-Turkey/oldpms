<?php
$_pid = !isset($this->request->getParam('pass')[0]) ? 0 : $this->request->getParam('pass')[0];
// dd($_pid);
?>
<div id="indxPg" class="right_col" role="main" ng-init="
        doGet('/admin/categories/index/<?= $_pid ?>?list=1', 'list', 'categories');
    ">
    <div class="">
        <div class="page-title">
            <div class=" col-6 col-sm-6 col-md-6  side_div1">
                <h4 ng-repeat="itm in lists.categories track by $index" ng-if="$index === 0">
                    <b>{{itm.parent_category.category_name}}</b>
                </h4>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2" >
                <span class="icn"><button type="button" class="btn btn-info" 
                    ng-click="
                        newEntity('category');
                        openModal('#addEditCategory_mdl');
                        rec.category.parent_id = <?= $_pid ?>; 
                        rec.category.parent_name = itm.category_name; 
                    "data-toggle="modal">
                    <span class="fa fa-plus"></span> <?= __('add') ?>
                </button></span>
            </div>
        </div>

        <div class="clearfix"></div>

        
        <div class="row">
            <div class="col-12  ">
                <div class="x_panel">

                    <div id="main_preloader" class="preloader">
                        <div>
                            <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                        </div>
                        <div><?=__('please_wait')?></div>
                    </div>
                    
                    <div class="x_title">
                        
                        <h2><?=__('categories_list')?> <small><?=__('show')?> {{lists.categories.length}} {{paging.count}}</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li> -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu  <?= $currlang!='ar' ? 'dropdown-menu-right' : ''?>">
                                    <!-- <a href ng-click="multiHandle('/admin/categories/delete', )" class="dropdown-item">
                                        <i class="fa fa-trash"></i> <?=__('delete_selected')?>
                                    </a> -->

                                    <a href ng-click="multiHandle('/admin/categories/delete', selected, <?= $_pid ?>)" class="dropdown-item">
                                        <i class="fa fa-trash"></i> <?= __('delete_selected')?>
                                    </a>

                                    <a href ng-click="multiHandle('/admin/categories/enable/1')" class="dropdown-item">
                                        <i class="fa fa-check"></i> <?=__('enable_selected')?>
                                    </a>
                                    <a href ng-click="multiHandle('/admin/categories/enable/0')" class="dropdown-item">
                                        <i class="fa fa-times"></i> <?=__('disable_selected')?>
                                    </a>
                                </div>
                            </li>
                            <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> 
                            </li>-->
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        
                        <div class="grid ">

                        <div class="grid_header row">

                            <?php if(in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])){?>
                            <div class="col-sm-3 col column-title">
                                <?=$this->element('colActions', ['url'=>'projects/index/', 'col'=>'id'])?>
                                <label class="mycheckbox">
                                    <input type="checkbox" ng-click="chkAll('.chkb', !selectAll)" ng-model="selectAll">
                                    <span></span> 
                                    <?=__('id')?> 
                                </label> 
                            </div>
                            <?php }?>

                            <div class="col-sm-7 col column-title">
                                <?=$this->element('colActions', ['url'=>'projects/index/', 'col'=>'project_title', 'search'=>'project_title'])?> 
                                <?=__('category_name')?> </div>

                            
                          
                            <div class="col-sm-2 col column-title hideMob"><span
                                    class="nobr"><?=__('action')?></span>
                            </div>
                        </div>

                            <div class="grid_row row" ng-repeat="itm in lists.categories track by $index">

                          
                            <?php if(in_array($authUser['user_role'], ['admin.root', 'admin.admin', 'admin.supervisor'])){?>
                                    <div class="col-sm-3 hideMobSm grid_header">
                                        <label class="mycheckbox chkb">
                                            <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                            <span></span> {{ itm.id }}
                                        </label>
                                    </div>

                                    <div class="col-4 hideWeb grid_header">
                                        <?=__('id')?> 
                                        <label class="mycheckbox chkb">
                                            <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                            <span></span>
                                        </label>
                                    </div>
                                    
                                    <div class="col-md-1 col-8 hideWeb">{{ itm.id }}</div>
                                <?php }?>

                                <div class="col-4 hideWeb grid_header"><?=__('category_name')?></div>
                                <div class="col-md-7 col-8">

                                    <i class="fa {{itm.category_configs.icon||'fa-tag'}} m-1"></i>{{itm.category_name }}

                                </div>

                                <div class="col-4 hideWeb grid_header"><?=__('actions')?></div>
                                <div class="col-md-2 col-8 action">
                                    
                                    <!-- <a href="javascript:void(0);" 
                                        data-toggle="modal" data-target="#viewProject_mdl" class="inline-btn"
                                        ng-click="doGet('/admin/projects?id='+itm.id, 'rec', 'project'); curr_t = 'project';">
                                        <i class="fa fa-eye"></i> <?=__('view')?>
                                    </a> &nbsp;  -->

                                    <?php if( in_array( $authUser['user_role'], ['admin.root', 'admin.admin', 'admin.portfolio', 'admin.supervisor']) ){?>
                                        <a href ng-hide="('<?=$authUser['user_role']?>' == 'admin.portfolio' && '<?=$authUser['id']?>' != itm.user_id)"
                                            ng-click="
                                                rec.category = itm; 
                                                rec.category.id = itm.id; 
                                                doGet('/admin/categories?id=' + itm.id, 'rec', 'category');
                                                openModal('#addEditCategory_mdl');
                                                "  class="inline-btn">
                                            <i class="fa fa-pencil"></i> <?=__('edit')?>
                                        </a>
                                    <?php }?>

                                    
                                </div>
                               
                            </div>

                        </div>

                        <?php echo $this->element('paginator-ng')?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $this->element('Modals/addEditCategory')?>