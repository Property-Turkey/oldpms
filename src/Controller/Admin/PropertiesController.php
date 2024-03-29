<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;


class PropertiesController extends AppController
{
    


    // private function fixImagesFormat( $data )
    // {
    //     foreach($data as &$rec){

    //         $imgs = explode( ',' , $rec["property_photos"] );
    //         $images = [];
    //         foreach($imgs as $img){
    //             $images[] = ["name"=>$img,"alt"=>"","desc"=>"","anchor_title"=>"","featured"=>0,"order"=>0];
    //         }
    //         $rec["property_photos"] = json_encode($images); 
            
    //     }
    //     return $data;
    // }

    private function genCategories( $_parentid = 0 , $_adrslist = 'adrs_city' )
    {
        $indent=100;
        $dt = [];

        $cities = $this->Properties->find('all', [
            "order"=>[ $_adrslist => "DESC" ],
            "fields"=>["count"=>"COUNT(*)", "name"=>$_adrslist],
            "conditions"=>[],
        ])->distinct([$_adrslist])->all()->toList();
        
        foreach($cities as $k=>$city){

            $dt[] = [
                'id'=>$k+$indent,
                'category_name'=>$city['name'], 
                'category_params'=>' {"icon":"", "link":"", "isProtected":"0", "":"'.$city['count'].'"} ',
                'parent_id' => $_parentid
            ];

            $regions = $this->Properties->find('all', [
                "order"=>[ "adrs_region" => "DESC" ],
                "fields"=>["count"=>"COUNT(*)", "name"=>"adrs_region"],
                "conditions"=>['adrs_city'=>$city['name']],
            ])->distinct(["adrs_region"])->all()->toList();
debug( $regions );

            foreach($regions as $k2=>$region){

                $dt[] = [
                    'id'=>count($cities)+$k2+$indent,
                    'category_name'=>$region['name'], 
                    'category_params'=>' {"icon":"", "link":"", "isProtected":"0", "":"'.$region['count'].'"} ',
                    'parent_id' => $k
                ];
                dd($region);

                $districts = $this->Properties->find('all', [
                    "order"=>[ "adrs_district" => "DESC" ],
                    "fields"=>["count"=>"COUNT(*)", "name"=>"adrs_district"],
                    "conditions"=>['adrs_city'=>$city['name'], 'adrs_region'=>$region['name']],
                ])->distinct(["adrs_district"])->all()->toList();

                
                foreach($districts as $k3=>$district){

                    $dt[] = [
                        'id'=>count($cities)+count($regions)+$k3+$indent,
                        'category_name'=>$region['name'], 
                        'category_params'=>' {"icon":"", "link":"", "isProtected":"0", "":"'.$district['count'].'"} ',
                        'parent_id' => $k2
                    ];
                }
            }

        }
        dd($dt);
    }
    
    
    public function index( )
    {
        if($this->request->getQuery('genCategories') == 1){
            $this->genCategories(  );
        }
        // if($this->request->getQuery('fixImagesFormat') == 1){
        //     // fixing photos format
        //     $data = $this->Properties->find('all')
        //         ->select(['id', 'property_photos'])
        //         ->where(['property_photos NOT LIKE '=>'[%', 'property_photos != '=>null, 'property_photos != '=>''])
        //         ->toArray();
        //     $fixedData = $this->fixImagesFormat( $data );

        //     $doSave = $this->Properties->saveMany($fixedData);
        //     debug( $doSave );
        //     dd( $fixedData );
        // }
        

        $contentManagers = $this->Properties->Users->find('list', [
            'conditions' => ['user_role'=>'admin.content', 'rec_state'=>1]
        ])->toArray();

        $this->set(compact('contentManagers'));

        if ($this->request->is('post')) {

            $this->autoRender = false;

            $conditions = [ ];

            // Filters and Search
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';
            $_outdated = (isset($_GET['stat_updated']) && strlen($_GET['stat_updated'])>0) ? $_GET['stat_updated'] : '';

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k'])>0) ? $_GET['k'] : false;
            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';

            $_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    
            if( !empty($_from) ){ $conditions['Properties.stat_created > '] = $_from; }
            if( !empty($_to) ){ $conditions['Properties.stat_created < '] = $_to; }
            if( $_outdated==='0' ){ $conditions['Properties.stat_updated < '] = date("Y-m-d H:i:s", strtotime("-1 months")); }

            if($_k !== false){
                $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Properties.'.$_col] = $_k;
            }
            
            $data=[];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');
            $_adrslist = $this->request->getQuery('adrslist');
            $_cats = $this->request->getQuery('cats');
            // $_seller_cat = $this->request->getQuery('seller_cat');

            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Properties->get( $_id, [
                    'contain'=>[
                        'Users'=>['fields'=>['Users.id', 'Users.user_fullname', 'Users.user_configs']], 
                        // 'Users.Offices'=>['fields'=>['Offices.id', 'Offices.office_name']], 
                        'Projects'=>['fields'=>['Projects.id', 'Projects.project_title', 'Projects.project_videos', 'Projects.project_ref', 'Projects.features_ids', 'Projects.project_photos', 'Projects.project_desc']], 
                        // 'Projects.Floorplans',
                        // 'Sellers'=>['fields'=>['Sellers.id', 'Sellers.seller_name', 'Sellers.seller_type', 'Sellers.seller_configs']], 
                        'Developers'=>['fields'=>['Developers.id', 'Developers.dev_name', 'Developers.dev_configs']], 
                        // 'Histories', 
                        // 'Proposals'=>['conditions'=>['rec_state'=>1, 'user_id'=>$this->authUser['id']]], 
                        // 'Docs'=>['conditions'=>['rec_state'=>1, 'doc_allowed_roles LIKE '=>'%'.$this->authUser['user_role'].'%']],
                    ]
                ] )->toArray();
                // generate encrypted link for offers
                // foreach($data['proposals'] as &$proposal){
                //     $proposal['proposal_link'] = base64_encode( $this->Do->get('salt').$_id );
                // }
                $features=null;
                if(!empty($data['features_ids'])){
                    foreach(explode(',', $data['features_ids']) as $feature){
                        if(empty($feature)){continue ;}
                        $features[$feature]=true;
                    }
                }

                // $usps=[];
                // if(!empty($data['property_usp'])){
                //     foreach(explode(',', $data['property_usp']) as $usp){
                //         if(empty($usp)){continue ;}
                //         $usps[$usp]=true;
                //     }
                // }
                foreach($data as $k=>$param){
                    if(strpos( $k , 'param_') !== false){ $data[$k] =  $param.""; }
                }
                
                $data['features_ids'] = $features;
                // photos for slider
                if(!empty( $data['property_photos'] )){
                    $data['property_photos_names'] = array_values(array_column( json_decode( $data['property_photos'] , true) , 'name'));
                }
                
                $developers = $this->Properties->Developers->find('list')->where(['rec_state'=>1])->toArray();
                // $sellers = $this->Properties->Sellers->find('list')->where(['rec_state'=>1])->toArray();
                $projects = $this->Properties->Projects->find('list')->where(['rec_state'=>1])->toArray();

                echo json_encode( 
                    [ "status"=>"SUCCESS",  
                        "data"=>$this->Do->convertJson( $data ),
                        "developers_list"=>$developers, 
                        // "sellers_list"=>$sellers, 
                        "projects_list"=>$projects
                    ], 
                    JSON_UNESCAPED_UNICODE); die();
            }


            // SELLER CATEGORIES
            // if(!empty($_seller_cat)){
            //     if(($_seller_cat*1) < 1){return '';}
            //     // $sellers = $this->Properties->Sellers->find('list')->where(['rec_state'=>1, 'seller_type'=>$_seller_cat])->toArray();
                
            //     echo json_encode( 
            //         [ "status"=>"SUCCESS", "data"=>[], "sellers_list"=>$sellers, 
            //             "projects_list"=>empty($projects) ? [] : $projects, ], 
            //         JSON_UNESCAPED_UNICODE); die();
            // }
            
            // CATEGORIES FOR NEW RECORD
            if(!empty($_cats)){
                $developers = $this->Properties->Developers->find('list')->where(['rec_state'=>1])->toArray();
                // $sellers = $this->Properties->Sellers->find('list')->where(['rec_state'=>1])->toArray();
                $projects = $this->Properties->Projects->find('list')->where(['rec_state'=>1])->toArray();
                
                echo json_encode( 
                    [ "status"=>"SUCCESS",  
                        "data"=>[],
                        "developers_list"=>$developers,
                        "projects_list"=>$projects], 
                    JSON_UNESCAPED_UNICODE); die();
            }

            // LIST
            if(!empty($_list)){ 
                
                $conditions['Properties.language_id'] = $this->currlangid;
                $queryParams = $this->getRequest()->getQueryParams();
                $queryParams['page'] = $_page;
                $this->setRequest($this->getRequest()->withQueryParams($queryParams));

                if($this->authUser['user_role'] == 'admin.callcenter'){
                    $conditions['Properties.rec_state > '] = 0;
                }
                if($this->authUser['user_role'] == 'admin.content'){
                    // $conditions['UserProperty.user_id'] = $this->authUser['id'];
                }
                
                // list of projects for select menu in edit modal
                $projects = $this->Properties->Projects->find('list')->where(['rec_state'=>1])->toArray();
                $data = $this->Do->convertJson( $this->paginate($this->Properties, [
                    "order"=>[ $_col => $_dir ],
                    "contain"=>["Projects", "Users"],
                    "fields"=>[
                        "Projects.project_title", "Users.user_fullname", 
                        "Properties.id", "Properties.param_isresidence", "user_id", "property_title", "property_price",
                        "property_currency", "adrs_country", "adrs_city", "adrs_region", 
                        "adrs_district", "param_iscitizenship", "property_usp", "property_photos", 
                        "param_isresale", "param_floor", "param_floors", "param_rooms", "param_netspace", 
                        "param_grossspace", "stat_updated", "rec_state",
                        // "UserProperty.id", "UserProperty.rec_state", 
                    ],
                    "conditions"=>$conditions,
                ]));
            }

            // ADDRESS LIST
            if(isset($_adrslist)){

                $dt = json_decode( file_get_contents('php://input'), true);
                $adrs = ['adrs_country', 'adrs_city', 'adrs_region', 'adrs_district'];
                $cond=[];
                
                if( !empty( $dt['adrs_country'] ) ){ $cond['adrs_country LIKE'] = "%".$dt['adrs_country']."%"; }
                if( !empty( $dt['adrs_city'] ) ){ $cond['adrs_city LIKE'] = "%".$dt['adrs_city']."%"; }
                if( !empty( $dt['adrs_region'] ) ){ $cond['adrs_region LIKE'] = "%".$dt['adrs_region']."%"; }
                if( !empty( $dt['adrs_district'] ) ){ $cond['adrs_district LIKE'] = "%".$dt['adrs_district']."%"; }

                $data = $this->Properties->find('all', [
                    "order"=>[ $_adrslist => "DESC" ],
                    "fields"=>["Properties.id", "Properties.".$_adrslist],
                    "conditions"=>$cond,
                ])->distinct([$_adrslist])->all()->toList();
                echo json_encode( [ "status"=>"SUCCESS",  "data"=>$data, "debug"=>$cond, 
                    "projects_list"=>empty($projects) ? [] : $projects, ], JSON_UNESCAPED_UNICODE); die();
            }

            echo json_encode( 
                [ 
                    "status"=>"SUCCESS",  
                    "data"=>$data, 
                    "projects_list"=>empty($projects) ? [] : $projects, 
                    // "paging"=>$this->Paginator->getPagingParams()["Properties"]
                    "paging" => $this->request->getAttribute('paging')['Properties'],

                ], 
                JSON_UNESCAPED_UNICODE); die();
        }

    }

    public function view($id = null)
    {
        $rec = $this->Properties->get($id);
        $this->set(compact('rec'));
    }

    public function search()
    {
        $this->request->allowMethod(['post']);
        $dt = json_decode( file_get_contents('php://input'), true);
        
        $oldSearch = empty($_SESSION['oldSearch']) ? '' : json_encode($_SESSION['oldSearch'], JSON_UNESCAPED_UNICODE);
        $_SESSION['oldSearch'] = $dt;

        $between = ['property_price', 'param_monthlytax', 'param_deposit', 'param_grossspace', 'param_netspace'];
        $notSearchable = ['user_id', 'order', 'page', 'col', 'direction', 'from', 'to', 'old', 'property_currency', 'project_currency'];
        $fields=[
            "Users.user_fullname",
            "Properties.id", "Properties.param_isresidence", "user_id", "property_title", "property_price", 
            "property_currency", "adrs_country", "adrs_city", "adrs_region", 
            "adrs_district", "param_iscitizenship", "property_usp", "property_photos", 
            "param_isresale", "param_floor", "param_floors", "param_rooms", "param_netspace", 
            "param_grossspace", "stat_updated", "rec_state"
        ];

        $conditions=[];
        $conditions['language_id'] = $this->currlangid;
        
        $searchlogs=[];
        
        // Filter params
        $_from = !empty($_GET['from']) ? $_GET['from'] : '';
        $_to = !empty($_GET['to']) ? $_GET['to'] : '';
        
        $_col = !empty($dt['col']) ? $dt['col'] : 'id';
        $_dir = !empty($dt['direction']) ? $dt['direction'] : 'DESC';
        $_page = !empty($dt['page']) ? $dt['page'] : 1;
        $_dont_log = isset($dt['dont_log']) ? true : false;

        $settings = [
            'order'=>[ 'Properties.'.$_col => $_dir ],
            "page"=>$_page,
            "fields"=>$fields,
            "conditions"=>$conditions,
            "contain"=>["Users"],
        ];

        if( !empty($_from) ){ $settings['conditions']['Properties.stat_created > '] = $_from; }
        if( !empty($_to) ){ $settings['conditions']['Properties.stat_created < '] = $_to; }
        
        if(!empty($dt['user_id'])){
            // get my office Properties
            if($this->authUser['user_role'] == 'admin.supervisor'){
                $users_office = $this->getTableLocator()->get('Users')->find('list', [
                    'conditions'=>['office_id'=>$this->authUser['office_id']],
                ]);
                $settings['conditions']['Properties.user_id IN '] = array_keys($users_office->toArray());
            // get my own Properties
            }else{
                $settings['conditions']['Properties.user_id'] = $this->authUser['id'];
            }
        }

        foreach($dt as $col=>$val){
            // if(strpos($oldSearch, $val) !== false){ continue; }
            if( isset($val) && !in_array($col, $notSearchable) ){
                
                // allow value zero and escape from empty values
                if(empty($val) && $val !== '0'){ continue; }

                // CREATE LOG SEARCH OBJECT
                $val_arr = !is_array($val) ? [$val] : $val;
                if(in_array($col, $between)){
                    $val_arr = [implode(',',$val)];
                }
                
                foreach($val_arr as $k=>$v){
                    // PREVENT DOUBLECATION 
                    if(in_array( $col, ['features_ids'])){//, 'property_usp'
                        if( !$v ){ continue; }
                        if( strpos($oldSearch,  '"'.$k.'":true') !== false){ continue; }
                    }else{
                        if( strpos($oldSearch, $v.'') !== false){ continue; }
                    }
                    // $searchlogs[] = [
                    //     'search_group' => $col, 
                    //     'search_val'   => in_array( $col, ['features_ids']) ? $k : $v,//, 'property_usp'
                    //     'search_ctrl'  => $this->request->getParam('controller') == 'Properties' ? 1 : 2
                    // ];
                }

                // KEYWORDS search
                if($col == 'keyword' ){
                    $settings['conditions']['OR']['Properties.property_title LIKE'] = "%".$val."%";
                }
                
                // BETWEEN search
                if(is_array($val) && in_array($col, $between)){

                    // make sure tow range values exist
                    if(empty($val[0])){ $val[0] = 0; }
                    if(empty($val[1])){ $val = [0, $val[0]]; }

                    if(($val[0]+$val[1]) > 0){ 
                        // convert values if they are from small to big to smaller to bigger range
                        if($val[0] > $val[1]){
                            $val = array_reverse($val);
                        }
                        
                        // PRICE search
                        if($col == 'property_price'){
                            $currencies = $this->Do->get('currencies');
                            foreach($currencies as $k=>$currency){
                                $settings['conditions']['OR'][] = [
                                    'Properties.property_price >= ' => $this->Do->currencyConverter( $currencies[ $dt['property_currency'] ], $currency, $val[0]),
                                    'Properties.property_price <= ' => $this->Do->currencyConverter( $currencies[ $dt['property_currency'] ], $currency, $val[1]),
                                    'Properties.property_currency' => $k
                                ];
                            }
                        }else{
                            if($val[1] != null){
                                $settings['conditions']['Properties.'.$col.' >= '] = $val[0];
                                $settings['conditions']['Properties.'.$col.' <= '] = $val[1];
                            }else{
                                $settings['conditions']['Properties.'.$col.' <= '] = $val[0];
                            }
                        }
                    }
                }

                // PARAMS, ADDRESSS and other direct search
                if( !in_array($col, $between) && !in_array($col, ['features_ids', 'keyword']) ){//, 'property_usp'
                    if(is_array($val)){
                        foreach( $val as $k2=>$v2){
                            if(!$v2){ continue; }
                            $settings['conditions']['AND']['OR'][] = ['Properties.'.$col=>$v2];
                        }
                    }else{
                        if($col == 'stat_updated'){
                            $settings['conditions']['Properties.'.$col.($val==1 ? ' > ' : ' < ')] = $this->outdatedContent;
                        }else{
                            $settings['conditions']['Properties.'.$col] = $val;
                        }
                    }
                }

                // FEATURES, PROPERTY_USP IDS search
                if(in_array($col, ['features_ids']) ){//, 'property_usp'
                    foreach( $val as $k=>$v){
                        if(!$v){ continue; }
                        $settings['conditions']['AND'][] = ['Properties.'.$col.' LIKE' => "%,".$k.",%"];
                    }
                }
            }
        }

        $data = $this->paginate( $this->Properties, $settings );

        // KEYWORDS Search in another fields if no result found
        if(!empty($dt['keyword'])){
            // search in property_desc
            if(empty($data->toArray())){
                $settings['conditions']['OR']['property_desc LIKE'] = "%".$dt['keyword']."%";
                $data = $this->paginate( $this->Properties, $settings );
            }
            // search in seo_keywords
            if(empty($data->toArray())){
                $settings['conditions']['OR']['seo_keywords LIKE'] = "%".$dt['keyword']."%";
                $data = $this->paginate( $this->Properties, $settings );
            }
            // search in property_usp
            if(empty($data->toArray())){
                $settings['conditions']['OR']['property_usp LIKE'] = "%".$dt['keyword']."%";
                $data = $this->paginate( $this->Properties, $settings );
            }
            // soundex search for similar words
            if(empty($data->toArray())){
                $all = $this->Properties->find('all', ['fields'=>['property_title']]);
                $soundex_dt = [];
                foreach($all as $itm){
                    if(soundex($itm->property_title) == soundex($dt['keyword'])){
                        $soundex_dt[] = $itm;
                    }
                }
                $data = $soundex_dt;
            }
        }
        // // SAVE Searchlogs
        // if(!empty($searchlogs) && !$_dont_log ){
        //     $this->Do->adder($searchlogs, 'Searchlogs');
        // }
        
        echo json_encode( 
            [ 
                "status"=>"SUCCESS",  
                "data"=>$this->Do->convertJson( $data ),  
                // "paging"=>$this->Paginator->getPagingParams()["Properties"]
                "paging" => $this->request->getAttribute('paging')['Properties'],

            ], 
            JSON_UNESCAPED_UNICODE); die();
        
    }


    public function save($id = -1) 
    {
        
        $dt = json_decode( file_get_contents('php://input'), true);

        unset($dt['project']);
        unset($dt['developer']);
        unset($dt['user']);
        // unset($dt['seller']);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Properties->get($dt['id']);
            if(!$this->_isAuthorized(true, 'update') && $rec->user_id != $this->authUser['id']){
                echo json_encode([
                    "status"=>"FAIL", "data"=>[], "msg"=>__('you_not_authorized'),
                    "redirect"=>$this->app_folder."/admin/properties/"]); die();
            }
        }

        // add mode
        if ($this->request->is(['post'])) {
            
            $rec = $this->Properties->newEmptyEntity();
            $dt['id'] = null;
            $dt['stat_updated'] = date('Y-m-d H:i:s');
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['user_id'] = $this->authUser['id'];
            $dt['language_id'] = empty($dt['language_id']) ? $this->currlang : $dt['language_id'];
            
            $last_id = $this->Do->get_last_rec_number('properties');
            $dt['property_ref'] = 'PTP'.$last_id.'UID'.$this->authUser['id'];

        }
        
        if ($this->request->is(['post', 'patch', 'put'])) {
            
            $this->autoRender  = false;
            // Upload photos
            if(!empty($dt['img'])){
                $fname = time();
                $thumb_params = [
                    ['doThumb'=>true, 'w'=>350, 'h'=>350, 'dst'=>'thumb']
                ];
                foreach( $dt['img'] as $k=>$img){
                    $this->Images->uploader('img/properties_photos', $img, $fname.$k, $thumb_params, 0, true);
                }
                
                foreach( explode(",", $this->Images->getPhotosNames()) as $k=>$imgName){
                    $dt['property_photos'][] = [
                        "name"=>$imgName, "alt"=>$dt["img"][$k]["alt"], 
                        "desc"=>$dt["img"][$k]["desc"],
                        "anchor_title"=>$dt["img"][$k]["anchor_title"],
                        "featured"=>$dt["img"][$k]["featured"],
                        "order"=>$dt["img"][$k]["order"]
                    ];
                }
                $dt['property_photos'] = json_encode($dt['property_photos'] , JSON_UNESCAPED_UNICODE );
            }else{
                unset($dt['property_photos']);
            }
            
            // debug( $dt['property_photos'] );
            $dt['seo_keywords'] = !empty($dt['seo_keywords']) ? implode(',', $dt['seo_keywords'] ) : null;
            $dt['property_videos'] = !empty($dt['property_videos']) ? implode(',', $dt['property_videos'] ) : null;
            $dt['property_usp'] = !empty($dt['property_usp']) ? implode(',', $dt['property_usp'] ) : null;
            $dt['features_ids'] = !empty( $dt['features_ids'] ) ? ','.implode(',', array_keys( array_filter( $dt['features_ids'] ) ) ).',' : null;
            $dt['property_price'] = !empty($dt['property_price']) ? str_replace(['.',','], ['',''], $dt['property_price'].'') : '';
            $dt['property_oldprice'] = !empty($dt['property_oldprice']) ? str_replace(['.',','], ['',''], $dt['property_oldprice'].'') : '';
            
            // unset($dt['floorplans']);
            // dd( $dt['property_photos'] );
            
            $rec = $this->Properties->patchEntity($rec, $dt);
            
            if ($newRec = $this->Properties->save($rec)) {
                
                // send notification to admin system by new added contents
                if ($this->request->is(['post'])) {
                    $sys_admins = $this->getTableLocator()->get('Users')->find('list', [
                        'conditions'=>['user_role'=>'admin.admin'],
                        'fields'=>['user_fullname'=>'Users.email', 'id'=>'Users.id']
                    ])->toList();
                    $dt['userInfo'] = $this->authUser;
                    $dt['ctrl'] = 'property';
                    $dt['controller'] = 'Properties';
                    $dt['lang'] = $this->currlang;
                    $dt['id'] = $newRec['id'];
                    $this->Do->sendEmail($sys_admins, __('new_property_added'), $dt, 'new_content_tm');
                }

                echo json_encode([
                    "status"=>"SUCCESS", "data"=> $this->Do->convertJson( $newRec ), 
                    "redirect"=>$this->request->is(['post']) ? $this->app_folder."/admin/properties/wizard/".$newRec->id."?step=1" : false]); die();
            }

            echo json_encode(["status"=>"FAIL", "data"=>$rec->getErrors()]); die();
        }
    }

    public function wizard($id = -1) 
    {
        if($id > -1){
            $rec = $this->Properties->get($id, ['fields'=>['id', 'user_id']]);
            if(!$this->_isAuthorized(true, 'update') && $rec->user_id != $this->authUser['id']){
                return $this->redirect(['controller'=>'Properties', 'action'=>'index']);
            }
        }
        return $this->save($id);
    }

	public function delimage() 
    {
        $this->request->allowMethod(['delete']);
        $ctrl = $this->request->getParam('controller');
        $this->autoRender  = false;
        $dt = json_decode( file_get_contents('php://input'), true);

		if( $this->Images->deleteFile('img/'.strtolower( $ctrl ).'_photos', $dt['image'])){
            $rec = $this->$ctrl->get($dt['id']);
            
            $imgsArray = json_decode( $rec->property_photos, true ) ;

            $key = array_search($dt['image'], array_column( array_values( $imgsArray ), "name"));
			unset($imgsArray[$key]);

			$update = ["id"=>$dt['id'], "property_photos"=>json_encode( array_values( $imgsArray ), JSON_UNESCAPED_UNICODE )];
        	$updated_rec = $this->$ctrl->patchEntity($rec, $update);

            // dd($updated_rec);

			$saved = $this->$ctrl->save($updated_rec);
            echo json_encode(["status"=>"SUCCESS", "data"=>$saved]);  die();
		}else{
            echo json_encode(["status"=>"FAIL", "data"=>$dt]); die();
		}
	}

    public function delete($id = null)
    {
        if(!$id){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("is-selected-empty-msg"), "data"=>[]] ); die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender  = false;

        if(!$this->_isAuthorized(true)){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("no-auth"), "data"=>[]] ); die();
        }

        $delRec=[];
        foreach(explode(",", $id."") as $k=>$rec_id){
            $rec = $this->Properties->get($rec_id, ['contain'=>['Docs']]);
            
            if( $delRec[$k] = $this->Properties->delete($rec) ){
                $rec = $rec->toArray();
                if(!empty($rec['docs'])){
                    $files = array_values( array_column( ( $rec['docs'] ), "doc_name" ));
                    $this->Images->deleteFile('file/properties_files', $files);
                }
                if(!empty($rec['property_photos'])){
                    $imgs = array_values( array_column( json_decode( $rec['property_photos'] ), "name" ));
                    $this->Images->deleteFile('img/properties_photos', $imgs);
                }
                
            }
        }
        
        $res = (!empty(array_filter($delRec))) ? ["status"=>"SUCCESS", "data"=>$delRec] : ["status"=>"FAIL", "data"=>$delRec];

        echo json_encode($res);die();
    }
    
    public function assign($to=null, $ids=null)
    {
        if(!$ids || !$to){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("is-selected-empty-msg"), "data"=>[]] ); die();
        }

        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender  = false;

        if(!$this->_isAuthorized(true)){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("no-auth"), "data"=>[]] ); die();
        }
        $dt = [];

        // $isExistIds = $this->Properties->UserProperty->find('list', [
        //     'consditions'=>['property_id IN'=>$ids], 'keyField'=>'id', 'valueField'=>'property_id'
        // ])->toArray();
        
        foreach(explode(',', $ids) as $k=>$id){
            
            // set exist records to published
            if($to=='publish'){
                // $dt[$k] = $this->Properties->UserProperty->newEmptyEntity();
                $dt[$k] = ['id'=>$id, 'rec_state'=>2];

            // create new assignment
            }else{
                // if(in_array($id, $isExistIds)){ continue; }
                $dt[] = ['property_id'=>$id, 'user_id'=>$to, 'stat_created'=>date('Y-m-d H:i:s'), 'rec_state'=>1];
            }
        }
        
        if(empty($dt)){
            echo json_encode( ["status"=>"SUCCESS", "data"=>[], 'msg'=>__('assign_already_assigned')] ); die();
        }

        // if($to=='publish'){
        //     $dt = $this->Properties->UserProperty->patchEntities( $isExistIds, $dt );
        // }else{
        //     $dt = $this->Properties->UserProperty->newEntities( $dt );
        // }

        // if( $updateRec = $this->Properties->UserProperty->saveMany( $dt ) ){
        //     echo json_encode( ["status"=>"SUCCESS", "data"=>$updateRec] );die();
        // }else{
        //     echo json_encode( ["status"=>"FAIL", "data"=>$updateRec] );die();
        // }
        
    }

    public function enable($val=1, $ids=null)
    {
        if(!$ids){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("is-selected-empty-msg"), "data"=>[]] ); die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender  = false;

        if(!$this->_isAuthorized(true)){
            echo json_encode( ["status"=>"FAIL", "msg"=>__("no-auth"), "data"=>[]] ); die();
        }

        $updateRec=[];
        foreach(explode(',', $ids) as $k=>$id){
            $rec = $this->Properties->newEmptyEntity();
            $rec['id'] = $id;
            $rec['rec_state'] = $val;
            $updateRec[$k] = $this->Properties->save($rec);
        }
        
        $res = (!empty(array_filter($updateRec))) ? ["status"=>"SUCCESS", "data"=>$updateRec] : ["status"=>"FAIL", "data"=>$updateRec];

        echo json_encode($res);die();
    }
    
    function beforeFilter(EventInterface $event) 
    {
        parent::beforeFilter($event);
        
        if ($this->request->is(['post', 'patch', 'put', 'delete'])) {
            if(!$this->_isAuthorized(true, 'read')){
                echo json_encode(["status" => "FAIL", "redirect" => $this->app_folder.'/?login=1']); die();
            }
        }
    }


}
