
<?php 
// "user.portfolio", "user.agency", "user.client", "user.developer", 
// "admin.content", "admin.portfolio", "admin.callcenter", "admin.supervisor", "admin.admin", "admin.root", 

$admin_menu=[
        // ["name"=>"statistics", 
        // "icon"=>"pie-chart",
        // "roles"=>["admin.root"],
        // "active"=>"/stats,/stats/props,/stats/users",
        // "sub" => [
        //         ["name"=>"general_stats", "url" => ["", "stats", ""]],
        //         ["name"=>"properties_stats",  "url" => ["", "stats", "props"]],
        //         ["name"=>"users_stats",  "url" => ["", "stats", "users"]]
        //     ]
        // ],
        // ["name"=>"categories",
        //  "icon"=>"bars",
        //  "roles"=>["admin.root"],
        // "active"=>"/categories/index/5,/categories/index/6,/categories/index/1,/categories/index/2,/categories/index/3,/categories/index/4",
        //  "sub" => [
        //         ["name"=>"project_types", "url" => ["Categories", "index", 5]],
        //         ["name"=>"property_types",  "url" => ["Categories", "index", 6]],
        //         ["name"=>"project_features", "url" => ["Categories", "index", 1]],
        //         ["name"=>"property_features",  "url" => ["Categories", "index", 2]],
        //         ["name"=>"property_specs",  "url" => ["Categories", "index", 3]],
        //         ["name"=>"project_specs", "url" => ["Categories", "index", 4]],
        //     ]
        // ],
        ["name"=>"properties",
         "icon"=>"home",
         "roles"=>["admin.root", "admin.portfolio", "admin.callcenter", "admin.supervisor", "admin.admin", "admin.content"],
         "active"=>"/properties/index,/properties/save,/properties/view,/properties/wizard",
         "sub" => [
                ["name"=>"all", "url" => ["Properties", "index", ""]],
                // ["name"=>"create",  "url" => ["Properties", "save", ""]],
                // ["name"=>"create",  "url" => ["Properties", "wizard", ""]]
            ]
        ],
        ["name"=>"projects",
         "icon"=>"building",
         "roles"=>["admin.root", "admin.portfolio", "admin.callcenter", "admin.supervisor", "admin.admin", "admin.content"],
         "active"=>"/projects/index,/projects/save,/projects/view",
         "sub" => [
                ["name"=>"all", "url" => ["Projects", "index", ""]],
                // ["name"=>"create",  "url" => ["Projects", "save", ""]]
            ]
        ],
        // ["name"=>"proposals",
        //  "icon"=>"paper-plane-o",
        //  "roles"=>["admin.root", "admin.admin"],
        //  "active"=>"/proposals/index,/proposals/save,/proposals/view",
        //  "sub" => [
        //         ["name"=>"all", "url" => ["Proposals", "index", ""]],
        //         // ["name"=>"create",  "url" => ["Users", "save", ""]]
        //     ]
        // ],
        // ["name"=>"offices",
        //  "icon"=>"briefcase",
        //  "roles"=>["admin.root", "admin.admin"],
        //  "active"=>"/offices/index,/offices/view",
        //  "sub" => [
        //         ["name"=>"all", "url" => ["Offices", "index", ""]],
        //         // ["name"=>"create",  "url" => ["Offices", "save", ""]]
        //     ]
        // ],
        ["name"=>"developers",
         "icon"=>"cubes",
         "roles"=>["admin.root", "admin.admin", "admin.supervisor", "admin.portfolio"],
         "active"=>"/developers/index,/developers/view",
         "sub" => [
                ["name"=>"all", "url" => ["Developers", "index", ""]],
                // ["name"=>"create",  "url" => ["Developers", "save", ""]]
            ]
        ],
        // ["name"=>"sellers",
        //  "icon"=>"handshake-o",
        //  "roles"=>["admin.root", "admin.admin", "admin.supervisor"],
        //  "active"=>"/sellers/index,/sellers/view",
        //  "sub" => [
        //         ["name"=>"all", "url" => ["Sellers", "index", ""]],
        //         // ["name"=>"create",  "url" => ["Sellers", "save", ""]]
        //     ]
        // ],
        ["name"=>"users",
         "icon"=>"users",
         "roles"=>["admin.root", "admin.admin"],
         "active"=>"/users/index,/users/save,/users/view",
         "sub" => [
                ["name"=>"all", "url" => ["Users", "index", ""]],
                // ["name"=>"create",  "url" => ["Users", "save", ""]]
            ]
        ],
        // ["name"=>"messages",
        //  "icon"=>"comments",
        //  "roles"=>["admin.root"],
        //  "active"=>"/messages/index,/messages/view",
        //  "sub" => [
        //         ["name"=>"all", "url" => ["Messages", "index", ""]],
        //         // ["name"=>"create",  "url" => ["Messages", "save", ""]]
        //     ]
        // ],
        ["name"=>"logs",
         "icon"=>"database",
         "roles"=>["admin.root"],
         "active"=>"/logs/index,/logs/view",
         "sub" => [
                ["name"=>"all", "url" => ["Logs", "index", ""]],
                // ["name"=>"create",  "url" => ["Logs", "save", ""]]
            ]
        ],
        // ["name"=>"searchlogs",
        //  "icon"=>"search",
        //  "roles"=>["admin.root", "admin.admin"],
        //  "active"=>"/searchlogs/index,/searchlogs/view",
        //  "sub" => [
        //         ["name"=>"all", "url" => ["Searchlogs", "index", ""]],
        //         // ["name"=>"create",  "url" => ["Searchlogs", "save", ""]]
        //     ]
        // ],
        ["name"=>"categories",
        "icon"=>"list",
        "roles"=>["admin.root", "admin.portfolio", "admin.callcenter", "admin.supervisor", "admin.admin", "admin.content"],
        "active"=>"/categories/index,/categories/save,/categories/view",
        "sub" => [
                ["name"=>"All", "url" => ["Categories", "index", ""]],
                ["name"=>"TAGS_CATEGORIES", "url" => ["Categories", "index", "8"]],
                ["name"=>"COUNTRIES_CATEGORIES", "url" => ["Categories", "index", "7"]],
                ["name"=>"SPROJ_FEATURES", "url" => ["Categories", "index", "6"]],
                ["name"=>"PROJ_SPECS", "url" => ["Categories", "index", "5"]],
                ["name"=>"PROP_SPECS", "url" => ["Categories", "index", "4"]],
                ["name"=>"PROP_FEATURES", "url" => ["Categories", "index", "3"]],
                ["name"=>"PROP_SPECS", "url" => ["Categories", "index", "2"]],
                ["name"=>"PROP_CATEGORIES", "url" => ["Categories", "index", "1"]],
                ["name"=>"param-rooms", "url" => ["Categories", "index", "152"]],
                ["name"=>"param-unit-types", "url" => ["Categories", "index", "618"]]
           ]
       ],
        ["name"=>"configs",
         "icon"=>"cogs",
         "roles"=>["admin.root", "admin.admin"],
         "active"=>"/configs/index,/configs/view",
         "sub" => [
                ["name"=>"all", "url" => ["Configs", "index", ""]],
                // ["name"=>"create",  "url" => ["Searchlogs", "save", ""]]
            ]
        ],
    ];
    
    $urlparse = explode("/",str_replace('/'.$currlang, '', str_replace($app_folder, '', $_SERVER['REQUEST_URI'])));
    $urlparse[2] = empty($urlparse[2]) ? '' : $urlparse[2];
    $urlparse[3] = empty($urlparse[3]) ? '' : $urlparse[3];
    $urlparse[4] = empty($urlparse[4]) ? '' : '/'.$urlparse[4];
    // debug($urlparse);
