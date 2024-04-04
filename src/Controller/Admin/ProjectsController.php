<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;


class ProjectsController extends AppController
{
    
    public function index( )
    {

        $developers = $this->Projects->Developers->find('list', [
            'conditions' => ['rec_state'=>1],
            'order' => ['dev_name' => 'ASC']
        ]);
        // $sellers = $this->Projects->Sellers->find('list', [
        //     'conditions' => ['rec_state'=>1]
        // ])->toArray();
        $contentManagers = $this->Projects->Users->find('list', [
            'conditions' => ['user_role'=>'admin.content', 'rec_state'=>1]
        ])->toArray();

        $this->set(compact('developers', 'contentManagers'));

        if ($this->request->is('post')) {

            $this->autoRender = false;

            $conditions = [ ];

            // Filters and Search
            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k'])>0) ? $_GET['k'] : false;
            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';
            
            $_page = !empty($_GET['page']) ? $_GET['page'] : 1;
            
            if( !empty($_from) ){ $conditions['Projects.stat_created > '] = $_from; }
            if( !empty($_to) ){ $conditions['Projects.stat_created < '] = $_to; }
            if($_k !== false){
                $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Projects.'.$_col] = $_k;
            }
            
            $data=[];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');
            $_adrslist = $this->request->getQuery('adrslist');
            
            // ONE RECORD
            if(!empty($_id)){

                $data = $this->Projects->get( $_id, [
                    "contain"=>[
                        "Properties"=>["fields"=>[
                            "Properties.id", "project_id", "property_title", "property_photos", 
                            "property_price", "property_currency", "adrs_city", "adrs_region", "adrs_district"]
                        ],
                        // "Proposals"=>['conditions'=>['rec_state'=>1, 'user_id'=>$this->authUser['id']]], 
                        // 'Docs'=>['conditions'=>['rec_state'=>1, 'doc_allowed_roles LIKE '=>'%'.$this->authUser['user_role'].'%']],
                    ]
                ] )->toArray();
                $features=null;
                if(!empty($data['features_ids'])){
                    foreach(explode(',', $data['features_ids']) as $feature){
                        if(empty($feature)){continue ;}
                        $features[$feature]=true;
                    }
                }

                foreach($data as $k=>$param){
                    if(strpos( $k , 'param_') !== false && $k != 'param_deliverdate'){ $data[$k] =  $param.""; }
                }
                
                $data['features_ids'] = $features;
                
                // $developers = $this->Projects->Developers->find('all', [
                //     'conditions' => ['rec_state'=>1],
                //     'fields' => ['id', 'dev_name'],
                //     'order' => ['dev_name' => 'ASC']
                // ])->toArray();
                // $this->set('developers', $developers);
                // usort($developers, function($a, $b) {
                //     if($a==$b) return 0;
                //     return $a > $b?1:-1;
                // });
                
                echo json_encode( 
                    [ "status"=>"SUCCESS",  
                        // "developers_list"=>$developers, 
                        // "sellers_list"=>$sellers, 
                        "data"=>$this->Do->convertJson( $data ) ], 
                    JSON_UNESCAPED_UNICODE); die();
            }
            // LIST
            // if(!empty($_list)){ 

            //     $queryParams = $this->getRequest()->getQueryParams();
            //     $queryParams['page'] = $_page;
            //     $this->setRequest($this->getRequest()->withQueryParams($queryParams));

            //     if($this->authUser['user_role'] == 'admin.callcenter'){
            //         $conditions['Projects.rec_state > '] = 0;
            //     }
            //     if($this->authUser['user_role'] == 'admin.content'){
            //         // $conditions['UserProject.user_id'] = $this->authUser['id'];
            //     }
            //     $data = $this->paginate($this->Projects, [                  
            //         "order"=>[ 'Projects.'.$_col => $_dir ],
            //         "contain"=>["Users"],
            //         "fields"=>[
            //             "Projects.id", "Projects.user_id", "project_title", "param_space", "param_totalunits",
            //             "adrs_country", "adrs_city", "adrs_region", "adrs_district", "Projects.rec_state", "Projects.stat_updated",
            //             "Users.user_fullname",],
            //         "conditions"=>$conditions
            //     ]);
            // }

            // LIST
            if(!empty($_list)){ 
                
                $conditions['Projects.language_id'] = $this->currlangid;
                $queryParams = $this->getRequest()->getQueryParams();
                $queryParams['page'] = $_page;
                $this->setRequest($this->getRequest()->withQueryParams($queryParams));

                if($this->authUser['user_role'] == 'admin.callcenter'){
                    $conditions['Projects.rec_state > '] = 0;
                }
                if($this->authUser['user_role'] == 'admin.content'){
                    // $conditions['UserProperty.user_id'] = $this->authUser['id'];
                }
                
                // list of projects for select menu in edit modal
                $properties = $this->Projects->Properties->find('list')->where(['rec_state'=>1])->toArray();
                $data = $this->Do->convertJson( $this->paginate($this->Properties, [
                    "order"=>['Projects.'.$_col => $_dir],   
                    "contain"=>["Properties", "Users"],
                    "fields"=>[
                        "id", "user_id", "project_title", "param_space", "param_totalunits",
                        "adrs_country", "adrs_city", "adrs_region", "adrs_district", "rec_state", "stat_updated",
                        "Users.user_fullname"
                        // "UserProperty.id", "UserProperty.rec_state", 
                    ],
                    "conditions"=>$conditions,
                ]));
            
            }

            // // ADDRESS LIST
            // if(isset($_adrslist)){
            //     $dt = json_decode( file_get_contents('php://input'), true);
            //     $adrs = ['adrs_country', 'adrs_city', 'adrs_region', 'adrs_district'];
            //     $cond=[];
                
            //     if( !empty( $dt['adrs_country'] ) ){ $cond['adrs_country LIKE'] = "%".$dt['adrs_country']."%"; }
            //     if( !empty( $dt['adrs_city'] ) ){ $cond['adrs_city LIKE'] = "%".$dt['adrs_city']."%"; }
            //     if( !empty( $dt['adrs_region'] ) ){ $cond['adrs_region LIKE'] = "%".$dt['adrs_region']."%"; }
            //     if( !empty( $dt['adrs_district'] ) ){ $cond['adrs_district LIKE'] = "%".$dt['adrs_district']."%"; }
                
            //     $data = $this->Projects->find('all', [
            //         "order"=>[ $_adrslist => "DESC" ],
            //         "fields"=>["Projects.id", "Projects.".$_adrslist],
            //         "conditions"=>$cond,
            //     ])->distinct([$_adrslist])->all()->toList();
            //     echo json_encode( [ "status"=>"SUCCESS",  "data"=>$data, "debug"=>$cond ], JSON_UNESCAPED_UNICODE); die();
            // }
            // ADDRESS LIST
            if(isset($_adrslist)){

                $dt = json_decode( file_get_contents('php://input'), true);
                $adrs = ['adrs_country', 'adrs_city', 'adrs_region', 'adrs_district'];
                $cond=[];
                
                if( !empty( $dt['adrs_country'] ) ){ $cond['adrs_country LIKE'] = "%".$dt['adrs_country']."%"; }
                if( !empty( $dt['adrs_city'] ) ){ $cond['adrs_city LIKE'] = "%".$dt['adrs_city']."%"; }
                if( !empty( $dt['adrs_region'] ) ){ $cond['adrs_region LIKE'] = "%".$dt['adrs_region']."%"; }
                if( !empty( $dt['adrs_district'] ) ){ $cond['adrs_district LIKE'] = "%".$dt['adrs_district']."%"; }

                $data = $this->Projects->find('all', [
                    "order"=>[ $_adrslist => "DESC" ],
                    "fields"=>["Projects.id", "Projects.".$_adrslist],
                    "conditions"=>$cond,
                ])->distinct([$_adrslist])->all()->toList();
                echo json_encode( [ "status"=>"SUCCESS",  "data"=>$data, "debug"=>$cond, 
                    "projects_list"=>empty($properties) ? [] : $properties, ], JSON_UNESCAPED_UNICODE); die();
            }

            echo json_encode( 
                [ 
                    "status"=>"SUCCESS",  
                    "data"=> $this->Do->convertJson( $data ), 
                    // "paging"=>$this->Paginator->getPagingParams()["Projects"],
                    "paging" => $this->request->getAttribute('paging')['Projects'],

                    "debug"=>    ([$_col=>$_dir])
                ], 
                JSON_UNESCAPED_UNICODE); die();
        }

    }

