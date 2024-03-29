<?php
$fields = ['id', 'project_title', 'project_photos', 'category_id', 'features_ids', 'project_desc', 'project_loc', 'adrs_country', 'adrs_city', 'adrs_region', 'adrs_district', 'adrs_street', 'param_space', 'param_delivertype', 'param_deliverdate', 'param_totalunits', 'seo_keywords', 'seo_desc', 'stat_created', 'stat_updated', 'stat_views', 'stat_shares', 'rec_state'];
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
                        <?php foreach($fields as $field):?>
                            <tr>
                                <th><?= __($field) ?></th>
                                <td><?= $this->Do->DtSetter($rec->$field, $field) ?></td>
                            </tr>
                        <?php endforeach?>
                        </table>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</div>


