<?php 
    $cats = [5=>"project_types", 6=>"property_types", 1=>"project_features", 2=>"property_features", 3=>"property_specs", 4=>"project_specs"];
    $parent_id = $this->request->getParam('pass')[0];
?>

<div class="modal fade" id="addEdit_mdl" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="listing-modal-1 modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					<h4 ng-if="!rec.category.id"><?=__('add_'.$cats[ $parent_id ])?></h4>
					<h4 ng-if="rec.category.id"><?=__('edit_'.$cats[ $parent_id ])?></h4>
				</h4>
			</div>
			<div class="modal-body">


			
				<div class="x_content">

					<button ng-click="
							doGet('/admin/categories/index/<?=$parent_id?>', 'list', 'categories'); 
							rec.category=newEntity('category');
						" id="category_btn" class="hideIt"></button>

						<!-- data-dismiss="modal" aria-hidden="true"  -->
					<form class="form-label-left input_mask " id="category_form" enctype="multipart/form-data"
						novalidate="novalidate"
						ng-submit=" 
							rec.category.parent_id = !rec.parent.id ? '<?=$parent_id?>'*1 : rec.parent.id;
							doSave (rec.category, 'category', 'categories', '#category_btn'); " >
						
						<div class="col-md-12 col-sm-12  form-group has-feedback" ng-if="rec.parent">
							<h2><?=__('parent_id')?> : {{rec.parent.category_name}}</h2>
						</div>

						<div class="col-md-12 col-sm-12  form-group has-feedback">
							<label><?=__('category_name_'.$cats[ $parent_id ])?></label>
							<div class="div">
								<?=$this->Form->text('category_name', [
									'type'=>'text', 
									'class'=>'form-control has-feedback-left',
									'ng-model'=>'rec.category.category_name'
								])?>
								<span class="fa fa-header form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>

						
						<?php /* // Tag input?>
						<div class="col-md-12 col-sm-12  form-group has-feedback">
							<label><?=__('category_name_'.$cats[ $parent_id ])?></label>
							<div class="div">
								<?php echo $this->element('tagInput-ng', ['ng'=>'rec.category.category_name'])?>
							</div>
						</div>
						<?php */?>


						<div class="clearfix"></div>

						<div class="form-group ">
							<div class="col-md-12 col-sm-6  form-group has-feedback ">
								<button type="submit" class="btn btn-info"><span><i class="fa fa-save"></i></span> <?=__('save')?></button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>





