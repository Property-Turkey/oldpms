<div class="modal fade" id="addEditFloorplan_mdl" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
          <?= __('add_floorplan') ?>
        </h4>
      </div>
      <div class="modal-body">

        <form class="x_content" ng-submit="
          rec.floorplan.img = filesInfo.floorplan_photo ? [filesInfo.floorplan_photo] : false;
          rec.floorplan.project_id = param1;
          doSave(rec.floorplan, 'floorplan', 'floorplans', '#project_btn', '#floorplan_preloader');
          ">

          <div class="col-md-12 col-sm-12  form-group has-feedback">
            <div class="img_thumb">
                <label class="">
              <span class="img2">
                <a href class="overly_btn" ng-click="
                      !rec.floorplan.floorplan_photo.length<1 ? 
                          delImage('/admin/floorplans/delimage'+param1, {image: rec.floorplan.floorplan_photo, id: param1}, '#floorplan_btn') : 
                          filesInfo.floorplan_photo=null
                      ">
                  <i class="fa fa-times"></i>
                </a>
                <img ng-src="{{getPhoto( filesInfo.floorplan_photo.tmp_name, rec.floorplan.floorplan_photo, 'floorplans')}}" alt="">
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

          <div class="clearfix"></div>

          <div class="form-group ">
            <div class="col-md-6 col-sm-6  form-group has-feedback ">
              <button type="submit" class="btn btn-info" id="floorplan_preloader"><span></span> <i class="fa fa-save"></i> <?= __('save') ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>