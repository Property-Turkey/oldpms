<?php
$ctrl = $this->request->getParam('controller');
$userConfigMenu = [
    [
        "name" => "myaccount",
        "icon" => "user",
        "url" => ["controller" => "Users", "action" => "myaccount"]
    ],
    [
        "name" => "logout",
        "icon" => "sign-out",
        "url" => ["prefix" => false, "controller" => "Users", "action" => "logout"]
    ],
    [
        "name" => "myOffers",
        "icon" => "th-list",
        "url" => ["controller" => "Proposals", "action" => "index"]
    ],
];
if(in_array( $ctrl, ['Properties', 'Projects']) ){
    $userConfigMenu[] = [
        "name" => "my".$ctrl,
        "icon" => "th-list",
        "url" => "rec.search.user_id = ".$authUser['id']."; doSearch();"
        //["controller" => $this->request->getPAram('controller'), "action" => "index", "?"=>["me"=>1]]
    ];
}
?>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle hideWebFlex">
            <a href ng-click="showMenu()"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                
                <?php // User menu ?>
                <li class="nav-item dropdown open">
                    <a href="javascript:void(0);" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <?= $this->Html->image('/img/user.png', ["class" => "img-circle ", "alt" => "..."]) ?> <span class="hideMob"><?= $authUser["user_fullname"] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php
                        foreach ($userConfigMenu as $itm) {
                            if( is_string( $itm["url"] ) ){
                                echo $this->Html->link("<i class='fa fa-" . $itm["icon"] . "'></i> " .__($itm["name"]), [] ,["class" => "dropdown-item", "ng-click"=>$itm["url"], "escape" => false]);
                            }else{
                                echo $this->Html->link("<i class='fa fa-" . $itm["icon"] . "'></i> " . __($itm["name"]),$itm["url"] ,["class" => "dropdown-item", "escape" => false]);
                            }
                        }
                        ?>
                        <!--
                        <a class="dropdown-item"  href="javascript:void(0);"> Profile</a>
                            <a class="dropdown-item"  href="javascript:void(0);">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                            </a>
                        <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        -->
                    </div>
                </li>

                <?php /* Notifications menu ?>
                <li class="nav-item dropdown open" ng-init="getNotifications()">

                    <a href="javascript:void(0);" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false" ng-click="getNotifications()">
                        <i class="fa fa-bell"></i>
                        <span class="{{notifications.total>0 ? 'badgeNote' : ''}}">{{notifications.total}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:void(0);" class="nav-item"
                            ng-repeat="(k, itm) in notifications track by $index" ng-if="notifications.total>0">
                            <span>{{k.substr(4)}}:</span> <span ng-class="{redText: itm>0}">{{itm}}</span>
                        </a>
                    </div>
                </li>
                <?php */?>


                <?php // Massenger menu ?>
                <li role="presentation" class="nav-item">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#massenger_mdl" >
                        <i class="fa fa-envelope greenText"></i>
                        <span class="{{messages.total>0 ? 'badgeNote' : ''}}">{{messages.total}}</span>
                    </a>
                </li>
                
                <?php // Currencies ?>
                <li class="nav-item dropdown open">
                    <a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <?=$this->Do->get('currencies_icons')[$currCurrency].' '.$this->Do->get('currencies')[$currCurrency]?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width:100px">
                        <?php
                        foreach ($this->Do->get('currencies') as $key=>$currency) {
                            if($currCurrency == $key){continue;}
                            echo $this->Html->link(
                                $this->Do->get('currencies_icons')[$key].' '.$this->Do->get('currencies')[$key],
                                'javascript:void(0);', 
                                ["class" => "dropdown-item", "ng-click"=>"doGet('/configs/setcurrency/$key', 'reload')", "escape" => false]);
                        }
                        ?>
                    </div>
                </li>
                
                <?php // Languages menu  ?>
                <li class="nav-item dropdown open">
                    <a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-globe"></i> <?=$this->Do->get('langs')[$currlangid]?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width:100px">
                        <?php
                        foreach ($this->Do->get('langs') as $key=>$lang) {
                            if($currlangid == $key){continue;}
                            echo $this->Html->link(
                                $this->Do->get('langs')[$key],
                                'javascript:void(0);', 
                                ["class" => "dropdown-item", "ng-click"=>"doGet('/configs/setlanguage/$lang', 'reload')", "escape" => false]);
                        }
                        ?>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->