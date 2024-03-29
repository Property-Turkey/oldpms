<?php 
$ctrl = $this->request->getParam('controller');
?>
<div class="modal fade" id="addEditSeller_mdl" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
					<div ng-if="!rec.seller.id"><?=__('add_seller')?></div>
					<div ng-if="rec.seller.id"><?=__('edit_seller')?></div>
        </h4>
      </div>
      <div class="modal-body">

          <button type="button" id="seller_btn" class="hideIt" ng-click="
            doGet('/admin/sellers/index?<?=$ctrl=='Sellers' ? 'list' : 'selectList'?>=1', 'list', 'sellers');
            rec.seller.id>0 ? '' : rec.seller = {};
            doClick('.close');
            "></button>
          
        <form class="row" id="seller_form" ng-submit="
            rec.seller.img = filesInfo.seller_photos;
            rec.property.param_ownertype ? rec.seller.seller_type  = rec.property.param_ownertype : '';
            doSave(rec.seller, 'seller', 'sellers', '#seller_btn', '#seller_preloader'); ">

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label set-required><?= __('seller_name') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_name', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.seller.seller_name',
                'placeholder' => __('seller_name'),
              ]) ?>
              <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback" ng-if="!rec.property.param_ownertype">
            <label set-required><?= __('seller_type') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_type', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'select',
                'options' => $this->Do->lcl( $this->Do->get('PROP_SPECS.163') ),
                'ng-model' => 'rec.seller.seller_type',
                'placeholder' => __('seller_type'),
              ]) ?>
              <span class="fa fa-bars form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-12 col-sm-12  form-group has-feedback">
            <label set-required><?= __('seller_nationality') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_nationality', [
                'class' => 'form-control selectpicker',
                'data-live-search'=>'true',
                'label' => false,
                'type' => 'select',
                'ng-model' => 'rec.seller.seller_nationality',
                'placeholder' => __('seller_nationality'),
                'options' => $this->Do->get('COUNTRIES_CATEGORIES')
              ]) ?>
              <!-- <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span> -->
            </div>
          </div>

          <div class="clearfix col-12 col-md-12"></div>

          <h5 class="mt-3 col-12 col-md-12"><?=__('mngr_contacts')?></h5>

          <div class="clearfix col-12 col-md-12"></div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label set-required><?= __('seller_configs.mngr.fullname') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_configs.mngr.fullname', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.seller.seller_configs.mngr.fullname',
                'placeholder' => __('seller_configs.mngr.fullname'),
              ]) ?>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label set-required><?= __('seller_configs.mngr.mobile') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_configs.mngr.mobile', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.seller.seller_configs.mngr.mobile',
                'placeholder' => __('seller_configs.mngr.mobile'),
              ]) ?>
              <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('seller_configs.mngr.email') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_configs.mngr.email', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'email',
                'ng-model' => 'rec.seller.seller_configs.mngr.email',
                'placeholder' => __('seller_configs.mngr.email'),
              ]) ?>
              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('seller_configs.mngr.phone') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_configs.mngr.phone', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'tel',
                'ng-model' => 'rec.seller.seller_configs.mngr.phone',
                'placeholder' => __('seller_configs.mngr.phone'),
              ]) ?>
              <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="clearfix col-12 col-md-12"></div>

          <h5 class="mt-3 col-12 col-md-12"><?=__('slr_contacts')?></h5>

          <div class="clearfix col-12 col-md-12"></div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('seller_configs.slr.fullname') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_configs.slr.fullname', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.seller.seller_configs.slr.fullname',
                'placeholder' => __('seller_configs.slr.fullname'),
              ]) ?>
              <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('seller_configs.slr.mobile') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_configs.slr.mobile', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'tel',
                'ng-model' => 'rec.seller.seller_configs.slr.mobile',
                'placeholder' => __('seller_configs.slr.mobile'),
              ]) ?>
              <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('seller_configs.slr.email') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_configs.slr.email', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'email',
                'ng-model' => 'rec.seller.seller_configs.slr.email',
                'placeholder' => __('seller_configs.slr.email'),
              ]) ?>
              <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('seller_configs.slr.phone') ?></label>
            <div class="div">
              <?= $this->Form->control('seller_configs.slr.phone', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'tel',
                'ng-model' => 'rec.seller.seller_configs.slr.phone',
                'placeholder' => __('seller_configs.slr.phone'),
              ]) ?>
              <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>
          
          <div class="clearfix"></div>

          <div class="col-md-12 col-sm-12  form-group has-feedback ">
            <button type="submit" id="seller_preloader" class="btn btn-info"><span></span> <i class="fa fa-save"></i> <?= __('save') ?></button>
          </div>

        </form>
        <div set-required="msg">ssss</div>

      </div>
    </div>
  </div>
</div>