?>

<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    
    <div class="menu_section">
        <ul class="nav side-menu">
            <?php 
                foreach($admin_menu as $itm){
                    if(!in_array($authUser["user_role"], $itm["roles"])){continue;}
                    $isActive = '';
                    if(strpos($itm["active"], '/'.$urlparse[2].'/'.$urlparse[3] ) !== false){
                        $isActive = 'active';
                    }
                    if(count($itm['sub']) == 1){
                ?>
                <li class="<?=$isActive?>">
                    <?=$this->Html->link(
                        '<i class="fa fa-'.$itm['icon'].'"></i> '.__($itm['name']), 
                        ['lang'=>$currlang, 'controller'=>$itm['sub'][0]["url"][0], 'action'=>$itm['sub'][0]["url"][1], $itm['sub'][0]["url"][2]],
                        ["escape"=>false]
                        )?>
                </li>

                <?php }else{ ?>

                <li class="<?=$isActive?>"><a><i class="fa fa-<?=$itm['icon']?>"></i> <?=__($itm['name'])?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="<?=!empty($isActive) ? 'display: block' : ''?>;">
                    <?php foreach($itm['sub'] as $subitm){ ?>
                        <li><?=$this->Html->link(__($subitm['name']), ['lang'=>$currlang, 'controller'=>$subitm["url"][0], 'action'=>$subitm["url"][1], $subitm["url"][2]])?></li>
                    <?php }?>
                    </ul>
                </li>

                <?php } ?>

            <?php } ?>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->