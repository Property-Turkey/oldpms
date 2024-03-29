<?php
  $ctrl = $this->request->getParam('controller') == 'Properties' ? 'property' : 'project';
?>
<div class="modal fade" id="map_mdl" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="listing-modal-1 modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
          <h4><?= __('select_address') ?></h4>
        </h4>
      </div>
      <div class="modal-body" style="padding: 0 ;">

        <form class="x_content" ng-submit="chkAdrs(rec.property, '<?=$ctrl?>')" id="address_form">

                                
          <div class="col-md-12 has-feedback">
              <label><?=__('search_in_map')?></label>
              <div class="div">
                  <input type="text" placeholder="<?=__('find_address')?>" class="form-control has-feedback-left" id="mapPlacesSearch"/>
                  <span class="fa fa-search form-control-feedback left" aria-hidden="true"></span>
              </div>
          </div>
                                
          <div class="col-md-8 col-8 has-feedback">
              <label><?=__('search_by_coords')?></label>
              <div class="div">
                  <input type="text" placeholder="Ex: 41.056881,28.990970, or Google map link" class="form-control has-feedback-left" ng-model="mapCoords"/>
                  <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
              </div>
          </div>
          <div class="col-md-4 col-4">
              <label>&nbsp;</label>
              <div class="div">
              <button class="btn btn-primary w100" type="button" ng-click="getLatLng(mapCoords)"><?=__('find')?></button>
              </div>
          </div>

          <div class="col-md-12">
            <div id="map-canvas" set-map loc="rec.property.property_loc" class="map_div"></div>
          </div>
          
          <div class="col-md-12 mt-1">
            <button class="btn btn-primary w100" type="button" ng-click="getLoc()" id="getLoc_loader"><span></span> <i class="fa fa-thumb-tack"></i> <?=__('get_your_current_location')?></button>
          </div>

          <div class="clearfix"></div>

          <div class="col-md-12 mb-5 mt-5">
            <div class="row dashed-btn-line">
              <div class="col-5 col-sm-3"><b set-required><?= __('adrs_country') ?></b></div>
              <div class="col-7 col-sm-9"> {{rec.property.adrs_country}}</div>
              <div class="col-5 col-sm-3"><b set-required><?= __('adrs_city') ?></b></div>
              <div class="col-7 col-sm-9"> {{rec.property.adrs_city}}</div>
              <div class="col-5 col-sm-3"><b set-required><?= __('adrs_region') ?></b></div>
              <div class="col-7 col-sm-9"> {{rec.property.adrs_region}}</div>
              <div class="col-5 col-sm-3"><b><?= __('adrs_district') ?></b></div>
              <div class="col-7 col-sm-9"> {{rec.property.adrs_district}}</div>
              <div class="col-5 col-sm-3"><b><?= __('adrs_street') ?></b></div>
              <div class="col-7 col-sm-9"> {{rec.property.adrs_street}}</div>

              <?php if ($ctrl == 'property') { ?>
                <div class="col-5 col-sm-3"><b set-required><?= __('adrs_block') ?></b></div>
                <div class="col-7 col-sm-9">
                  <input type="text" placeholder="<?=__('adrs_block')?>" class="btm-line-input" ng-model="rec.property.adrs_block" name="adrs_block">
                </div>
                <div class="col-5 col-sm-3"><b set-required><?= __('adrs_no') ?></b></div>
                <div class="col-7 col-sm-9">
                  <input type="text" placeholder="<?=__('adrs_no')?>" class="btm-line-input" ng-model="rec.property.adrs_no" name="adrs_no">
                </div>
              <?php } ?>

            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-info"><span><i class="fa fa-save"></i></span> <?= __('save') ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>