    public function view($id = null)
    {
        $rec = $this->Projects->get($id);
        $rec->param_deliverdate = !empty($rec->param_deliverdate) ? $rec->param_deliverdate->format("Y-m-d") : null;
        $this->set(compact('rec'));
    }

    public function search()
    {
        $this->request->allowMethod(['post']);
        $dt = json_decode( file_get_contents('php://input'), true);
        
        $oldSearch = empty($_SESSION['oldSearch']) ? '' : json_encode($_SESSION['oldSearch'], JSON_UNESCAPED_UNICODE);
        $_SESSION['oldSearch'] = $dt;
        $between = ['param_downpayment', 'param_installment', 'param_installment_months', 'param_space', 'param_totalunits', 'param_units_size_range', 'param_commercial_units', 'param_residential_units', 'param_blocks', 'param_bldfloors' ];
        $notSearchable = ['user_id', 'property_price', 'order', 'page', 'col', 'direction', 'from', 'to', 'old', 'property_currency', 'project_currency', 'me', 'myoffice'];
        $fields = [
            "Projects.id", "Projects.user_id", "Projects.project_title", 
            "Projects.param_space", "Projects.param_totalunits", "Projects.adrs_country", "Projects.adrs_city", 
            "Projects.project_currency", "Projects.adrs_region", "Projects.adrs_district", "Projects.rec_state", 
            "Projects.stat_updated", 
            "Users.user_fullname",
            // "Floorplans.project_id", "Floorplans.floorplan_minprice", "Floorplans.floorplan_maxprice",
        ];
        $searchlogs=[];

        // Filter params
        $_from = !empty($_GET['from']) ? $_GET['from'] : '';
        $_to = !empty($_GET['to']) ? $_GET['to'] : '';
        
        $_col = !empty($dt['col']) ? $dt['col'] : 'id';
        $_dir = !empty($dt['direction']) ? $dt['direction'] : 'DESC';
        $_page = !empty($dt['page']) ? $dt['page'] : 1;
        $_dont_log = isset($dt['dont_log']) ? true : false;


        $settings = [
            'order'=>[ 'Projects.'.$_col => $_dir ],
            "contain"=>[ "Users"],
            "page"=>$_page,
            "fields"=>$fields,
            "conditions"=>[],
        ];

        if( !empty($_from) ){ $settings['conditions']['Projects.stat_created >'] = $_from; }
        if( !empty($_to) ){ $settings['conditions']['Projects.stat_created <'] = $_to; }

        if(!empty($dt['user_id'])){
            // get my office Projects
            if($this->authUser['user_role'] == 'admin.supervisor'){
                $users_office = $this->getTableLocator()->get('Users')->find('list', [
                    'conditions'=>['office_id'=>$this->authUser['office_id']],
                ]);
                $settings['conditions']['Projects.user_id IN '] = array_keys($users_office->toArray());
            // get my own Projects
            }else{
                $settings['conditions']['Projects.user_id'] = $this->authUser['id'];
            }
        }

        foreach($dt as $col=>$val){

            // search into floorpalns PRICE and ROOMS
            if(in_array($col, ['property_price']) && !empty($val[0])){
                
                $settings['join'] = [
                    // ['table' => 'floorplans',
                    //     'alias' => 'Floorplans',
                    //     'type' => 'INNER',
                    //     'conditions' => [
                    //         'Floorplans.project_id = Projects.id',
                    //     ]
                    // ],
                ];
                
                $currencies = $this->Do->get('currencies');
                $current_currency = $currencies[$this->currCurrency];
                foreach($currencies as $k=>$currency){
                    $settings['conditions']['AND']['OR'][] = [
                        // 'Floorplans.floorplan_minprice <= ' => $this->Do->currencyConverter( $current_currency, $currency, $val[0] ),
                        'project_currency' => $k
                    ];
                }
            }
            
            if( isset($val) && !in_array($col, $notSearchable)){

                // allow value zero and escape from empty values
                if(empty($val) && $val !== '0'){ continue; }

                // CREATE LOG SEARCH OBJECT
                $val_arr = !is_array($val) ? [$val] : $val;
                if(in_array($col, $between)){
                    $val_arr = [implode(',',$val)];
                }

                foreach($val_arr as $k=>$v){
                    // PREVENT DOUBLICATION 
                    if($col=='features_ids'){
                        if( !$v ){ continue; }
                        if( strpos($oldSearch,  '"'.$k.'":true') !== false){ continue; }
                    }else{
                        if( strpos($oldSearch, $v.'') !== false){ continue; }
                    }
                    // $searchlogs[] = [
                    //     'search_group' => $col, 
                    //     'search_val'   => $col=='features_ids' ? $k : $v,
                    //     'search_ctrl'  => $this->request->getParam('controller') == 'Properties' ? 1 : 2
                    // ];
                }

                // KEYWORDS search
                if( $col == 'keyword' ){
                    $settings['conditions']['OR'][] = ['Projects.project_title LIKE' => "%".$val."%"];
                    $settings['conditions']['OR'][] = ['Projects.project_ref LIKE' => "%".$val."%"];
                }

                // BETWEEN search
                if(is_array($val) && in_array($col, $between)){
                    
                    if($col == 'param_unit_types'){dd($col);}
                    // make sure tow range values exist
                    if(empty($val[0])){ $val[0] = 0; }
                    if(empty($val[1])){ $val = [0, $val[0]]; }
                    
                    if(($val[0]+$val[1]) > 0){ 
                        $settings['conditions']['OR']['Projects.'.$col.' >= '] = $val[0];
                        $settings['conditions']['OR']['Projects.'.$col.' <= '] = $val[1];
                    }
                }

                // PARAMS, ADDRESSS and other direct search
                if( !in_array($col, $between) && !in_array($col, ['features_ids', 'keyword']) ){
                        // if($col == 'param_unit_types'){dd($val);}
                    if(is_array($val)){
                        foreach( $val as $k2=>$v2){
                            if(!$v2){ continue; }
                            $settings['conditions']['OR'][] = ['Projects.'.$col=>$v2];
                        }
                    }else{
                        if($col == 'stat_updated'){
                            $settings['conditions']['Projects.'.$col.($val==1 ? ' > ' : ' < ')] = $this->outdatedContent;
                        }else{
                            $settings['conditions']['Projects.'.$col] = $val;
                        }
                    }
                }

                // FEATURES IDS search
                if($col == 'features_ids' ){
                    foreach( $val as $k=>$v){
                        if(!$v){ continue; }
                        $settings['conditions']['AND'][] = ['Projects.features_ids LIKE' => "%,".$k.",%"];
                    }
                }
            }
        }
        
        $data = $this->paginate( $this->Projects, $settings );
        
        // Search in another fields if no result found
        if(!empty($dt['keyword'])){
            // search in project_desc
            if(empty($data->toArray())){
                $settings['conditions']['OR']['Projects.project_desc LIKE'] = "%".$dt['keyword']."%";
                $data = $this->paginate( $this->Projects, $settings );
            }
            // search in seo_keywords
            if(empty($data->toArray())){
                $settings['conditions']['OR']['Projects.seo_keywords LIKE'] = "%".$dt['keyword']."%";
                $data = $this->paginate( $this->Projects, $settings );
            }
            // soundex search for similar words
            if(empty($data->toArray())){
                $all = $this->Projects->find('all', ['fields'=>['project_title']]);
                $soundex_dt = [];
                foreach($all as $itm){
                    if(soundex($itm->project_title) == soundex($dt['keyword'])){
                        $soundex_dt[] = $itm;
                    }
                }
                $data = $soundex_dt;
            }
        }
        
        if($this->authUser['user_role'] == 'admin.callcenter'){
            $conditions['Projects.rec_state > '] = 0;
        }

        // SAVE Searchlogs
        // if(!empty($searchlogs) && !$_dont_log ){
        //     $this->Do->adder($searchlogs, 'Searchlogs');
        // }

        
        echo json_encode( [
            "status"=>"SUCCESS",
            "data"=>$this->Do->convertJson( $data ), "paging" => $this->request->getAttribute('paging')['Projects'],
            "debug"=>([$_col=>$_dir]),
        ], JSON_UNESCAPED_UNICODE); die();
    }


