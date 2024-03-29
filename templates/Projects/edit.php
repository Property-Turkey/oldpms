<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $developers
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $project->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Edit Project') ?></legend>
                <?php
                    echo $this->Form->control('language_id');
                    echo $this->Form->control('category_id', ['options' => $categories]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('developer_id', ['options' => $developers, 'empty' => true]);
                    echo $this->Form->control('features_ids');
                    echo $this->Form->control('project_title');
                    echo $this->Form->control('project_desc');
                    echo $this->Form->control('project_photos');
                    echo $this->Form->control('project_videos');
                    echo $this->Form->control('project_loc');
                    echo $this->Form->control('project_ref');
                    echo $this->Form->control('project_currency');
                    echo $this->Form->control('adrs_country');
                    echo $this->Form->control('adrs_city');
                    echo $this->Form->control('adrs_region');
                    echo $this->Form->control('adrs_district');
                    echo $this->Form->control('adrs_street');
                    echo $this->Form->control('param_space');
                    echo $this->Form->control('param_greenspace');
                    echo $this->Form->control('param_homesspace');
                    echo $this->Form->control('param_delivertype');
                    echo $this->Form->control('param_deliverdate', ['empty' => true]);
                    echo $this->Form->control('param_totalunits');
                    echo $this->Form->control('param_blocks');
                    echo $this->Form->control('param_residential_units');
                    echo $this->Form->control('param_commercial_units');
                    echo $this->Form->control('param_unit_types');
                    echo $this->Form->control('param_units_size_range');
                    echo $this->Form->control('param_downpayment');
                    echo $this->Form->control('param_installment');
                    echo $this->Form->control('param_installment_months');
                    echo $this->Form->control('seo_title');
                    echo $this->Form->control('seo_keywords');
                    echo $this->Form->control('seo_desc');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('stat_updated', ['empty' => true]);
                    echo $this->Form->control('stat_views');
                    echo $this->Form->control('stat_shares');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
