<div class="modal fade" id="updateProperty_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <div><?= __('update_property') ?></div>
                </h4>
            </div>
            <div class="modal-body">

                <button type="button" id="property_btn_update" class="hideIt" ng-click="
                    lists.properties[ rec.ind ] = rec.property;
                    doSearch('dont_log');
                    doClick('.close');
                    "></button>

                <form class="row" id="property_form" ng-submit="
                    rec.property.stat_updated = '<?=date('Y-m-d H:i:s')?>';
                    doSave(rec.property, 'property', 'properties', '#property_btn_update', '#property_preloader'); ">

                    <div class="col-md-12 col-12 mb-3 prompet2">
                        <label><?= __('param_isresidence') ?></label>
                        <div class="div">
                            <label class="myradiobtn">
                                <input type="radio" ng-model="rec.property.param_isresidence" value="1" />
                                <span></span> <?= __('yes') ?>
                            </label>&nbsp;&nbsp;&nbsp;
                            <label class="myradiobtn">
                                <input type="radio" ng-model="rec.property.param_isresidence" value="0" />
                                <span></span> <?= __('no') ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-12 col-12 mb-3 prompet2">
                        <label>
                            <?= __('property_price') ?>
                        </label>
                        <div class="div mb-3">
                            <?= $this->Form->control('property_price', [
                                'class' => 'form-control has-feedback-left money',
                                'label' => false,
                                'type' => 'text',
                                'ng-model' => 'rec.property.property_price',
                                'mask-currency' => 'false',
                                'config' => "{group:'.',decimal:'.', decimalSize: 0,indentation:''}",
                            ]) ?>
                            <span class="fa fa-{{DtSetter('currencies', rec.property.property_currency ).toLowerCase()}} form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <button type="submit" class="btn btn-success"><?= __('update') ?></button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>