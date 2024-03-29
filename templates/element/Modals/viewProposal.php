
<div class="modal fade" id="viewProposal_mdl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <?= __('view_proposal') ?>
                </h4>
            </div>

            <div class="modal-body">
                <?=include_once("./templates/Proposals/proposal.php")?>
            </div>
        </div>
    </div>
</div>