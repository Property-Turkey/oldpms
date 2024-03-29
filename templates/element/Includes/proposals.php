<?php 
    $ctrl = $this->request->getParam('controller') == 'Projects' ? 'project' : 'property';
?>
<div class="row">
    <div class="col-6 col-lg-6">
        <h4><?= __('proposals') ?></h4>
    </div>
    <div class="col-6 col-lg-6 text-right">
        <button class="btn btn-primary" type="button" ng-click="addProposal = addProposal == 1 ? 0 : 1">
            <i class="fa fa-plus"></i> <span class="hideMob"><?= __('create_proposal') ?></span>
        </button>
    </div>
</div>

<button type="button" id="proposal_btn" class="hideIt" ng-click="
        doGet('/admin/<?=$ctrl == 'project' ? 'projects' : 'properties'?>?id='+rec.<?=$ctrl?>.id, 'rec', '<?=$ctrl?>');
        rec.proposal.id>0 ? '' : rec.proposal = {};
        "></button>

<form class="grid_row row mb-3 ngif" ng-if="addProposal == 1" id="proposals" ng-submit="
        rec.proposal.tar_id = rec.<?=$ctrl?>.id;
        rec.proposal.tar_tbl = '<?=$ctrl == 'project' ? '2' : '1' ?>';
        doSave(rec.proposal, 'proposal', 'proposals', '#proposal_btn', '#proposal_preloader');
        ">
    <div class="col-lg-6 col-12  form-group has-feedback">
        <label>
            <?= __('proposal_title') ?>
        </label>
        <div class="div">
            <?= $this->Form->control('proposal_title', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'text',
                'ng-model' => 'rec.proposal.proposal_title',
                'placeholder' => __('proposal_title'),
            ]) ?>
            <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
        </div>
    </div>

    <?php if($ctrl == 'project'){?>
    <div class="col-lg-6 col-12  form-group has-feedback">
        <label>
            <?= __('floorplan') ?>
        </label>
        <div class="div">
            <select class="form-control has-feedback-left" 
                ng-options="itm.id as itm.floorplan_name for itm in rec.project.floorplans" 
                ng-model="rec.proposal.proposal_configs.floorplan_id">

            </select>
            <span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
        </div>
    </div>
    <?php } ?>

    <div class="col-md-12 col-sm-12  form-group has-feedback">
        <label>
            <?= __('proposal_desc') ?>
        </label>
        <div class="div">
            <?= $this->Form->control('proposal_desc', [
                'class' => 'form-control has-feedback-left',
                'label' => false,
                'type' => 'textarea',
                'ckeditor' => 'ckoptions',
                'ng-model' => 'rec.proposal.proposal_desc',
                'placeholder' => __('proposal_desc'),
            ]) ?>
            <!-- <span class="fa fa-handshake-o form-control-feedback left" aria-hidden="true"></span> -->
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12  form-group has-feedback ">
        <button type="submit" id="proposal_preloader" class="btn btn-info" 
            <?=$ctrl == 'project' ? 'ng-disabled="!rec.proposal.proposal_configs.floorplan_id"' : ''?> >
            <span></span> <i class="fa fa-save"></i> <?= __('save') ?>
        </button>
        <button type="button" ng-if="rec.proposal.id" ng-click="newEntity('proposal')" class="btn btn-primary">
            <i class="fa fa-times"></i>
        </button>
        <button class="btn btn-warning" type="button" ng-click=" rec.proposal.proposal_desc = rec.proposal.proposal_desc+rec.<?=$ctrl?>.<?=$ctrl?>_desc ">
            <i class="fa fa-plus"></i> <?= __('copy_proj_desc') ?>
        </button>
    </div>
</form>

<div class="grid_row row" ng-repeat="proposal in rec.<?=$ctrl?>.proposals">
    <div class="col-5 grid_header2">
        {{proposal.proposal_title}}
    </div>
    <div class="col-7 notwrapped text-right">
        <a class="small-btn" ng-click="copyToClipBoard('<?= $protocol . ':' . $path ?>/offer/'+proposal.id+'/'+proposal.tar_tbl+'/'+(proposal.proposal_configs.floorplan_id || -1))" href><i class="fa fa-link"></i> <?= __('copy_link') ?></a>
        <a class="small-btn" target="_blank" href="<?= $protocol . ':' . $path ?>/offer/{{proposal.id+'/'+proposal.tar_tbl+'/'+(proposal.proposal_configs.floorplan_id || -1)}}"><i class="fa fa-eye"></i></a>
        <a class="small-btn" target="_blank" href ng-click="rec.proposal = proposal; $parent.addProposal=1;"><i class="fa fa-edit"></i></a>
        <a class="small-btn" href ng-click="doSave({id: proposal.id, rec_state: 0}, 'proposal', 'proposals', '#proposal_btn', '#proposal_preloader');"><i class="fa fa-trash"></i></a>
    </div>
</div>