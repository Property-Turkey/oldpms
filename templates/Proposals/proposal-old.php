<?php
    $tbl = $this->request->getParam('pass')[1];
    // dd($rec);
?>

<?php if($tbl == 1){ // Property Offer ?>

    <div class="right_col" role="main">
    <div class="container">
        <div class="page-title">
            <div class="title_left">
                <h3 class="mb-5 mt-5 text-center"><?= str_replace(', ,', '', str_replace( '[auto]', '', $rec['property']['property_title'] ))?></h3>
                <p><?= $rec['proposal_desc'] ?></p>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    
                    <div class="view_page">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th><?= __('property_photos') ?></th>
                                <td>
                                    <div class="nowrap">
                                    <?php 
                                        foreach($rec['property']['property_photos'] as $img){
                                            echo '<span class="thumb-img">'.$this->Html->image('/img/properties_photos/thumb/'.$img['name'], 
                                                [   
                                                    'style'=>'height: 70px', 'show-img'=>implode(',',$rec['property']['property_photos_names']), 'curr'=>$img['name'], 
                                                    'ctrl'=>$tbl == 1 ? 'properties' : 'projects' 
                                                ]).'</span>';
                                        }
                                    ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('property_space') ?></th>
                                <td><?= $rec['property']['param_netspace'].' '.__('m2').'/'.$rec['property']['param_grossspace'].' '.__('m2')?></td>
                            </tr>
                            <tr>
                                <th><?= __('param_floor') ?></th>
                                <td>
                                    <?= $this->Do->DtSetter($rec['property']['param_floor']  , 'param_floor', 'PROP')?> /
                                    <?= $this->Do->DtSetter($rec['property']['param_floors']  , 'param_floors', 'PROP')?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('param_buildage') ?></th>
                                <td>
                                    <?= $this->Do->DtSetter($rec['property']['param_buildage']  , 'param_buildage', 'PROP')?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('param_bathrooms') ?></th>
                                <td>
                                    <?= $this->Do->DtSetter($rec['property']['param_bathrooms']  , 'param_bathrooms', 'PROP')?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('address') ?></th>
                                <td><?= $rec['property']['adrs_city'].' / '. $rec['property']['adrs_region']?></td>
                            </tr>
                            <tr>
                                <th><?= __('param_ownership') ?></th>
                                <td><?= $this->Do->DtSetter($rec['property']['param_ownership']  , 'param_ownership', 'PROP')?></td>
                            </tr>

                            <?php if($rec['property']['param_iscitizenship'] > 0){?>
                            <tr>
                                <th><?= __('param_iscitizenship') ?></th>
                                <td><i class="fa fa-check-circle <?=$rec['property']['param_iscitizenship'] == '0' ? 'grayText' : 'greenText'?>"></i></td>
                            </tr>
                            <?php }?>

                            <?php if($rec['property']['param_isresidence'] > 0){?>
                            <tr>
                                <th><?= __('param_isresidence') ?></th>
                                <td><i class="fa fa-check-circle <?=$rec['property']['param_isresidence'] == '0' ? 'grayText' : 'greenText'?>"></i></td>
                            </tr>
                            <?php }?>
                            
                            <tr>
                                <th><?= __('property_price') ?></th>
                                <td><?= $this->Do->get('currencies_icons')[$rec['property']['property_currency']]?><?= $this->Do->num( $rec['property']['property_price'] )?></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
                    
        </div>
    </div>
</div>
<?php }?>




<?php if($tbl == 2){ // Floorplan Offer
        $fp = $rec['project']['floorplans'][0];
        // dd($rec['project']['floorplans'][0]['floorplan_photo']);
        ?>

<div class="right_col" role="main">
    <div class="container">
        <div class="page-title">
            <div class="title_left">
                <h3 class="mb-5 mt-5 text-center"><?= str_replace(', ,', '', str_replace( '[auto]', '', $rec['project']['project_title'] ))?></h3>
                <p><?= $rec['proposal_desc'] ?></p>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    
                    <div class="view_page">
                        <table class="table table-striped table-hover">

                        <?php if( $rec['project']['project_photos'] ){?>
                            <tr>
                                <th><?= __('project_photos') ?></th>
                                <td>
                                    <div class="nowrap">
                                    <?php 
                                        foreach($rec['project']['project_photos'] as $img){
                                            echo '<span class="thumb-img">'.$this->Html->image('/img/projects_photos/thumb/'.$img, 
                                                ['style'=>'height: 70px', 'show-img'=>implode(',',$rec['project']['project_photos']), 'curr'=>$img, 'ctrl'=>'projects' ]).'</span>';
                                        }
                                    ?>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>

                            <?php if( !empty( $rec['project']['floorplans'][0]['floorplan_photo'] ) ){?>
                            <tr>
                                <th><?= __('floorplan') ?></th>
                                <td>
                                    <div class="nowrap">
                                    <?php 
                                        // foreach($rec['project']['floorplan'] as $img){
                                            echo '<div>'.$this->Html->image('/img/floorplans_photos/'.$rec['project']['floorplans'][0]['floorplan_photo'] , 
                                                ['style'=>'width: 100%', 'show-img'=>''] ).'</div>';
                                        // }
                                    ?>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>

                            <tr>
                                <th><?= __('address') ?></th>
                                <td><?= $rec['project']['adrs_country'].' / '.$rec['project']['adrs_city'].' / '.$rec['project']['adrs_region']?></td>
                            </tr>

                            <tr>
                                <th><?= __('features_ids') ?></th>
                                <td>
                                    <?php foreach($rec['project']['features_ids'] as $feature){?> 
                                        <?= $this->Do->DtSetter($feature  , 'features_ids', 'PROJ' )?>
                                    <?php }?>
                                </td>
                            </tr>
<!-- 
    param_delivertype / param_deliverdate
    param_downpayment / param_installment / param_installment_months / project_currency
    floorplan_minprice
 -->
                            <tr>
                                <th><?= __('param_delivertype') ?></th>
                                <td>
                                    <b><?= $this->Do->DtSetter($rec['project']['param_delivertype']  , 'param_delivertype', 'PROJ' )?></b> <br/>
                                    <?= __('param_deliverdate').' '.$this->Do->DtSetter($rec['project']['param_deliverdate']  , 'param_deliverdate', 'PROJ' )?>
                                </td>
                            </tr>

                            <?php if(!empty( $fp['floorplan_minprice'] )){?>
                            <tr>
                                <th><?= __('price') ?></th>
                                <td>
                                    <?=__('price_start_from')?>: 
                                    <i><?=$this->Do->get('currencies_icons')[$rec['project']['project_currency']]?> {{nFormat( '<?= $fp['floorplan_minprice']?>' )}}</i>
                                    
                                </td>
                            </tr>
                            <?php }?>

                            <tr>
                                <th><?= __('payment_plan') ?></th>
                                <td>
                                    <b><?= __('param_downpayment')?>:</b> <?=$rec['project']['param_downpayment']?>% <br/>
                                    <b><?= __('param_installment')?>:</b> <?=$rec['project']['param_installment']?>% / <?=$rec['project']['param_installment_months'].' '.__('month')?>
                                </td>
                            </tr>

                        </table>
                    </div>

                </div>
            </div>
                    
        </div>
    </div>
</div>
<?php }?>

