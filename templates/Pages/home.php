<?php
    $this->assign('title', __('sitemoto'));
?>

<section class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6 mb-5 mt-5">
            
        
        </div>
    </div>
</section>

<?php if(!$authUser){?>

<div class="container">
    <div class="row justify-content-md-center" full-hieght>
        <div class="col-md-6">
            <form method="post" novalidate="novalidate" ng-submit="doLogin();" id="login_form" class="row">
                <div class="input-group col-md-12 mb-3">
                    <?=$this->Form->control("email", ["class"=>"form-control", "type"=>"email" ,"ng-model"=>"rec.user.email" , "placeholder"=>__("email"), "label"=>false, 
                    'templates' => ['inputContainer' => '{{content}}']])?>
                </div>
                <div class="input-group col-md-12 mb-3">
                    <?=$this->Form->control("password", ["class"=>"form-control", "ng-model"=>"rec.user.password" ,
                    "type"=>"password" , "label"=>false, 
                    "placeholder"=>__("password"), 
                    'templates' => ['inputContainer' => '{{content}}']])?>
                </div>
                <div class="input-group col-md-12 mb-3">
                    <label class="mycheckbox">
                        <input type="checkbox" ng-model="rec.user.remember_me"/> <span></span> <?=__('remember_me')?>
                    </label>
                </div>
                <div class="from-group col mb-3">
                    <button class="btn btn-info" id="login_btn" >
                        <span><i class="fas fa-sign-out-alt"></i></span> <?=__('login')?> 
                    </button>
                    <a href class="" data-toggle="modal" data-target="#getpassword_mdl" data-dismiss="modal">
                         <?=__('forget_password')?>
                    </a> 
                </div>
            </form>
        </div>
    </div>
</div>

    <?php // Get Password Modal?>
    <?php echo $this->element('Modals/getpassword');?>

<?php }else{?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-12 mb-3" style="text-align: center;">
            <h1><?=$this->Html->image('/img/logo.png', ["style"=> 'height: 50px; margin: -5px 10px 0 0;'])?><?=__('PROPERTY TURKEY')?></h1>
        </div>
    </div>
            
    <?php // APPS MENU    ?>
    <div class="row justify-content-center">

        <?php //CRM  ?>
        <div class=" col col-sm-6 col-12 tile_div">
            <a href="<?=$app_folder?>/admin" class="disabled">
                <div class="tile_content">
                    <div class="count_top"><i class="fa-regular fa-handshake"></i> <h2><?= __('CRM') ?></h2></div>
                    <small><?=__('CRM_desc')?></small>
                </div>
            </a>
        </div>

        <?php //PMS  ?>
        <div class=" col col-sm-6 col-12 tile_div">
            <a href="<?=$app_folder?>/admin" class="">
                <div class="tile_content">
                    <div class="count_top"><i class="fa fa-database"></i> <h2><?= __('PMS') ?></h2></div>
                    <small><?=__('PMS_desc')?></small>
                </div>
            </a>
        </div>

        <?php //Management ( AfterSale )  ?>
        <div class=" col col-sm-6 col-12 tile_div">
            <a href="<?=$app_folder?>/admin" class="disabled">
                <div class="tile_content">
                    <div class="count_top"><i class="fa-solid fa-hand-holding-medical"></i> <h2><?= __('Management') ?></h2></div>
                    <small><?=__('Management_desc')?></small>
                </div>
            </a>
        </div>
    </div>
            
</div>
         
<?php }?>