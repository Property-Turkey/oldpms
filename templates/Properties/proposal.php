<?php
$fields = ['id', 'property_title', 'property_photos', 'language_id', 'project_id', 'category_id', 'features_ids', 'property_desc', 'property_price', 'property_oldprice', 'property_currency', 'property_loc', 'property_ref', 'adrs_country', 'adrs_city', 'adrs_region', 'adrs_district', 'adrs_street', 'adrs_block', 'adrs_no', 'param_netspace', 'param_grossspace', 'param_rooms', 'param_bedrooms', 'param_buildage', 'param_floors', 'param_floor', 'param_heat', 'param_bathrooms', 'param_balconies', 'param_isfurnitured', 'param_usestatus', 'param_monthlytax', 'param_payment', 'param_ownership', 'param_ownertype', 'param_deposit', 'seo_title', 'seo_keywords', 'seo_desc', 'stat_created', 'stat_updated', 'stat_views', 'stat_shares', 'rec_state'];
$ctrl = $this->request->getParam('controller');
?>

<div class="right_col" role="main">
    <div class="container">
        <div class="page-title">
            <div class="title_left">
                <h3 class="mb-5 mt-5 text-center"><?= str_replace(', ,', '', str_replace( '[auto]', '', $rec['property_title'] ))?></h3>
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
                                    <?php 
                                        foreach($rec['property_photos'] as $img){
                                            echo '<span class="thumb-img">'.$this->Html->image('/img/properties_photos/thumb/'.$img, 
                                                ['style'=>'height: 70px', 'show-img'=>implode(',',$rec['property_photos']), 'curr'=>$img ]).'</span>';
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('property_space') ?></th>
                                <td><?= $rec['param_netspace'].' '.__('m2').'/'.$rec['param_grossspace'].' '.__('m2')?></td>
                            </tr>
                            <tr>
                                <th><?= __('param_floor') ?></th>
                                <td>
                                    <?= $this->Do->DtSetter($rec['param_floor']  , 'param_floor')?> /
                                    <?= $this->Do->DtSetter($rec['param_floors']  , 'param_floors')?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('param_buildage') ?></th>
                                <td>
                                    <?= $this->Do->DtSetter($rec['param_buildage']  , 'param_buildage')?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('param_bathrooms') ?></th>
                                <td>
                                    <?= $this->Do->DtSetter($rec['param_bathrooms']  , 'param_bathrooms')?>
                                </td>
                            </tr>
                            <tr>
                                <th><?= __('address') ?></th>
                                <td><?= $rec['adrs_city'].' / '. $rec['adrs_region']?></td>
                            </tr>
                            <tr>
                                <th><?= __('param_ownership') ?></th>
                                <td><?= $this->Do->DtSetter($rec['param_ownership']  , 'param_ownership')?></td>
                            </tr>

                            <?php if($rec['param_iscitizenship'] > 0){?>
                            <tr>
                                <th><?= __('param_iscitizenship') ?></th>
                                <td><i class="fa fa-check-circle <?=$rec['param_iscitizenship'] == '0' ? 'grayText' : 'greenText'?>"></i></td>
                            </tr>
                            <?php }?>

                            <?php if($rec['param_isresidence'] > 0){?>
                            <tr>
                                <th><?= __('param_isresidence') ?></th>
                                <td><i class="fa fa-check-circle <?=$rec['param_isresidence'] == '0' ? 'grayText' : 'greenText'?>"></i></td>
                            </tr>
                            <?php }?>
                            
                            <tr>
                                <th><?= __('property_price') ?></th>
                                <td><?= $this->Do->get('currencies_icons')[$rec['property_currency']]?><?= $this->Do->num( $rec['property_price'] )?></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
                    
        </div>
    </div>
</div>


