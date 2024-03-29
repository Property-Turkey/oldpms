<div class="modal fade" id="addEditOffice_mdl" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
					<div ng-if="!rec.office.id"><?=__('add_office')?></div>
					<div ng-if="rec.office.id"><?=__('edit_office')?></div>
        </h4>
      </div>
      <div class="modal-body">

        <button type="button" id="office_btn" class="hideIt" ng-click="
          doGet('/admin/offices/index?list=1&page='+paging.page, 'list', 'offices');
          rec.office.id>0 ? '' : rec.office = {};
          doClick('.close');
          "></button>
          
        <form class="row" id="office_form" ng-submit="
            rec.office.img = filesInfo.office_photos;
            doSave(rec.office, 'office', 'offices', '#office_btn', '#office_preloader'); ">

          <div class="col-md-6 col-sm-6  form-group has-feedback">
            <label><?= __('office_name') ?></label>
            <div class="div">
              <?= $this->Form->control('office_name', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.office.office_name',
                'placeholder' => __('office_name'),
              ]) ?>
              <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>

          <div class="col-md-12 col-sm-12  form-group has-feedback">
            <label><?= __('office_desc') ?></label>
            <div class="div">
              <?= $this->Form->control('office_desc', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'textarea',
                'ng-model' => 'rec.office.office_desc',
                'placeholder' => __('office_desc'),
              ]) ?>
              <span class="fa fa-paragraph form-control-feedback left" aria-hidden="true"></span>
            </div>
          </div>


          <div class="clearfix"></div>

          <div class="col-md-12 col-sm-12  form-group has-feedback ">
            <button type="submit" id="office_preloader" class="btn btn-info"><span></span> <i class="fa fa-save"></i> <?= __('save') ?></button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>