<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="projects view content">
            <h3><?= h($project->project_title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $project->has('category') ? $this->Html->link($project->category->id, ['controller' => 'Categories', 'action' => 'view', $project->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $project->has('user') ? $this->Html->link($project->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Developer') ?></th>
                    <td><?= $project->has('developer') ? $this->Html->link($project->developer->dev_name, ['controller' => 'Developers', 'action' => 'view', $project->developer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Features Ids') ?></th>
                    <td><?= h($project->features_ids) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Title') ?></th>
                    <td><?= h($project->project_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Loc') ?></th>
                    <td><?= h($project->project_loc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Ref') ?></th>
                    <td><?= h($project->project_ref) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Country') ?></th>
                    <td><?= h($project->adrs_country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs City') ?></th>
                    <td><?= h($project->adrs_city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Region') ?></th>
                    <td><?= h($project->adrs_region) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs District') ?></th>
                    <td><?= h($project->adrs_district) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Street') ?></th>
                    <td><?= h($project->adrs_street) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Unit Types') ?></th>
                    <td><?= h($project->param_unit_types) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Units Size Range') ?></th>
                    <td><?= h($project->param_units_size_range) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Title') ?></th>
                    <td><?= h($project->seo_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Keywords') ?></th>
                    <td><?= h($project->seo_keywords) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Desc') ?></th>
                    <td><?= h($project->seo_desc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language Id') ?></th>
                    <td><?= $project->language_id === null ? '' : $this->Number->format($project->language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Currency') ?></th>
                    <td><?= $project->project_currency === null ? '' : $this->Number->format($project->project_currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Space') ?></th>
                    <td><?= $project->param_space === null ? '' : $this->Number->format($project->param_space) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Greenspace') ?></th>
                    <td><?= $project->param_greenspace === null ? '' : $this->Number->format($project->param_greenspace) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Homesspace') ?></th>
                    <td><?= $project->param_homesspace === null ? '' : $this->Number->format($project->param_homesspace) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Delivertype') ?></th>
                    <td><?= $project->param_delivertype === null ? '' : $this->Number->format($project->param_delivertype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Totalunits') ?></th>
                    <td><?= $project->param_totalunits === null ? '' : $this->Number->format($project->param_totalunits) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Blocks') ?></th>
                    <td><?= $project->param_blocks === null ? '' : $this->Number->format($project->param_blocks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Residential Units') ?></th>
                    <td><?= $project->param_residential_units === null ? '' : $this->Number->format($project->param_residential_units) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Commercial Units') ?></th>
                    <td><?= $project->param_commercial_units === null ? '' : $this->Number->format($project->param_commercial_units) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Downpayment') ?></th>
                    <td><?= $project->param_downpayment === null ? '' : $this->Number->format($project->param_downpayment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Installment') ?></th>
                    <td><?= $project->param_installment === null ? '' : $this->Number->format($project->param_installment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Installment Months') ?></th>
                    <td><?= $project->param_installment_months === null ? '' : $this->Number->format($project->param_installment_months) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Views') ?></th>
                    <td><?= $this->Number->format($project->stat_views) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Shares') ?></th>
                    <td><?= $this->Number->format($project->stat_shares) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($project->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Deliverdate') ?></th>
                    <td><?= h($project->param_deliverdate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($project->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($project->stat_updated) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Project Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->project_desc)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Project Photos') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->project_photos)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Project Videos') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($project->project_videos)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Properties') ?></h4>
                <?php if (!empty($project->properties)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Developer Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Features Ids') ?></th>
                            <th><?= __('Tags Ids') ?></th>
                            <th><?= __('Property Title') ?></th>
                            <th><?= __('Property Desc') ?></th>
                            <th><?= __('Property Photos') ?></th>
                            <th><?= __('Property Videos') ?></th>
                            <th><?= __('Property Price') ?></th>
                            <th><?= __('Property Usdprice') ?></th>
                            <th><?= __('Property Currency') ?></th>
                            <th><?= __('Property Loc') ?></th>
                            <th><?= __('Property Ref') ?></th>
                            <th><?= __('Property Usp') ?></th>
                            <th><?= __('Param Issold') ?></th>
                            <th><?= __('Property Isfeatured') ?></th>
                            <th><?= __('Property Isindexed') ?></th>
                            <th><?= __('Adrs Country') ?></th>
                            <th><?= __('Adrs City') ?></th>
                            <th><?= __('Adrs Region') ?></th>
                            <th><?= __('Adrs District') ?></th>
                            <th><?= __('Adrs Street') ?></th>
                            <th><?= __('Adrs Block') ?></th>
                            <th><?= __('Adrs No') ?></th>
                            <th><?= __('Param Netspace') ?></th>
                            <th><?= __('Param Grossspace') ?></th>
                            <th><?= __('Param Rooms') ?></th>
                            <th><?= __('Param Bedrooms') ?></th>
                            <th><?= __('Param Buildage') ?></th>
                            <th><?= __('Param Floors') ?></th>
                            <th><?= __('Param Floor') ?></th>
                            <th><?= __('Param Heat') ?></th>
                            <th><?= __('Param Bathrooms') ?></th>
                            <th><?= __('Param Balconies') ?></th>
                            <th><?= __('Param Isfurnitured') ?></th>
                            <th><?= __('Param Isresale') ?></th>
                            <th><?= __('Param Iscitizenship') ?></th>
                            <th><?= __('Param Isresidence') ?></th>
                            <th><?= __('Param Iscommission Included') ?></th>
                            <th><?= __('Param Ispublished') ?></th>
                            <th><?= __('Param Isslider') ?></th>
                            <th><?= __('Param Titledeed') ?></th>
                            <th><?= __('Param Usestatus') ?></th>
                            <th><?= __('Param Monthlytax') ?></th>
                            <th><?= __('Param Payment') ?></th>
                            <th><?= __('Param Ownership') ?></th>
                            <th><?= __('Param Ownertype') ?></th>
                            <th><?= __('Param Deposit') ?></th>
                            <th><?= __('Param Delivertype') ?></th>
                            <th><?= __('Param Deliverdate') ?></th>
                            <th><?= __('Seo Title') ?></th>
                            <th><?= __('Seo Keywords') ?></th>
                            <th><?= __('Seo Desc') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th><?= __('Stat Views') ?></th>
                            <th><?= __('Stat Shares') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->properties as $properties) : ?>
                        <tr>
                            <td><?= h($properties->id) ?></td>
                            <td><?= h($properties->slug) ?></td>
                            <td><?= h($properties->language_id) ?></td>
                            <td><?= h($properties->category_id) ?></td>
                            <td><?= h($properties->user_id) ?></td>
                            <td><?= h($properties->developer_id) ?></td>
                            <td><?= h($properties->project_id) ?></td>
                            <td><?= h($properties->features_ids) ?></td>
                            <td><?= h($properties->tags_ids) ?></td>
                            <td><?= h($properties->property_title) ?></td>
                            <td><?= h($properties->property_desc) ?></td>
                            <td><?= h($properties->property_photos) ?></td>
                            <td><?= h($properties->property_videos) ?></td>
                            <td><?= h($properties->property_price) ?></td>
                            <td><?= h($properties->property_usdprice) ?></td>
                            <td><?= h($properties->property_currency) ?></td>
                            <td><?= h($properties->property_loc) ?></td>
                            <td><?= h($properties->property_ref) ?></td>
                            <td><?= h($properties->property_usp) ?></td>
                            <td><?= h($properties->param_issold) ?></td>
                            <td><?= h($properties->property_isfeatured) ?></td>
                            <td><?= h($properties->property_isindexed) ?></td>
                            <td><?= h($properties->adrs_country) ?></td>
                            <td><?= h($properties->adrs_city) ?></td>
                            <td><?= h($properties->adrs_region) ?></td>
                            <td><?= h($properties->adrs_district) ?></td>
                            <td><?= h($properties->adrs_street) ?></td>
                            <td><?= h($properties->adrs_block) ?></td>
                            <td><?= h($properties->adrs_no) ?></td>
                            <td><?= h($properties->param_netspace) ?></td>
                            <td><?= h($properties->param_grossspace) ?></td>
                            <td><?= h($properties->param_rooms) ?></td>
                            <td><?= h($properties->param_bedrooms) ?></td>
                            <td><?= h($properties->param_buildage) ?></td>
                            <td><?= h($properties->param_floors) ?></td>
                            <td><?= h($properties->param_floor) ?></td>
                            <td><?= h($properties->param_heat) ?></td>
                            <td><?= h($properties->param_bathrooms) ?></td>
                            <td><?= h($properties->param_balconies) ?></td>
                            <td><?= h($properties->param_isfurnitured) ?></td>
                            <td><?= h($properties->param_isresale) ?></td>
                            <td><?= h($properties->param_iscitizenship) ?></td>
                            <td><?= h($properties->param_isresidence) ?></td>
                            <td><?= h($properties->param_iscommission_included) ?></td>
                            <td><?= h($properties->param_ispublished) ?></td>
                            <td><?= h($properties->param_isslider) ?></td>
                            <td><?= h($properties->param_titledeed) ?></td>
                            <td><?= h($properties->param_usestatus) ?></td>
                            <td><?= h($properties->param_monthlytax) ?></td>
                            <td><?= h($properties->param_payment) ?></td>
                            <td><?= h($properties->param_ownership) ?></td>
                            <td><?= h($properties->param_ownertype) ?></td>
                            <td><?= h($properties->param_deposit) ?></td>
                            <td><?= h($properties->param_delivertype) ?></td>
                            <td><?= h($properties->param_deliverdate) ?></td>
                            <td><?= h($properties->seo_title) ?></td>
                            <td><?= h($properties->seo_keywords) ?></td>
                            <td><?= h($properties->seo_desc) ?></td>
                            <td><?= h($properties->stat_created) ?></td>
                            <td><?= h($properties->stat_updated) ?></td>
                            <td><?= h($properties->stat_views) ?></td>
                            <td><?= h($properties->stat_shares) ?></td>
                            <td><?= h($properties->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Properties', 'action' => 'view', $properties->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Properties', 'action' => 'edit', $properties->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Properties', 'action' => 'delete', $properties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $properties->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
