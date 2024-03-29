<?php 
    $cats = [5=>"project_types", 6=>"property_types", 1=>"project_features", 2=>"property_features", 3=>"property_specs", 4=>"project_specs"];
    $parent_id = $this->request->getParam('pass')[0];
    $from = $this->request->getQuery('from');
    $to = $this->request->getQuery('to');
    $k = $this->request->getQuery('k');
    $col = $this->request->getQuery('col');
    $method = $this->request->getQuery('method');
?>
<div class="right_col" role="main" ng-init="
        doGet('/admin/categories/index/<?=$parent_id?>?page='+paging.page, 'list', 'categories');
    ">
    <div class="">
        <div class="page-title">
            <div class=" col-6 col-sm-6 col-md-6  side_div1">
                <h3><?=__($cats[ $parent_id ].'_list')?></h3>
            </div>
            <div class=" col-6 col-sm-6 col-md-6 side_div2" >
                <span class="icn"><button type="button" class="btn btn-info" data-toggle="modal" id="addEdit_mdl_btn" data-target="#addEdit_mdl">
                    <span class="fa fa-plus"></span> <?=__('add_'.$cats[ $parent_id ])?>
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
                                    <a href ng-click="multiHandle('/admin/categories/delete')" class="dropdown-item">
                                        <i class="fa fa-trash"></i> <?=__('delete_selected')?>
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
                        
                        <div class="table-responsive">
                            <table class="table jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th>
                                            <label class="mycheckbox">
                                                <input type="checkbox" ng-click="chkAll('.chkb', !selectAll)" ng-model="selectAll">
                                                <span></span>
                                            </label>
                                        </th>
                                        <th class="column-title">
                                            <?=$this->element('colActions', ['url'=>'categories/index/'.$parent_id, 'col'=>'id'])?>
                                            <?=__('id')?> </th>
                                        <th class="column-title">
                                            <?=$this->element('colActions', ['url'=>'categories/index/'.$parent_id, 'col'=>'category_name', 'search'=>'category_name'])?> 
                                            <?=__('category_name')?> </th>
                                        <th class="column-title"> <?=__('children')?> </th>
                                        <th class="column-title no-link last"><span
                                                class="nobr"><?=__('action')?></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php // Parents?>
                                    <tr ng-repeat-start="itm in lists.categories">
                                        <td class="">
                                            <label class="mycheckbox chkb">
                                                <input type="checkbox" ng-model="selected[itm.id]" ng-value="{{itm.id}}">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td class=" ">{{itm.id}}</td>
                                        <td class=" ">{{ itm.category_name }} </td>
                                        <td class=" ">
                                            <a href ng-click="isOpen[itm.id] = !isOpen[itm.id]">
                                            <i ng-if="itm.child_categories.length>0" class="fa fa-caret-down"></i> {{itm.child_categories.length}}
                                            </a>
                                        </td>
                                        <td class=" last">
                                            <a href="{{app_folder}}/admin/categories/view/{{itm.id}}"><i class="fa fa-eye"></i> <?=__('view')?></a> &nbsp;

                                            <a href ng-click="rec.category = itm;"  
                                                data-toggle="modal" id="addEdit_mdl_btn" data-target="#addEdit_mdl">
                                                <i class="fa fa-pencil"></i> <?=__('edit')?>
                                            </a> &nbsp;
                                            <?php if(in_array( $parent_id, ['1', '2', '3', '4']) ){?>
                                            <a href ng-click=" rec.parent = itm; "  
                                                data-toggle="modal" id="addEdit_mdl_btn" data-target="#addEdit_mdl">
                                                <i class="fa fa-plus"></i> <?=__('add_child')?>
                                            </a>
                                            <?php }?>
                                        </td>
                                    </tr>

                                    <?php // Children?>
                                    <tr ng-repeat="child in itm.child_categories" ng-class="{hideIt: !isOpen[itm.id]}" style="background: #eee;">
                                        
                                        <td class="" >
                                            <label class="mycheckbox chkb">
                                                <i class="fa fa-level-up fa-rotate-90"></i> &nbsp; <input type="checkbox" ng-model="selected[child.id]" ng-value="{{child.id}}">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td class=" ">{{child.id}}</td>
                                        <td class=" ">{{ child.category_name }} </td>
                                        <td class=" "> </td>
                                        <td class=" last">
                                            <a href="{{app_folder}}/admin/categories/view/{{child.id}}"><i class="fa fa-eye"></i> <?=__('view')?></a> &nbsp;
                                            <a href ng-click=" rec.category = child; rec.parent = {id: itm.id, category_name: itm.category_name}"  
                                                data-toggle="modal" id="addEdit_mdl_btn" data-target="#addEdit_mdl">
                                                <i class="fa fa-pencil"></i> <?=__('edit')?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr ng-repeat-end></tr>


                                </tbody>
                            </table>
                            <?php echo $this->element('paginator-ng')?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo $this->element('Modals/addEditCategory')?>