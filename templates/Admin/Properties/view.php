<?php
$fields = ['id', 'property_title', 'property_photos', 'language_id', 'project_id', 'category_id', 'features_ids', 'property_desc', 'property_price', 'property_oldprice', 'property_currency', 'property_loc', 'property_ref', 'adrs_country', 'adrs_city', 'adrs_region', 'adrs_district', 'adrs_street', 'adrs_block', 'adrs_no', 'param_netspace', 'param_grossspace', 'param_rooms', 'param_bedrooms', 'param_buildage', 'param_floors', 'param_floor', 'param_heat', 'param_bathrooms', 'param_balconies', 'param_isfurnitured', 'param_usestatus', 'param_monthlytax', 'param_payment', 'param_ownership', 'param_ownertype', 'param_deposit', 'seo_title', 'seo_keywords', 'seo_desc', 'stat_created', 'stat_updated', 'stat_views', 'stat_shares', 'rec_state'];
$ctrl = $this->request->getParam('controller');
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?=__('view_'.$ctrl.'_rec')?></h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    
                    <div class="view_page">
                        <table class="table table-striped table-hover">
                        <?php 
                            foreach($fields as $field){
                                $prefix=''; $suffix='';
                                if(in_array($field, ['property_price', 'property_oldprice']) && !empty($rec->$field)){
                                    $prefix = $this->Do->get('currencies_icons')[$rec->property_currency];
                                    $convertedCurrency = $this->Do->get('currencies_icons')[$currCurrency];
                                    $from = $this->Do->get('currencies')[$rec->property_currency];
                                    $to = $this->Do->get('currencies')[$currCurrency];
                                    $suffix = '<i class="grayText">( '.$convertedCurrency.'{{ currencyConverter( "'.$from.'", "'.$to.'", '.$rec->$field.' ) }} )</i>';
                                }?>
                            <tr>
                                <th><?= __($field) ?></th>
                                <td><?= $prefix.''.$this->Do->DtSetter($rec->$field, $field).''.$suffix ?></td>
                            </tr>
                        <?php }?>
                        </table>
                    </div>

                </div>
            </div>
                    
        </div>
    </div>
</div>


