<div class="modal fade" id="updateProject_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <div><?= __('update_project') ?></div>
                </h4>
            </div>
            <div class="modal-body">

                <button type="button" id="project_btn_update" class="hideIt" ng-click="
                    lists.projects[ rec.ind ] = rec.project;
                    rec.project.id>0 ? '' : rec.project = {};
                    doClick('.close');
                    "></button>

                <form class="row" id="project_form" ng-submit="
                    rec.project.stat_updated = '<?=date('Y-m-d H:i:s')?>';
                    doSave(rec.project, 'project', 'projects', '#project_btn_update', '#project_preloader'); ">

                    <!-- Payment plan -->
                    <?php echo $this->element('Includes/payment_plan')?>

                    <div class="col-md-12 col-12 text-center">
                        <button type="submit" class="btn btn-success" id="project_preloader" ng-disabled="!rec.project.id">
                            <span></span><?= __('update') ?>
                        </button>
                    </div>

                    <hr class="clearfix col-md-12 col-sm-12 row " />

                </form>
                    
                <!-- Floorplans -->
                <?php echo $this->element('Includes/floorplans')?>

            </div>
        </div>
    </div>
</div>