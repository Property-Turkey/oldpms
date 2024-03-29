<div class="modal fade" id="getpassword_mdl" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="listing-modal-1 modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="modal-title">
					<?=__('getpassword')?>
				</h2>
			</div>
			<div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <form method="post" novalidate="novalidate" ng-submit="doGetPassword();" id="getpassword_form" class="row">
                                <div class="from-group col-sm-12">
                                    <?=$this->Form->control("email", ["class"=>"form-control", "type"=>"text" ,"ng-model"=>"rec.user.email" , "placeholder"=>__("email"), "label"=>false, 
                                        'templates' => ['inputContainer' => '{{content}}']])?>
                                </div>
                                <div class="from-group col-sm-12">
                                    <button class="btn btn-info" id="getpassword_btn" type="submit" >
                                        <span><i class="fa fa-key"></i></span> <?=__('submit')?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>