<?php
$param = empty( $this->request->getParam('pass')[0] ) ? false : $this->request->getParam('pass')[0];
?>

<div class="right_col" role="main" 
     ng-init="(param1 > 0) ? doGet('/admin/developers?id='+param1, 'rec', 'developer') : ''">

<button type="button" id="developer_btn" class="hideIt" ng-click="
    filesInfo.developer_photos=[];
    doGet('/admin/developers?id='+param1, 'rec', 'developer');
    "></button>
 
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?=__(($param ? 'edit' : 'add') . '_developer')?></h3>
            </div>
            <div class="title_right">
                
            </div>
        </div>

        <div class="clearfix"></div>

        <form class="row" ng-submit="
            rec.developer.img = filesInfo.developer_photos;
            doSave(rec.developer, 'developer', 'developers', (param1>0) ? '#developer_btn' : false); ">
            
            <!-- USER INFO SECTION -->
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-briefcase"></i> <?=__('developer_info')?></h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content" >

                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <label><?=__('developer_name')?></label>
                            <div class="div">
                                <?=$this->Form->control('developer_name', [
                                    'class'=>'form-control has-feedback-left',
                                    'label'=>false,
                                    'type'=>'text',
                                    'ng-model'=>'rec.developer.developer_name',
                                    'placeholder'=>__('developer_name'),
                                ])?>
                                <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12  form-group has-feedback">
                            <label><?=__('developer_desc')?></label>
                            <div class="div">
                                <?=$this->Form->control('developer_desc', [
                                    'class'=>'form-control has-feedback-left',
                                    'label'=>false,
                                    'type'=>'textarea',
                                    'ng-model'=>'rec.developer.developer_desc',
                                    'placeholder'=>__('developer_desc'),
                                ])?>
                                <span class="fa fa-paragraph form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        

                        <div class="clearfix"></div>

                        <div class="form-group ">
                            <div class="col-md-6 col-sm-6  form-group has-feedback ">
                                <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> <?=__('save')?></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
