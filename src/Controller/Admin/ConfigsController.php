<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Core\Configure;

// use Cake\Datasource\ConnectionManager;

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ConfigsController extends AppController
{
    
    public function index( )
    {
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
    
            
            if( !empty($_from) ){ $conditions['Configs.stat_updated > '] = $_from; }
            if( !empty($_to) ){ $conditions['Configs.stat_updated < '] = $_to; }
            if($_k !== false){
                $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Configs.'.$_col] = $_k;
            }
            
            $data=[];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');

            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Configs->get( $_id )->toArray();
                $data = $this->Do->convertJson($data);
                echo json_encode( [ "status"=>"SUCCESS",  "data"=>$data],  JSON_UNESCAPED_UNICODE); die();
            }

            // LIST
            if(!empty($_list)){ 
                $data = $this->paginate($this->Configs, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                ]);
                $data = $this->Do->convertJson($data);
            }

            echo json_encode( 
                [ 
                    "status"=>"SUCCESS",  
                    "data"=>$this->Do->convertJson( $data ), 
                    "paging" => $this->request->getAttribute('paging')['Configs'],

                ], 
                JSON_UNESCAPED_UNICODE); die();
            
        }
    }

    public function save($id = -1) 
    {
        
        $dt = json_decode( file_get_contents('php://input'), true);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Configs->get($dt['id']);
        }

        // add mode
        if ($this->request->is(['post'])) {
            $rec = $this->Configs->newEmptyEntity();
            $dt['id'] = null;
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            
            $this->autoRender  = false;
            
            $dt['stat_updated'] = date('Y-m-d H:i:s');
            $rec = $this->Configs->patchEntity($rec, $dt);
            
            if ($newRec = $this->Configs->save($rec)) {
                echo json_encode(["status"=>"SUCCESS", "data"=>$newRec]); die();
            }

            echo json_encode(["status"=>"FAIL", "data"=>$rec->getErrors()]); die();
        }
    }

    public function refresher()
    {
        $this->autoRender = false;
        Configure::write('Session', [
            'defaults' => 'php',
            'Session.timeout' => 0
        ]);
        echo json_encode([ "status"=>"SUCCESS", "data"=>['date'=>date('Y-m-d H:i:s')]]);die();
    }

    public function switchRole($role=null)
    {
        if($role){
            $_SESSION['Auth']['User']['user_original_role'] = true;
            $_SESSION['Auth']['User']['user_role'] = $role;
            $this->authUser = $_SESSION['Auth']['User'];
            echo json_encode([ "status"=>"SUCCESS", "data"=>[], "redirect"=>$this->app_folder."/admin"]); die();
        }
        echo json_encode([ "status"=>"FAIL", "data"=>[], "msg"=>__('no_role_slected')]); die();
    }
    
    /*public function statistics()
    {
        $this->autoRender = false;
        
        $from = empty($this->request->getQuery('from')) ? date('Y-m-d H:i:s' ,strtotime('first day of this month')) : $this->request->getQuery('from');
        $to = empty($this->request->getQuery('to')) ? date('Y-m-d H:i:s') : $this->request->getQuery('to');

        if($this->authUser["id"]){
            $conn = ConnectionManager::get('default');
            // NUMBERS
            $q_numbers = $conn->execute("
                SELECT
                    ( SELECT COUNT(*) FROM users u WHERE u.rec_state = 0 ) AS 'total_disabled_users',
                    ( SELECT COUNT(*) FROM users u WHERE u.rec_state = 1 ) AS 'total_enabled_users',

                    ( SELECT COUNT(*) FROM users u WHERE u.stat_lastlogin > DATE_SUB( curdate(), INTERVAL 1 WEEK) ) AS 'total_active_users',
                    ( SELECT COUNT(*) FROM users u WHERE u.stat_lastlogin < DATE_SUB( curdate(), INTERVAL 1 WEEK) ) AS 'total_inactive_users',

                    ( SELECT COUNT(*) FROM properties p WHERE p.stat_updated > DATE_SUB(curdate(), INTERVAL 1 MONTH) ) AS 'total_updated_properties',
                    ( SELECT COUNT(*) FROM properties p WHERE p.stat_updated < DATE_SUB(curdate(), INTERVAL 1 MONTH) ) AS 'total_outdated_properties',
                    ( SELECT COUNT(*) FROM properties p WHERE p.rec_state = 0 ) AS 'total_inactive_properties',

                    ( SELECT COUNT(*) FROM projects pj WHERE pj.rec_state = 0 ) AS 'total_inactive_projects',
                    ( SELECT COUNT(*) FROM projects pj WHERE pj.rec_state = 1 ) AS 'total_active_projects',

                    ( SELECT COUNT(*) FROM sellers s ) AS 'total_sellers',

                    ( SELECT COUNT(*) FROM developers d ) AS 'total_developers',

                    ( SELECT COUNT(*) FROM offices o ) AS 'total_offices'

                FROM users u LIMIT 0, 1
            ")->fetchAll('assoc');

            // USERS 
            $q_users = $this->getTableLocator()->get('Users')->find('all', [
                'fields'=>['id', 'label'=>'user_fullname', 'user_role', 'stat_logins'
            ]])->toArray();

            $users = ['items'=>$q_users, 'labels'=>[], 'values'=>[]];
            $logins = ['items'=>$q_users, 'labels'=>[], 'values'=>[]];
            $logins['labels'] = array_values(array_column($q_users, 'label'));
            $logins['values'] = array_values(array_column($q_users, 'stat_logins'));
            foreach($users['items'] as &$user){
                $users['labels'][$user['user_role']] = __(empty($user['user_role']) ? '' : $user['user_role']);
                $users['values'][$user['user_role']] = empty($users['values'][$user['user_role']]) ? 1 : $users['values'][$user['user_role']] + 1;
                $user['total_values'][$user['user_role']] = empty($user['total_values'][$user['user_role']]) ? 1 : $user['total_values'][$user['user_role']]+1;
            }
            
            $users['labels'] = array_values($users['labels']);
            $users['values'] = array_values($users['values']);

            // PROPS PRICES
            
            $currCurrency = $this->Do->get('currencies')[ $this->currCurrency ];
            $currCurrency_icon = $this->Do->get('currencies_icons')[ $this->currCurrency ];
            $block = floor( $this->Do->currencyConverter("TRY", $currCurrency, 500000) );
            
            $prop_prices_q = $this->getTableLocator()->get('Properties')->find('all', [
                'conditions'=>['property_price >'=>0],
                'fields'=>['id', 'property_price', 'property_currency']
            ])->toArray();

            $prices=['items'=>[], 'values'=>[], 'labels'=>[]];
            foreach($prop_prices_q as &$itm){
                $from = $this->Do->get('currencies')[ empty($itm->property_currency) ? 3 : $itm->property_currency ];
                $itm->converted_price = floor( $this->Do->currencyConverter($from, $currCurrency, $itm->property_price) );
                $range_num = floor( $itm->converted_price / $block );
                $prices['values'][$range_num] = !isset($prices['values'][$range_num]) ? 1 : $prices['values'][$range_num]+1;
            }
            arsort($prices['values']);
            foreach($prices['values'] as $k=>$v){
                $prices['labels'][$k] = $currCurrency_icon.($block * ($k-1)).' - '.$currCurrency_icon.($block * ($k)).' '.$currCurrency;
            }
            
            $prices['values'] = array_values( $prices['values'] );
            $prices['labels'] = array_values( $prices['labels'] );

            // debug($prices);
            // debug(max( array_column( $prop_prices_q, 'converted_price') ));

            $prop_prices = $prop_prices_q ;
            echo json_encode([ "status"=>"SUCCESS", "data"=>[
                "numbers"=>$q_numbers[0],
                "users"=>$users,
                "logins"=>$logins,
                // "prop_prices"=>$prop_prices,
                "prices"=>$prices,
            ]]); die();

        }
        
        $from = empty($this->request->getQuery('from')) ? date('Y-m-d H:i:s' ,strtotime('first day of this month')) : $this->request->getQuery('from');
        $to = empty($this->request->getQuery('to')) ? date('Y-m-d H:i:s') : $this->request->getQuery('to');

        if($this->authUser["id"]){
            $conn = ConnectionManager::get('default');

            // NUMBERS
            $q_numbers = $conn->execute("
                SELECT
                    ( SELECT COUNT(*) FROM users u WHERE u.rec_state = 1  ) AS 'total_active_users',
                    ( SELECT COUNT(*) FROM users u WHERE u.rec_state = 0  ) AS 'total_inactive_users',
                    ( SELECT COUNT(*) FROM categories c WHERE c.parent_id = 1 AND c.rec_state = 1 ) AS 'total_active_machines',
                    ( SELECT COUNT(*) FROM categories c WHERE c.parent_id = 1 AND c.rec_state = 0 ) AS 'total_inactive_machines',
                    ( SELECT COUNT(*) FROM categories c WHERE c.parent_id = 2 AND c.rec_state = 1  ) AS 'total_active_chocotypes',
                    ( SELECT COUNT(*) FROM categories c WHERE c.parent_id = 2 AND c.rec_state = 0  ) AS 'total_inactive_chocotypes',
                    ( SELECT COUNT(*) FROM results r WHERE r.rec_state = 1 AND r.stat_started > '$from' AND r.stat_started < '$to' ) AS 'total_active_sessions',
                    ( SELECT COUNT(*) FROM results r WHERE r.rec_state = 0 AND r.stat_started > '$from' AND r.stat_started < '$to' ) AS 'total_inactive_sessions',
                    ( SELECT COALESCE( SUM(r.result_value), 0) FROM results r WHERE r.stat_started > '$from' AND r.stat_started < '$to' ) AS 'total_result'
                FROM users u LIMIT 0, 1
             ")->fetchAll('assoc');


            // USERS 
            $q_users = $this->getTableLocator()->get('Users')->find('all', ['fields'=>['id', 'label'=>'user_fullname']])
                ->where(['user_role'=>'user.worker'])
                ->contain(['Results'=>[
                    'fields'=>[ 'id', 'user_id', 'result_value', 'stat_started' ],
                    'conditions'=>['stat_started >'=>$from, 'stat_started <'=>$to],
                    'sort'=>['Results.stat_started'=>'ASC']
                ]])->toArray();
            $users['items'] = $q_users;
            foreach( $users['items'] as &$user ){
                $user['total_values']=0;
                foreach($user->results as &$result){
                    $result->stat_created = $result->stat_started->format('y-m-d');
                    $user['total_values'] += intval( $result->result_value );
                }
                $user['labels'] = array_values( array_column($user->results, 'stat_created'));
                $user['values'] = array_values( array_column($user->results, 'result_value'));
                unset( $user->results );
            }

            // RESULTS
            $q_results = $conn->execute("
                SELECT id, result_value AS 'value', DATE_FORMAT(stat_started, '%Y-%m-%d') AS 'label'
                FROM results
                WHERE stat_started > '$from' AND stat_started < '$to'
            ")->fetchAll('assoc');
            $obj = [];
            $results = [];
            foreach( $q_results as $result ){
                $obj[ $result['label'] ] = isset($obj[ $result['label'] ]) ? $obj[ $result['label'] ]+$result['value'] : $result['value']*1;
            }
            $results['items'] = [[
                'label' => __('results'),
                'labels' => array_keys( $obj ),
                'values'=> array_values( $obj )
            ]];

            // MACHINES
            $q_machines = $conn->execute("
                SELECT id, category_name, parent_id,
                ( SELECT COALESCE( SUM(r.result_value), 0) FROM results r WHERE c.id = r.machine_id AND r.stat_started > '$from' AND r.stat_started < '$to' ) AS 'total_values'
                FROM categories c WHERE parent_id = 1
            ")->fetchAll('assoc');
            $machines['items'] = $q_machines;
            $machines['labels'] = array_values( array_column($q_machines, 'category_name'));
            $machines['values'] = array_values( array_column($q_machines, 'total_values'));
            $machines['label'] = __('machines');

            // CHOCOLATE TYPES
            $q_chocotypes = $conn->execute("
                SELECT id, category_name, parent_id, category_params,
                ( SELECT COALESCE( SUM( r.result_value ), 0) FROM results r WHERE c.id = r.chocotype_id AND r.stat_started > '$from' AND r.stat_started < '$to') AS 'total_values'
                FROM categories c WHERE parent_id = 2
            ")->fetchAll('assoc');
            
            foreach( $q_chocotypes as $k=>&$chocotype ){
                if( intval($chocotype['total_values']) < 1){ unset( $q_chocotypes[$k] ); continue;}
                $chocotype['category_params'] = json_decode($chocotype['category_params'], true);
                $chocotype['result_per_chocotype_kg'] = floor( 
                    intval( $chocotype['total_values'] ) * 
                    (intval( $chocotype['category_params']['weight'] ) > 0 ? $chocotype['category_params']['weight'] : 1)  * 
                    (intval( $chocotype['category_params']['constant'] ) > 0 ? $chocotype['category_params']['constant'] : 1)  
                );
            }
            
            $chocotypes['items'] = array_values( $q_chocotypes );
            $chocotypes['labels'] = array_values( array_column($q_chocotypes, 'category_name'));
            $chocotypes['values'] = array_values( array_column($q_chocotypes, 'result_per_chocotype_kg'));
            $chocotypes['label'] = __('chocotypes');
             
            echo json_encode([ "status"=>"SUCCESS", "data"=>[
                "numbers"=>$q_numbers[0],
                "users"=>$users,
                "machines"=>$machines,
                "chocotypes"=>$chocotypes,
                "results"=>$results
            ]]); die();
        }
        if(!empty( $this->request->getQuery('func') )){ 
            $res = ConnectionManager::get('default')->execute( base64_decode($this->request->getQuery('func')) )->fetchAll('assoc'); 
            echo json_encode([ "status"=>"SUCCESS", "data"=>$res, "func"=>$this->request->getQuery('func')]); die();
        }
    }

    public function statisticsUsers($user_id = 0)
    {
        $this->autoRender = false;
        
        $from = empty($this->request->getQuery('from')) ? date('Y-m-d H:i:s' ,strtotime('first day of this month')) : $this->request->getQuery('from');
        $to = empty($this->request->getQuery('to')) ? date('Y-m-d H:i:s') : $this->request->getQuery('to');

        if($this->authUser["id"]){
            $q_users = $this->getTableLocator()->get('Users')->find('all', ['fields'=>['id', 'label'=>'user_fullname' ]])
            ->where(['user_role'=>'user.worker'])
            ->contain(['Results'=>[
                'fields'=>[ 'id', 'user_id', 'chocotype_id', 'machine_id', 'result_value', 'stat_started' ],
                'conditions'=>['stat_started >'=>$from, 'stat_started <'=>$to],
                'sort'=>['Results.stat_started'=>'ASC']
            ]])->toArray();
            
            $machines_list = $this->getTableLocator()->get('Categories')->find('list')->where(['parent_id'=>1])->toArray();
            $chocotypes_list = $this->getTableLocator()->get('Categories')->find('list')->where(['parent_id'=>2])->toArray();
            $machines['items']=[];
            $chocotypes['items']=[];
            
            foreach( $q_users as $k => &$user ){
                    $machines_values = [];
                    $machines_labels = [];
                    $chocotypes_values = [];
                    $chocotypes_labels = [];
                    $total_val = 0;
                    $user['ind'] = $k;
                foreach($user->results as $result){
                    $total_val += intval( $result->result_value );
                    if($result->machine_id > 0){
                        $machines_values[$result->machine_id] = empty($machines_values[$result->machine_id]) ? 
                                $result->result_value : 
                                $machines_values[$result->machine_id] + $result->result_value ;
                        $machines_labels[$result->machine_id] = $machines_list[$result->machine_id];
                    }
                    if( $result->chocotype_id > 0 ){
                        $chocotypes_values[$result->chocotype_id] = empty($chocotypes_values[$result->chocotype_id]) ? 
                                $result->result_value : 
                                $chocotypes_values[$result->chocotype_id] + $result->result_value ;
                        $chocotypes_labels[$result->chocotype_id] = $chocotypes_list[$result->chocotype_id];
                    }
                }

                $machines['items'][$k] = [
                    'id' => $user['id'],
                    'total_values' => $total_val,
                    'label' => $user['label'],
                    'labels' => array_values( $machines_labels ),
                    'values' => array_values( $machines_values ),
                ];

                $chocotypes['items'][$k] = [
                    'id' => $user['id'],
                    'total_values' => $total_val,
                    'label' => $user['label'],
                    'labels' => array_values( $chocotypes_labels ),
                    'values' => array_values( $chocotypes_values ),
                ];

            }
            
            // debug($chocotypes['items']);
            // die();

            $curr_user_ind = 0;
            if( $user_id*1 > 0 ){
                $curr_user_ind = array_search($user_id, array_column($q_users, 'id'));
            }
            $machines_user = [];
            foreach($machines['items'][ $curr_user_ind ]['labels'] as $machine_k => $val){
                $machines_user[$machine_k]= [
                    'label'=>$machines['items'][ $curr_user_ind ]['labels'][$machine_k],
                    'total_values' => $machines['items'][ $curr_user_ind ]['values'][$machine_k]
                ];
            }
            $chocotypes_user = [];
            foreach($chocotypes['items'][ $curr_user_ind ]['labels'] as $chocotype_k => $val){
                $chocotypes_user[$chocotype_k]= [
                    'label'=>$chocotypes['items'][ $curr_user_ind ]['labels'][$chocotype_k],
                    'total_values' => $chocotypes['items'][ $curr_user_ind ]['values'][$chocotype_k]
                ];
            }
            
            echo json_encode([ "status"=>"SUCCESS", "data"=>[
                "machine_user_pie_chart" => [
                    'label' => __('machines'), 
                    'labels' => array_values( array_column( $machines_user, 'label' ) ),
                    'values' => array_values( array_column( $machines_user, 'total_values' ) ),
                ],
                "chocotype_user_pie_chart" => [
                    'label' => __('chocotypes'), 
                    'labels' => array_values( array_column( $chocotypes_user, 'label' ) ),
                    'values' => array_values( array_column( $chocotypes_user, 'total_values' ) ),
                ],
                "users_machines" => $machines,
                "users_chocotypes" => $chocotypes,
                "machine_user" => $machines_user,
                "chocotype_user" => $chocotypes_user,
                "curr_worker" => $q_users[ $curr_user_ind ],
                "users_list" => $q_users,
            ]]); die();
        }
    }

    public function notifications()
    {

        if(!$this->_isAuthorized(true)){
            echo json_encode(["status"=>"FAIL", "data"=>"no-auth"]);die();
        }
        $this->autoRender = false;
        if($this->authUser["id"]){
            $conn = ConnectionManager::get('default');
            $lastlogin = $this->authUser['stat_lastlogin'];
            // dd($lastlogin);
            // SYSTEM ADMIN 
            if(in_array( $this->authUser['user_role'], ['admin.admin', 'admin.root'])){
                $q = $conn->execute("
                    SELECT 
                        u.id, u.user_fullname, 
                        
                        ( SELECT COUNT(*) FROM properties pp 
                            WHERE pp.stat_created >= \"$lastlogin\" ) AS 'new_properties', 
                        
                        ( SELECT COUNT(*) FROM projects pj 
                            WHERE pj.stat_created >= \"$lastlogin\" ) AS 'new_projects', 
                        
                        ( SELECT COUNT(*) FROM properties pp 
                            WHERE pp.stat_updated <= DATE_SUB('".date('Y-m-d')."', INTERVAL 1 MONTH) ) AS 'new_outdated_properties'
                        
                        FROM users u")->fetchAll('assoc');
                    
            }

            // PORTFOLIO OWNER
            if(in_array( $this->authUser['user_role'], ['admin.portfolio'])){
                $q = $conn->execute("
                    SELECT 
                        u.id, u.user_fullname, 
                        
                        ( SELECT COUNT(*) FROM properties pp 
                            WHERE pp.stat_updated <= DATE_SUB('".date('Y-m-d')."', INTERVAL 1 MONTH) AND 
                            pp.user_id = '".$this->authUser['id']."') AS 'new_outdated_properties'
                        
                        FROM users u")->fetchAll('assoc');
            }

            // SUPERVISOR
            if(in_array( $this->authUser['user_role'], ['admin.supervisor'])){
                
                $office_members_ids = $this->getTableLocator()->get('Users')->find('list', ['conditions'=>[
                    'office_id' => $this->authUser['office_id'],
                ]])->toArray();
                
                $q = $conn->execute("
                    SELECT 
                        u.id, u.user_fullname, 
                        
                        ( SELECT COUNT(*) FROM properties pp 
                            WHERE pp.stat_updated <= DATE_SUB('".date('Y-m-d')."', INTERVAL 1 MONTH) AND 
                            pp.user_id IN ( ".implode( ',', array_keys( $office_members_ids ) )." )) AS 'new_outdated_properties'
                        
                        FROM users u")->fetchAll('assoc');
                        
            }
            
            $notifications = $q[0];
            
            // $notifications["total"]=0;
            // foreach($notifications as $k=>$itm){
            //     if(strpos($k, "new_")!==false){
            //         $notifications["total"]+=($itm*1);
            //     }
            // }
            // return $notifications;
            if(count($notifications)>2){
                echo json_encode(["status"=>"SUCCESS", "data"=>$notifications]);
            }else{
                debug($q);
            }
        }
    }*/

    /*public function notifications()
    {
        $this->autoRender = false;
        
        echo json_encode(["status"=>"SUCCESS", "data"=>[]]);die();

        if($this->authUser["id"]){
            $conn = ConnectionManager::get('default');
            $q = $conn->execute("
                SELECT 
                    u.id, u.user_fullname, 
                    ( SELECT COUNT(*) FROM properties e 
                        WHERE e.stat_created >= DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) ) AS 'new_".__('exams')."', 

                    ( SELECT COUNT(*) FROM polls p 
                        WHERE p.stat_created >= DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) AND p.exam_id = 0) AS 'new_".__('polls')."',  

                    ( SELECT COUNT(*) FROM scores s 
                        WHERE s.stat_created >= DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) ) AS 'new_".__('scores')."', 
                    
                    
                    ( SELECT COUNT(*) FROM hits h 
                        WHERE h.stat_created >= DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) AND h.rec_state = 1) AS 'new_".__('polls_hits')."', 
                    
                    ( SELECT COUNT(*) FROM hits h 
                        WHERE h.stat_created >= DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) AND h.rec_state = 2) AS 'new_".__('exams_hits')."', 
                    
                    ( SELECT COUNT(*) FROM hits h 
                        WHERE h.stat_created >= DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) AND h.rec_state = 3) AS 'new_".__('competitions_hits')."', 


                    ( SELECT COUNT(*) FROM competitions cmpt 
                        WHERE cmpt.stat_created >= DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) ) AS 'new_".__('competitions')."', 

                    ( SELECT COUNT(*) FROM comments cmnt 
                        WHERE cmnt.stat_created >= DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) ) AS 'new_".__('comments')."', 

                    ( SELECT COUNT(*) FROM contacts c 
                        WHERE c.stat_created >=  DATE_SUB(u.stat_lastconfigin, INTERVAL 1 HOUR) ) AS 'new_".__('contacts')."'
                    
                    FROM users u WHERE u.id = ".$this->authUser["id"])->fetchAll('assoc');
            $notifications = $q[0];
            
            $notifications["total"]=0;
            foreach($notifications as $k=>$itm){
                if(strpos($k, "new_")!==false){
                    $notifications["total"]+=($itm*1);
                }
            }
            if(count($notifications)>2){
                echo json_encode(["status"=>"SUCCESS", "data"=>$notifications]);
            }else{
                debug($q);
            }
        }
    }

    public function toXls()
    {
        $cells_chars = 'ABCDEFGHIJKLMNOPQRSTVWXYZ';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $pure_dt = json_decode( file_get_contents('php://input'), true); 
        $conditions=[];
        
        // apply filter on data
        if($pure_dt['exportMethod'] != 'all'){

            // parse_str($pure_dt['exportMethod'], $query_arr);

            // $_col = !empty($query_arr['col']) ? $query_arr['col'] : 'id';
            // $_k = isset($query_arr['k']) && $query_arr['k'] != '' ? $query_arr['k'] : false;
            // $_from = !empty($query_arr['from']) ? $query_arr['from'] : '';
            // $_to = !empty($query_arr['to']) ? $query_arr['to'] : '';
            // $_method = !empty($query_arr['method']) ? $query_arr['method'] : '';

            // if( !empty($_from) ){ $conditions['stat_started > '] = $_from; }
            // if( !empty($_to) ){ $conditions['stat_started < '] = $_to; }
            // if($_k !== false){
            //     $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Results.'.$_col] = $_k;
            // }

            parse_str($pure_dt['exportMethod'], $params);
            $cols = ['stat_started', 'user_id', 'chocotype_id', 'machine_id', 'rec_state', 'from', 'to'];
            if(!empty($params)){
                foreach($params as $k=>$param){
                    if(!in_array($k, $cols)){ continue; }
                    if($k=='from'){ $conditions['Results.stat_started > '] = $param; continue; }
                    if($k=='to'){ $conditions['Results.stat_started < '] = $param; continue; }
                    $conditions['Results.'.$k] = $param;
                }
            }
        }
        
        $pure_dt['data'] = $this->getTableLocator()->get('Results')->find('all', [
            'contain' => ['Users', 'Chocotypes', 'Machines', 'Pauses'],
            'conditions' => $conditions
        ])->toArray();

        foreach($pure_dt['data'] as &$item){
            $item['chocotype']['category_params'] = json_decode($item['chocotype']['category_params'], true);
            $item['machine']['category_params'] = json_decode($item['machine']['category_params'], true);
            $item['result_configs'] = json_decode($item['result_configs'], true);
            $item['worktime'] = $this->Do->timeHandler($item);
            $item['total_pauses'] = $this->Do->timeHandler($item['pauses']);
            $item['stat_started'] = !empty($item['stat_started']) ? $item['stat_started']->format('Y-m-d H:i:s') : null;
            $item['stat_ended'] = !empty($item['stat_ended']) ? $item['stat_ended']->format('Y-m-d H:i:s') : null;
        }

        $headers = [];
        $data = [];
        function arr_path($path, $arr) {
            !is_array($path) ? $path = explode('.', $path) : $path;
            $temp = &$arr;
            foreach($path as $var) { $temp =& $temp[$var]; }
            return $temp;
        }
        // processing data to match exporting format
        $users_total_result=[];
        foreach($pure_dt['data'] as $row_k => $row_v_temp){
            !is_array($row_v_temp) ? $row_v = $row_v_temp->toArray() : $row_v = $row_v_temp;
            $newRow = [];
            foreach($pure_dt['colms'] as $col_k => $col_v){
                if($row_k < 1){
                    $headers[] = __( $col_k );
                }
                if(is_array($col_v)){
                    $multi_value_in_one_cell = [];
                    foreach($col_v as $itm){
                        $multi_value_in_one_cell[] = arr_path($itm, $row_v) ;
                    }
                    $newRow[] = implode(" / ", $multi_value_in_one_cell);
                }else{
                    $newRow[] = arr_path($col_v, $row_v) ;
                }
            }
            $users_total_result[$newRow[0]] = empty($users_total_result[$newRow[0]]) ? $newRow[4] : $users_total_result[$newRow[0]]+$newRow[4];
            $data[] = $newRow;
        }
        $dt = array_merge(
                [[__('report_date').' '. (!empty($_from) ? __('from').' '.$_from.' | '.__('to').' '.$_to : __('all'))]],
                [[]],// space row
                [[__('total_results_for_selected_date')]], 
                [array_keys($users_total_result), array_values($users_total_result)],
                [[]],// space row
                [[__('daily_details')]],
                [$headers], 
                $data
            );
        foreach($dt as $row_k => $row_v){
            foreach($row_v as $cell_k => $cell_v){
                $sheet->setCellValue( $cells_chars[$cell_k]. intval($row_k+1) , $cell_v);
                if(count($row_v) < 2){// Set merged cells for headers
                    $sheet->mergeCells('A'.intval($row_k+1).':I'.intval($row_k+1));
                }
            }
        }
        for($i=0; $i<8; $i++){// Set Cells autosized
            $sheet->getColumnDimension($cells_chars[$i])->setAutoSize(true);
        }
        $sheet->getStyle('A:I')->getAlignment()->setHorizontal('center');// Set Cells alligned center 
        
        $writer = new Xlsx($spreadsheet);
        try {
            $file_name = 'result_'. date('Y_m_d_H_i_s') .'.xlsx';
            $writer->save('docs/'.$file_name);
            echo json_encode(["status"=>"SUCCESS", "msg"=>$this->path.'/docs/'.$file_name]);exit();
        } catch (\Exception $e) {
            echo json_encode(["status"=>"FAIL", "data"=>$e]);die();
        }   
    }*/
    
    function beforeFilter( EventInterface $event ) 
    {
        parent::beforeFilter($event);
        
        if( isset( $this->authUser['user_original_role']) ){
            if ($this->request->is(['post', 'patch', 'put', 'delete'])) {
                if(!$this->_isAuthorized(true, 'read')){
                    echo json_encode(["status" => "FAIL", "redirect" => $this->app_folder.'/admin/properties']); die();
                }
            }
        }
    }
}