    public function save($id = -1) 
    {
        
        $dt = json_decode( file_get_contents('php://input'), true);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Projects->get($dt['id']);
            // if(!$this->_isAuthorized(true, 'update') && $rec->user_id != $this->authUser['id']){
            //     echo json_encode([
            //         "status"=>"FAIL", "data"=>[], "msg"=>__('you_not_authorized'),
            //         "redirect"=>$this->app_folder."/admin/projects/"]); die();
            // }
        }

        // add mode
        if ($this->request->is(['post'])) {
            $rec = $this->Projects->newEmptyEntity();
            $dt['id'] = null;
            $dt['stat_updated'] = date('Y-m-d H:i:s');
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['user_id'] = $this->authUser['id'];
            $last_id = $this->Do->get_last_rec_number('projects');
            $dt['project_ref'] = 'PTJ'.$last_id.'UID'.$this->authUser['id'];            
            $dt['rec_state'] = 1;
            $dt['language_id'] = empty($dt['language_id']) ? $this->currlang : $dt['language_id'];
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
                    $this->Images->uploader('img/projects_photos', $img, $fname.$k, $thumb_params, 0, true);
                }
                $sep = empty($rec->project_photos) ? '' : ',';
                $dt['project_photos'] = $rec->project_photos.$sep.$this->Images->getPhotosNames();
            }else{
                unset($dt['project_photos']);
            }
            
            $dt['seo_keywords'] = (!empty($dt['seo_keywords']) && is_array($dt['seo_keywords'])) ? implode(',', $dt['seo_keywords'] ) : '';
            $dt['param_units_size_range'] = (!empty($dt['param_units_size_range']) && is_array($dt['param_units_size_range'])) ? implode(',', $dt['param_units_size_range'] ) : '';
            $dt['param_unit_types'] = (!empty($dt['param_unit_types']) && is_array($dt['param_unit_types'])) ? implode(',', $dt['param_unit_types'] ) : '';
            $dt['project_videos'] = (!empty($dt['project_videos']) && is_array($dt['project_videos'])) ? implode(',', $dt['project_videos'] ) : '';
            $dt['features_ids'] = (!empty($dt['features_ids']) && is_array($dt['features_ids'])) ? ','.implode(',', array_keys( array_filter( $dt['features_ids'] ) ) ).',' : '';

            // dd($dt);

            // unset($dt['floorplans']);
            
            $rec = $this->Projects->patchEntity($rec, $dt);

            if ($newRec = $this->Projects->save($rec)) {
                
                // send notification to admin system by new added contents
                if ($this->request->is(['post'])) {
                    $dt['userInfo'] = $this->authUser;
                    $dt['ctrl'] = 'project';
                    $dt['controller'] = 'Projects';
                    $dt['lang'] = $this->currlang;
                    $dt['id'] = $newRec['id'];
                    $this->Do->sendEmail(['osama@propertyturkey.com'], __('new_project_added'), $dt, 'new_content_tm');
                }

                $newRec->param_units_size_range = empty($newRec->param_units_size_range) ? [0,0] : explode(",", $newRec->param_units_size_range);
                $newRec->features_ids = empty($newRec->features_ids) ? [] : explode(",", $newRec->features_ids);
                echo json_encode(["status"=>"SUCCESS", "data"=>$this->Do->convertJson( $newRec )]); die();
            }

            echo json_encode(["status"=>"FAIL", "data"=>$rec->getErrors()]); die();
        }
        
        $developers = $this->Projects->Developers->find('list')->where(['rec_state'=>1]);
        // $sellers = $this->Projects->Sellers->find('list')->where(['rec_state'=>1]);

        $this->set(compact('developers'));
    }

	public function delimage() 
    {
        $this->request->allowMethod(['delete']);
        $ctrl = $this->request->getParam('controller');
        $this->autoRender  = false;
        $dt = json_decode( file_get_contents('php://input'), true);
        

		if( $this->Images->deleteFile('img/'.strtolower( $ctrl ).'_photos', $dt['image'])){
            $rec = $this->$ctrl->get($dt['id']);
            
			$imgsArray = explode(",", $rec->project_photos);
            $key = array_search($dt['image'], $imgsArray);
			unset($imgsArray[$key]);
			$update = ["id"=>$dt['id'], "project_photos"=>implode(",",$imgsArray)];
        	$updated_rec = $this->$ctrl->patchEntity($rec, $update);
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

        // $delRec=[];
        // foreach(explode(",", $id."") as $k=>$rec_id){
        //     $rec = $this->Projects->get($rec_id, ['contain'=> ['Floorplans'] ] );
        //     $delRec[$k] = $this->Projects->delete($rec);
            
        //     $this->Images->deleteFile('img/projects_photos', explode(',', $rec->project_photos.""));
        //     $this->Images->deleteFile('img/floorplans_photos', array_values( array_column( $rec->floorplans, 'floorplan_photo') ));
        // }

        
        $delRec=[];
        foreach(explode(",", $id."") as $k=>$rec_id){
            $rec = $this->Projects->get($rec_id);
            
            if( $delRec[$k] = $this->Projects->delete($rec) ){
                $rec = $rec->toArray();
                // if(!empty($rec['docs'])){
                //     $this->Images->deleteFile('file/projects_files', array_values( array_column( ( $rec['docs'] ), "doc_name" )));
                // }
                if(!empty($rec['project_photos'])){
                    $this->Images->deleteFile('img/projects_photos', explode(',', $rec['project_photos'].""));
                }
                // if(!empty($rec['floorplans'])){
                //     $this->Images->deleteFile('img/floorplans_photos', array_values( array_column( $rec['floorplans'], 'floorplan_photo') ));
                // }
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

        // $isExistIds = $this->Projects->UserProject->find('list', [
        //     'consditions'=>['project_id IN'=>$ids], 'keyField'=>'id', 'valueField'=>'project_id'
        // ])->toArray();
        
        foreach(explode(',', $ids) as $k=>$id){
            
            // set exist records to published
            if($to=='publish'){
                // $dt[$k] = $this->Projects->UserProject->newEmptyEntity();
                $dt[$k] = ['id'=>$id, 'rec_state'=>2];

            // create new assignment
            }else{
                // if(in_array($id, $isExistIds)){ continue; }
                $dt[] = ['project_id'=>$id, 'user_id'=>$to, 'stat_created'=>date('Y-m-d H:i:s'), 'rec_state'=>1];
            }
        }
        
        if(empty($dt)){
            echo json_encode( ["status"=>"SUCCESS", "data"=>[], 'msg'=>__('assign_already_assigned')] ); die();
        }

        // if($to=='publish'){
        //     $dt = $this->Projects->UserProject->patchEntities( $isExistIds, $dt );
        // }else{
        //     $dt = $this->Projects->UserProject->newEntities( $dt );
        // }

        // if( $updateRec = $this->Projects->UserProject->saveMany( $dt ) ){
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
            $rec = $this->Projects->newEmptyEntity();
            $rec['id'] = $id;
            $rec['rec_state'] = $val;
            $updateRec[$k] = $this->Projects->save($rec);
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
