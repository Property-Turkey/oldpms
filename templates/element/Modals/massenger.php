<div class="modal fade" id="massenger_mdl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel10" aria-hidden="true">
    <div class="listing-modal-1 modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content" style="overflow: auto; max-height: 550px;">
            <div class="cvr" id="modal_cvr"><img ng-src="<?=$app_folder?>/img/logo.svg" style="height: 200px" /></div>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel0">
                    <?= __('massenger') ?>
                </h4>
            </div>
            <div class="modal-header tabs_buttons">
                <a href class="col {{currTab == 'in_msgs' ? 'activeBtn' : ''}}" 
                    ng-click="
                        currTab = 'in_msgs';
                        rec.message={};
                        doGet('/admin/messages?list=in', 'list', 'messages', '#modal_cvr');">
                    <i class="fa fa-indent"></i> <?= __('income_messages') ?>
                </a>
                <a href class="col {{currTab == 'out_msgs' ? 'activeBtn' : ''}}" 
                    ng-click="
                        currTab = 'out_msgs'; 
                        rec.message={};
                        doGet('/admin/messages?list=out', 'list', 'messages', '#modal_cvr');">
                    <i class="fa fa-outdent"></i> <?= __('outgoing_messages') ?>
                </a>
                <a href class="col {{currTab == 'send_msg' ? 'activeBtn' : ''}}" 
                    ng-click="
                        rec.message={};
                        currTab = 'send_msg';">
                    <i class="fa fa-paper-plane"></i> <?= __('sending_message') ?>
                </a>
            </div>
            <div class="modal-body">

                <button class="hideIt" id="messages_btn" 
                    ng-click="doGet('/admin/messages?ajax=1&list=1&page='+paging.page, 'list', 'messages', '#modal_cvr');"></button>

                <?php // INCOME MESSAGES AND OUGOING MESSAGES ?>
                <div class="row notActiveTab" ng-class="{activeTab : currTab == 'in_msgs' || currTab == 'out_msgs'}">
                    <?php // messages list?>
                    <div class="col-sm-12 mb-5">
                        
                        <div class="row">
                            <div class="col-6 grayText"><?=__('message_subject')?></div>
                            <div class="col-6 grayText"><?=__('from')?></div>
                        </div>

                        <div ng-repeat="msg in lists.messages" class="row">
                            <a href class="col-6" ng-class="{boldText: (msg.rec_state==1 && currTab == 'out_msgs') || msg.isNew==1}" 
                                ng-click="doGet('/admin/messages?id='+msg.id, 'rec', 'message', '#modal_cvr'); msg.isNew=2">
                                <i class="fa fa-envelope{{((msg.rec_state==1 && currTab == 'out_msgs') || msg.isNew==1) ? '' : '-open-o'}}"></i> {{msg.message_subject}}
                            </a>
                            <div class="col-6"><i>{{msg.user.user_fullname}}</i></div>
                        </div>
                        
                        <div class="row">
                            <div class="no_data" ng-if="lists.messages.length<1">
                                <?= __('no-data'); ?>
                            </div>
                        </div>
                    </div>

                    <?php // message viewer?>
                    <div class="col-12 message_viewer" id="message_viewer_vid" ng-if="rec.message.id">
                        <a href class="btn-warning btn-exit" ng-click="rec.message={}"><i class="fa fa-times"></i> <?=__('close')?></a>
                        <div class="speaker_title"><i class="grayText">{{DtSetter('roles', rec.message.user.user_role)}}:</i> {{rec.message.user.user_fullname}}</div>
                        </h5>
                        <p ng-bind-html="rec.message.message_text"></p>
                        <hr>
                        <div ng-repeat="child in rec.message.child_messages">
                            <div class="sub_message">
                                <div class="speaker_title"><i class="grayText">{{DtSetter('roles', child.user.user_role)}}:</i> {{child.user.user_fullname}}</div>
                                <p ng-bind-html="child.message_text"></p>
                            </div>
                        </div>
                        
                        <?php // message replyer?>
                        <button class="hideIt" 
                            ng-click="
                                doGet('/admin/messages?id='+rec.message.id, 'rec', 'message', '#modal_cvr');
                                rec.new_message.message_text='';
                            " 
                            id="reply_message_btn"></button>
                        <form class="btns" id="reply_form"
                                ng-submit="
                                    rec.new_message.parent_id = rec.message.id;
                                    rec.new_message.message_to = rec.message.message_to;
                                    doSave(rec.new_message, 'messages', 'messages', '#reply_message_btn', '#reply_btn', '#reply_form');
                                ">
                            <div>
                                <?=$this->Form->input('message_text', [
                                    'type' => 'text',
                                    'class' => 'form-control mb-1',
                                    'label' => false,
                                    'placeholder' => __('write_your_reply'), 
                                    'ng-model' => 'rec.new_message.message_text'
                                ])?>
                            </div>
                            <button href class="btn btn-small btn-info" class="reply_btn">
                                <span></span> <i class="fa fa-reply"></i> <?=__('reply')?>
                            </button>
                        </form>
                    </div>
                </div>


                <?php // SENDING MESSAGE ?>
                <button class="hideIt" ng-click="rec.message={};" id="message_btn"></button>
                <form class="row notActiveTab" id="message_form" ng-submit=" 
                        doSave(rec.message, 'messages', 'messages', '#message_btn', '#message_cvr', '#message_form'); 
                    " ng-class="{activeTab : currTab == 'send_msg'}">
                    <div class="col-sm-12"><?= __('assign_message_to_office_or_users') ?></div><hr/>
                    <div class="mb-2 col-sm-6">
                        <label><?= __('offices') ?></label>
                        <?= $this->Form->control('office', [
                            'type' => 'select', 'label' => false,
                            'empty' => __('select_office'),
                            'options' => $offices, 'class' => 'form-control',
                            'ng-model' => 'rec.message.office_id'
                        ]); ?>
                    </div>

                    <div class="mb-2 col-sm-6">
                        <label><?= __('search_for_users') ?> <small id="search_loader"><span></span></small></label>
                        <?= $this->Form->control('users', [
                            'type' => 'text', 'label' => false, 'class' => 'form-control',
                            'ng-model' => "search_keywork['users']",
                            'name' => false,
                            'ng-change' => "doUsersSearch( )",
                            'placeholder' => __('write_user_name')
                        ]); ?>
                    </div>

                    <div class="mb-2 mt-3 col-12">
                        <div class="row">
                            <label ng-repeat="user in lists.users" class="col mb-3">
                                <div class="roundImg">
                                    <a href="javascript:void(0);" title="{{DtSetter('roles', user.user_role)}}" class="xsmlMedal" >
                                        <img ng-src="<?= $app_folder ?>/img/badges/ptbadge{{roles_badge[user.user_role]}}.svg" />
                                    </a>
                                    <div class="chkbx mycheckbox">
                                        <input type="checkbox" ng-model="rec.message.selectedUsers[$index][user.id]" ng-value="{{user.id}}" /><span></span>
                                    </div>
                                    <img class="xsmlImg" 
                                        ng-src="{{ getPhoto(false, user.profile.profile_photo, 'users', 'user-noimg.jpg') }}">
                                </div>
                                <div>{{user.user_fullname}}</div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-2 col-sm-9">
                        <label><?= __('message_subject') ?></label>
                        <?= $this->Form->control('message_subject', [
                            'type' => 'text', 'label' => false, 'class' => 'form-control',
                            'ng-model' => "rec.message.message_subject",
                            'placeholder' => __('write_your_message_subject'),
                        ]); ?>
                    </div>

                    <div class="mb-2 col-12">
                        <label><?= __('message_text') ?></label>
                        <?= $this->Form->control('message_text', [
                            'type' => 'textarea', 'label' => false, 'class' => 'form-control',
                            'ng-model' => "rec.message.message_text",
                            'placeholder' => __('write_your_message'),
                            'ckeditor' =>  'ckoptions' 
                        ]); ?>
                    </div>

                    <div class="mb-2 col-12">
                        <button class='btn btn-info' id='message_cvr'><span></span> <i class="fa fa-paper-plane"></i> <?= __('send') ?></button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>