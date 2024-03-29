<div class="row">
    <div class="col-6 col-lg-6">
        <h4><?= __('floorplans') ?></h4>
    </div>
    <div class="col-6 col-lg-6 text-right">
        <button class="btn btn-primary" type="button" ng-click="addFloorplan = addFloorplan == 1 ? 0 : 1">
            <i class="fa fa-plus"></i> <span class="hideMob"><?=__('add_floorplan')?></span>
        </button>
    </div>
</div>

<div class="row ngif" ng-if="addFloorplan == 1">
    <?php // show image and 
    ?>
    <div class="col-md-12 col-sm-12  form-group has-feedback">
        <div class="img_thumb">
            <label class="">
                <span class="img2">
                    <a href class="overly_btn" ng-click="
                                !rec.floorplan.floorplan_photo.length<1 ? 
                                    delImage('/admin/floorplans/delimage/'+rec.floorplan.id, {image: rec.floorplan.floorplan_photo, id: rec.floorplan.id}, '#project_btn') : 
                                    filesInfo.floorplan_photo=[]
                                ">
                        <i class="fa fa-times"></i>
                    </a>
                    <img ng-src="{{getPhoto( filesInfo.floorplan_photo[0].tmp_name, rec.floorplan.floorplan_photo, 'floorplans')}}" alt="">
                </span>
                <?= $this->Form->control('floorplan_photo', [
                    'class' => 'form-control hideIt', 'type' => 'file',
                    'file-model' => 'files.floorplan_photo', 'multiple' => false,
                    'ng-model' => 'rec.floorplan.floorplan_photo',
                    'id' => 'floorplan', 'label' => false
                ]) ?>
            </label>
        </div>
    </div>

    <div class="col-md-12 col-sm-12  form-group has-feedback">
        <label><?= __('floorplan_name') ?></label>
        <div class="div">
            <?= $this->Form->control('floorplan_name', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.floorplan.floorplan_name',
            ]) ?>
            <span class="fa fa-info-circle form-control-feedback left" aria-hidden="true"></span>
        </div>
    </div>


    <div class="col-md-6 col-sm-6 col-6  form-group has-feedback">
        <label><?= __('floorplan_minsize') ?></label>
        <div class="div">
            <?= $this->Form->control('floorplan_minsize', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',

                'mask-currency' => 'false',
                'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
                'ng-model' => 'rec.floorplan.floorplan_minsize',
            ]) ?>
            <span class="fa fa-arrows-h form-control-feedback left" aria-hidden="true"></span>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-6  form-group has-feedback">
        <label><?= __('floorplan_maxsize') ?></label>
        <div class="div">
            <?= $this->Form->control('floorplan_maxsize', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',

                'mask-currency' => 'false',
                'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
                'ng-model' => 'rec.floorplan.floorplan_maxsize',
            ]) ?>
            <span class="fa fa-arrows-h form-control-feedback left" aria-hidden="true"></span>
        </div>
    </div>


    <div class="col-md-6 col-sm-6 col-6  form-group has-feedback">
        <label><?= __('floorplan_minprice') ?></label>
        <div class="div">
            <?= $this->Form->control('floorplan_minprice', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',

                'mask-currency' => 'false',
                'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
                'ng-model' => 'rec.floorplan.floorplan_minprice',
            ]) ?>
            <span class="fa fa-{{DtSetter('currencies', rec.project.project_currency ).toLowerCase()}} form-control-feedback left" aria-hidden="true"></span>
        </div>
    </div>


    <div class="col-md-6 col-sm-6 col-6  form-group has-feedback">
        <label><?= __('floorplan_maxprice') ?></label>
        <div class="div">
            <?= $this->Form->control('floorplan_maxprice', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',

                'mask-currency' => 'false',
                'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
                'ng-model' => 'rec.floorplan.floorplan_maxprice',
            ]) ?>
            <span class="fa fa-{{DtSetter('currencies', rec.project.project_currency ).toLowerCase()}} form-control-feedback left" aria-hidden="true"></span>
        </div>
    </div>

    <div class="clearfix col-md-12 col-12"></div>

    <div class="col-md-6 col-sm-6 col-6  form-group has-feedback ">
        <button type="button" ng-click="
                rec.floorplan.img = filesInfo.floorplan_photo;
                rec.floorplan.project_id = rec.project.id;
                doSave(rec.floorplan, 'floorplan', 'floorplans', '#project_btn_add_edit', '#project_preloader');
                " class="btn btn-info" id="project_preloader"><span></span> <i class="fa fa-save"></i> <?= __('save') ?></button>
        <button type="button" ng-if="rec.floorplan.id" ng-click="newEntity('floorplan')" class="btn btn-primary"><i class="fa fa-times"></i></button>
    </div>
</div>

<div class="row">
    
    <div class="clearfix col-md-12 col-12"></div>

    <div class="form-group col-md-12 col-12">
        <div class="col-lg-3 col-md-4 col-6 img_thumb text-center" ng-repeat="itm in rec.project.floorplans">
            <div class="img">
                <img show-img="" ng-src="{{getPhoto(false, itm.floorplan_photo, 'floorplans')}}" />
            </div>

            <div class="flex_center">
                <div><b>{{itm.floorplan_name}}</b></div>
                <div class="grayText">
                    <i>{{itm.floorplan_minsize}}<?= __('m2') ?> / {{itm.floorplan_maxsize}}<?= __('m2') ?></i><br />
                    <i>{{DtSetter('currencies_icons', rec.project.project_currency)+nFormat( itm.floorplan_minprice )}} / {{DtSetter('currencies_icons', rec.project.project_currency)+nFormat( itm.floorplan_maxprice )}}</i>
                </div>
                <hr>
                <div>
                    <a href class="small-btn" ng-click="doDelete('/admin/floorplans/delete/'+itm.id, '#project_btn_add_edit')">
                        <i class="fa fa-times"></i> <?= __('delete') ?>
                    </a>
                    <a href class="small-btn" ng-click="rec.floorplan = itm; $parent.addFloorplan = 1">
                        <i class="fa fa-edit"></i> <?= __('edit') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>