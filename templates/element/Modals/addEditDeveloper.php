<?php 
$ctrl = $this->request->getParam('controller');
?>
<div class="modal fade" id="addEditDeveloper_mdl" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
					<div ng-if="!rec.developer.id"><?=__('add_developer')?></div>
					<div ng-if="rec.developer.id"><?=__('edit_developer')?></div>
        </h4>
      </div>
      <div class="modal-body">

          <button type="button" id="developer_btn" class="hideIt" ng-click="
            doGet('/admin/developers/index?<?=$ctrl=='Developers' ? 'list' : 'selectList'?>=1&page='+paging.page, 'list', 'developers');
            rec.developer.id>0 ? '' : rec.developer = {};
            doClick('.close');
            "></button>
            
        <form class="row" id="developer_form" ng-submit="
            rec.developer.img = filesInfo.developer_photos;
            doSave(rec.developer, 'developer', 'developers', '#developer_btn', '#developer_preloader'); ">

          <div class="col-md-12 col-sm-12  form-group has-feedback">
            <label set-required><?= __('dev_name') ?></label>
            <div class="div">
              <?= $this->Form->control('dev_name', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.developer.dev_name',
                'placeholder' => __('dev_name'),
              ]) ?>
              <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          
          <div class="clearfix col-12 col-md-12"></div>

          <h5 class="mt-3 col-12 col-md-12"><?=__('contacts')?></h5>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label set-required><?= __('dev_configs.mobile') ?></label>
            <div class="div">
              <?= $this->Form->control('dev_configs.mobile', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'only-numbers' => '',
                'type' => 'text',
                'ng-model' => 'rec.developer.dev_configs.mobile',
                'placeholder' => __('dev_configs.mobile'),
              ]) ?>
              <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('dev_configs.email') ?></label>
            <div class="div">
              <?= $this->Form->control('dev_configs.email', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'email',
                'ng-model' => 'rec.developer.dev_configs.email',
                'placeholder' => __('dev_configs.email'),
              ]) ?>
              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('dev_configs.phone') ?></label>
            <div class="div">
              <?= $this->Form->control('dev_configs.phone', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'tel',
                'only-numbers' => '',
                'ng-model' => 'rec.developer.dev_configs.phone',
                'placeholder' => __('dev_configs.phone'),
              ]) ?>
              <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-12 col-sm-12  form-group has-feedback">
            <label><?= __('dev_configs.address') ?></label>
            <div class="div">
              <?= $this->Form->control('dev_configs.address', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'textarea',
                'ng-model' => 'rec.developer.dev_configs.address',
                'placeholder' => __('dev_configs.address'),
              ]) ?>
              <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="clearfix col-12 col-md-12"></div>

          <div class="col-md-12 col-sm-12  form-group has-feedback ">
            <button type="submit" id="developer_preloader" class="btn btn-info"><span></span> <i class="fa fa-save"></i> <?= __('save') ?></button>
          </div>

        </form>
        <div set-required="msg">ssss</div>
      </div>
    </div>
  </div>
</div>