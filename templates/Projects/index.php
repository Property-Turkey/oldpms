<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 */
?>
<div class="projects index content">
    <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projects') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('language_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('developer_id') ?></th>
                    <th><?= $this->Paginator->sort('features_ids') ?></th>
                    <th><?= $this->Paginator->sort('project_title') ?></th>
                    <th><?= $this->Paginator->sort('project_loc') ?></th>
                    <th><?= $this->Paginator->sort('project_ref') ?></th>
                    <th><?= $this->Paginator->sort('project_currency') ?></th>
                    <th><?= $this->Paginator->sort('adrs_country') ?></th>
                    <th><?= $this->Paginator->sort('adrs_city') ?></th>
                    <th><?= $this->Paginator->sort('adrs_region') ?></th>
                    <th><?= $this->Paginator->sort('adrs_district') ?></th>
                    <th><?= $this->Paginator->sort('adrs_street') ?></th>
                    <th><?= $this->Paginator->sort('param_space') ?></th>
                    <th><?= $this->Paginator->sort('param_greenspace') ?></th>
                    <th><?= $this->Paginator->sort('param_homesspace') ?></th>
                    <th><?= $this->Paginator->sort('param_delivertype') ?></th>
                    <th><?= $this->Paginator->sort('param_deliverdate') ?></th>
                    <th><?= $this->Paginator->sort('param_totalunits') ?></th>
                    <th><?= $this->Paginator->sort('param_blocks') ?></th>
                    <th><?= $this->Paginator->sort('param_residential_units') ?></th>
                    <th><?= $this->Paginator->sort('param_commercial_units') ?></th>
                    <th><?= $this->Paginator->sort('param_unit_types') ?></th>
                    <th><?= $this->Paginator->sort('param_units_size_range') ?></th>
                    <th><?= $this->Paginator->sort('param_downpayment') ?></th>
                    <th><?= $this->Paginator->sort('param_installment') ?></th>
                    <th><?= $this->Paginator->sort('param_installment_months') ?></th>
                    <th><?= $this->Paginator->sort('seo_title') ?></th>
                    <th><?= $this->Paginator->sort('seo_keywords') ?></th>
                    <th><?= $this->Paginator->sort('seo_desc') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('stat_updated') ?></th>
                    <th><?= $this->Paginator->sort('stat_views') ?></th>
                    <th><?= $this->Paginator->sort('stat_shares') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $this->Number->format($project->id) ?></td>
                    <td><?= $project->language_id === null ? '' : $this->Number->format($project->language_id) ?></td>
                    <td><?= $project->has('category') ? $this->Html->link($project->category->id, ['controller' => 'Categories', 'action' => 'view', $project->category->id]) : '' ?></td>
                    <td><?= $project->has('user') ? $this->Html->link($project->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '' ?></td>
                    <td><?= $project->has('developer') ? $this->Html->link($project->developer->dev_name, ['controller' => 'Developers', 'action' => 'view', $project->developer->id]) : '' ?></td>
                    <td><?= h($project->features_ids) ?></td>
                    <td><?= h($project->project_title) ?></td>
                    <td><?= h($project->project_loc) ?></td>
                    <td><?= h($project->project_ref) ?></td>
                    <td><?= $project->project_currency === null ? '' : $this->Number->format($project->project_currency) ?></td>
                    <td><?= h($project->adrs_country) ?></td>
                    <td><?= h($project->adrs_city) ?></td>
                    <td><?= h($project->adrs_region) ?></td>
                    <td><?= h($project->adrs_district) ?></td>
                    <td><?= h($project->adrs_street) ?></td>
                    <td><?= $project->param_space === null ? '' : $this->Number->format($project->param_space) ?></td>
                    <td><?= $project->param_greenspace === null ? '' : $this->Number->format($project->param_greenspace) ?></td>
                    <td><?= $project->param_homesspace === null ? '' : $this->Number->format($project->param_homesspace) ?></td>
                    <td><?= $project->param_delivertype === null ? '' : $this->Number->format($project->param_delivertype) ?></td>
                    <td><?= h($project->param_deliverdate) ?></td>
                    <td><?= $project->param_totalunits === null ? '' : $this->Number->format($project->param_totalunits) ?></td>
                    <td><?= $project->param_blocks === null ? '' : $this->Number->format($project->param_blocks) ?></td>
                    <td><?= $project->param_residential_units === null ? '' : $this->Number->format($project->param_residential_units) ?></td>
                    <td><?= $project->param_commercial_units === null ? '' : $this->Number->format($project->param_commercial_units) ?></td>
                    <td><?= h($project->param_unit_types) ?></td>
                    <td><?= h($project->param_units_size_range) ?></td>
                    <td><?= $project->param_downpayment === null ? '' : $this->Number->format($project->param_downpayment) ?></td>
                    <td><?= $project->param_installment === null ? '' : $this->Number->format($project->param_installment) ?></td>
                    <td><?= $project->param_installment_months === null ? '' : $this->Number->format($project->param_installment_months) ?></td>
                    <td><?= h($project->seo_title) ?></td>
                    <td><?= h($project->seo_keywords) ?></td>
                    <td><?= h($project->seo_desc) ?></td>
                    <td><?= h($project->stat_created) ?></td>
                    <td><?= h($project->stat_updated) ?></td>
                    <td><?= $this->Number->format($project->stat_views) ?></td>
                    <td><?= $this->Number->format($project->stat_shares) ?></td>
                    <td><?= $this->Number->format($project->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
