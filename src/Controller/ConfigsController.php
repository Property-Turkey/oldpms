<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

use Cake\Datasource\ConnectionManager;

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ConfigsController extends AppController
{
    public function cat($key)
    {

        $this->autoRender = false;
        $cats=[];
        $prefix = empty($this->request->getQuery('prefix')) ? 'PROP' : $this->request->getQuery('prefix');

        if($key=='all'){
            $cats[$prefix.'_SPECS'] = $this->Do->lcl ( $this->Do->cat($prefix.'_SPECS') );
            $cats[$prefix.'_FEATURES'] = $this->Do->lcl ( $this->Do->cat($prefix.'_FEATURES') );
            $cats[$prefix.'_CATEGORIES'] = $this->Do->lcl ( $this->Do->cat($prefix.'_CATEGORIES') );
            
            $cats[$prefix.'_SPECS_keys'] = $this->Do->lcl ( $this->Do->cat($prefix.'_SPECS') , false , false);
            $cats[$prefix.'_FEATURES_keys'] = $this->Do->lcl ( $this->Do->cat($prefix.'_FEATURES') , false , false);
            $cats[$prefix.'_CATEGORIES_keys'] = $this->Do->lcl ( $this->Do->cat($prefix.'_CATEGORIES') , false , false);
        }else{
            $cats = $this->Do->lcl ( $this->Do->cat($key) );
        }

        $cats[$prefix.'_SPECS_keys']['property_usp'] = __('property_usp');
        $cats[$prefix.'_SPECS_keys']['property_price'] = __('property_price');
        $cats[$prefix.'_SPECS_keys']['keyword'] = __('keyword');
        $cats[$prefix.'_SPECS_keys']['language_id'] = __('language_id');
        $cats[$prefix.'_SPECS_keys']['features_ids'] = __('features_ids');
        $cats[$prefix.'_SPECS_keys']['adrs_country'] = __('adrs_country');
        $cats[$prefix.'_SPECS_keys']['adrs_city'] = __('adrs_city');
        $cats[$prefix.'_SPECS_keys']['adrs_region'] = __('adrs_region');
        $cats[$prefix.'_SPECS_keys']['adrs_district'] = __('adrs_district');

        echo json_encode([ "status"=>"SUCCESS", "data"=>$cats ]); die();

    }

    public function setcurrency($val)
    {
        $this->Do->CookiesHandler(['currency'=>$val], 'write');
        echo json_encode([ "status"=>"SUCCESS", "data"=>[$val] ]); die();
    }

    public function setlanguage($val)
    {
        $this->Do->CookiesHandler(['language'=>$val], 'write');
        echo json_encode([ "status"=>"SUCCESS", "data"=>[$val] ]); die();
    }
    
    public function cronUpdateCurrencies()
    {
        $records = $this->Configs->find('all')->where(['config_key LIKE'=>'%USD%'])->toArray();
        
        foreach($records as &$record){
            $record['config_value'] = $this->Do->getCurrencyRate($record['config_key']);
            $record['stat_updated'] = date('Y-m-d H:i:s');
        }
        
        if ($this->Configs->saveMany($records)) {
            echo 'updated';
        }else{
            echo 'fail';
        }
        debug($records); die();
        return $records;
    }

    function beforeFilter(EventInterface $event) 
    {
        parent::beforeFilter($event);
        $this->Auth->allow([
            'cronUpdateCurrencies'
            // 'sharecounter',
            // 'upld',
            // 'delfiles',
            // 'sess',
            // 'statistics',
            // 'notifications',
            // 'sitemap',
            // 'workSession',
            // 'getWorkSession',
            // 'offers',
            // 'like',
            // 'comments',
            // 'pause',
            // 'toXls'
        ]);
    }

    // public function statistics()
    // {
    //     $this->autoRender = false;
        
    //     $from = empty($this->request->getQuery('from')) ? date('Y-m-d H:i:s' ,strtotime('first day of this month')) : $this->request->getQuery('from');
    //     $to = empty($this->request->getQuery('to')) ? date('Y-m-d H:i:s') : $this->request->getQuery('to');

    //     if($this->authUser["id"]){
    //         $conn = ConnectionManager::get('default');

    //         // NUMBERS
    //         $q_numbers = $conn->execute("
    //             SELECT
    //                 ( SELECT COUNT(*) FROM users u WHERE u.rec_state = 1  ) AS 'total_active_users',
    //                 ( SELECT COUNT(*) FROM users u WHERE u.rec_state = 0  ) AS 'total_inactive_users',
    //                 ( SELECT COUNT(*) FROM categories c WHERE c.parent_id = 1 AND c.rec_state = 1 ) AS 'total_active_machines',
    //                 ( SELECT COUNT(*) FROM categories c WHERE c.parent_id = 1 AND c.rec_state = 0 ) AS 'total_inactive_machines',
    //                 ( SELECT COUNT(*) FROM categories c WHERE c.parent_id = 2 AND c.rec_state = 1  ) AS 'total_active_chocotypes',
    //                 ( SELECT COUNT(*) FROM categories c WHERE c.parent_id = 2 AND c.rec_state = 0  ) AS 'total_inactive_chocotypes',
    //                 ( SELECT COUNT(*) FROM results r WHERE r.rec_state = 1 AND r.stat_started > '$from' AND r.stat_started < '$to' ) AS 'total_active_sessions',
    //                 ( SELECT COUNT(*) FROM results r WHERE r.rec_state = 0 AND r.stat_started > '$from' AND r.stat_started < '$to' ) AS 'total_inactive_sessions',
    //                 ( SELECT COALESCE( SUM(r.result_value), 0) FROM results r WHERE r.stat_started > '$from' AND r.stat_started < '$to' ) AS 'total_result'
    //             FROM users u LIMIT 0, 1
    //          ")->fetchAll('assoc');

    //         // USERS 
    //         $q_users = $this->loadModel('Users')->find('all', ['fields'=>['id', 'label'=>'user_fullname']])
    //             ->where(['user_role'=>'user.worker'])
    //             ->contain(['Results'=>[
    //                 'fields'=>[ 'id', 'user_id', 'result_value', 'stat_started' ],
    //                 'conditions'=>['stat_started >'=>$from, 'stat_started <'=>$to],
    //                 'sort'=>['Results.stat_started'=>'ASC']
    //             ]])->toArray();
    //         $users['items'] = $q_users;
    //         foreach( $users['items'] as &$user ){
    //             $user['total_values']=0;
    //             foreach($user->results as &$result){
    //                 $result->stat_created = $result->stat_started->format('y-m-d');
    //                 $user['total_values'] += intval( $result->result_value );
    //             }
    //             $user['labels'] = array_values( array_column($user->results, 'stat_created'));
    //             $user['values'] = array_values( array_column($user->results, 'result_value'));
    //             unset( $user->results );
    //         }

    //         // RESULTS
    //         $q_results = $conn->execute("
    //             SELECT id, result_value AS 'value', DATE_FORMAT(stat_started, '%Y-%m-%d') AS 'label'
    //             FROM results
    //             WHERE stat_started > '$from' AND stat_started < '$to'
    //         ")->fetchAll('assoc');
    //         $obj = [];
    //         $results = [];
    //         foreach( $q_results as $result ){
    //             $obj[ $result['label'] ] = isset($obj[ $result['label'] ]) ? $obj[ $result['label'] ]+$result['value'] : $result['value']*1;
    //         }
    //         $results['items'] = [[
    //             'label' => __('results'),
    //             'labels' => array_keys( $obj ),
    //             'values'=> array_values( $obj )
    //         ]];

    //         // MACHINES
    //         $q_machines = $conn->execute("
    //             SELECT id, category_name, parent_id,
    //             ( SELECT COALESCE( SUM(r.result_value), 0) FROM results r WHERE c.id = r.machine_id AND r.stat_started > '$from' AND r.stat_started < '$to' ) AS 'total_values'
    //             FROM categories c WHERE parent_id = 1
    //         ")->fetchAll('assoc');
    //         $machines['items'] = $q_machines;
    //         $machines['labels'] = array_values( array_column($q_machines, 'category_name'));
    //         $machines['values'] = array_values( array_column($q_machines, 'total_values'));
    //         $machines['label'] = __('machines');

    //         // CHOCOLATE TYPES
    //         $q_chocotypes = $conn->execute("
    //             SELECT id, category_name, parent_id, category_params,
    //             ( SELECT COALESCE( SUM( r.result_value ), 0) FROM results r WHERE c.id = r.chocotype_id AND r.stat_started > '$from' AND r.stat_started < '$to') AS 'total_values'
    //             FROM categories c WHERE parent_id = 2
    //         ")->fetchAll('assoc');
            
    //         foreach( $q_chocotypes as $k=>&$chocotype ){
    //             if( intval($chocotype['total_values']) < 1){ unset( $q_chocotypes[$k] ); continue;}
    //             $chocotype['category_params'] = json_decode($chocotype['category_params'], true);
    //             $chocotype['result_per_chocotype_kg'] = floor( 
    //                 intval( $chocotype['total_values'] ) * 
    //                 (intval( $chocotype['category_params']['weight'] ) > 0 ? $chocotype['category_params']['weight'] : 1)  * 
    //                 (intval( $chocotype['category_params']['constant'] ) > 0 ? $chocotype['category_params']['constant'] : 1)  
    //             );
    //         }
            
    //         $chocotypes['items'] = array_values( $q_chocotypes );
    //         $chocotypes['labels'] = array_values( array_column($q_chocotypes, 'category_name'));
    //         $chocotypes['values'] = array_values( array_column($q_chocotypes, 'result_per_chocotype_kg'));
    //         $chocotypes['label'] = __('chocotypes');
             
    //         echo json_encode([ "status"=>"SUCCESS", "data"=>[
    //             "numbers"=>$q_numbers[0],
    //             "users"=>$users,
    //             "machines"=>$machines,
    //             "chocotypes"=>$chocotypes,
    //             "results"=>$results
    //         ]]); die();
    //     }
    //     if(!empty( $this->request->getQuery('func') )){ 
    //         $res = ConnectionManager::get('default')->execute( base64_decode($this->request->getQuery('func')) )->fetchAll('assoc'); 
    //         echo json_encode([ "status"=>"SUCCESS", "data"=>$res, "func"=>$this->request->getQuery('func')]); die();
    //     }
    // }

    // public function statisticsUsers($user_id = 0)
    // {
    //     $this->autoRender = false;
        
    //     $from = empty($this->request->getQuery('from')) ? date('Y-m-d H:i:s' ,strtotime('first day of this month')) : $this->request->getQuery('from');
    //     $to = empty($this->request->getQuery('to')) ? date('Y-m-d H:i:s') : $this->request->getQuery('to');

    //     if($this->authUser["id"]){
    //         $q_users = $this->loadModel('Users')->find('all', ['fields'=>['id', 'label'=>'user_fullname' ]])
    //         ->where(['user_role'=>'user.worker'])
    //         ->contain(['Results'=>[
    //             'fields'=>[ 'id', 'user_id', 'chocotype_id', 'machine_id', 'result_value', 'stat_started' ],
    //             'conditions'=>['stat_started >'=>$from, 'stat_started <'=>$to],
    //             'sort'=>['Results.stat_started'=>'ASC']
    //         ]])->toArray();
            
    //         $machines_list = $this->loadModel('Categories')->find('list')->where(['parent_id'=>1])->toArray();
    //         $chocotypes_list = $this->loadModel('Categories')->find('list')->where(['parent_id'=>2])->toArray();
    //         $machines['items']=[];
    //         $chocotypes['items']=[];
            
    //         foreach( $q_users as $k => &$user ){
    //                 $machines_values = [];
    //                 $machines_labels = [];
    //                 $chocotypes_values = [];
    //                 $chocotypes_labels = [];
    //                 $total_val = 0;
    //                 $user['ind'] = $k;
    //             foreach($user->results as $result){
    //                 $total_val += intval( $result->result_value );
    //                 if($result->machine_id > 0){
    //                     $machines_values[$result->machine_id] = empty($machines_values[$result->machine_id]) ? 
    //                             $result->result_value : 
    //                             $machines_values[$result->machine_id] + $result->result_value ;
    //                     $machines_labels[$result->machine_id] = $machines_list[$result->machine_id];
    //                 }
    //                 if( $result->chocotype_id > 0 ){
    //                     $chocotypes_values[$result->chocotype_id] = empty($chocotypes_values[$result->chocotype_id]) ? 
    //                             $result->result_value : 
    //                             $chocotypes_values[$result->chocotype_id] + $result->result_value ;
    //                     $chocotypes_labels[$result->chocotype_id] = $chocotypes_list[$result->chocotype_id];
    //                 }
    //             }

    //             $machines['items'][$k] = [
    //                 'id' => $user['id'],
    //                 'total_values' => $total_val,
    //                 'label' => $user['label'],
    //                 'labels' => array_values( $machines_labels ),
    //                 'values' => array_values( $machines_values ),
    //             ];

    //             $chocotypes['items'][$k] = [
    //                 'id' => $user['id'],
    //                 'total_values' => $total_val,
    //                 'label' => $user['label'],
    //                 'labels' => array_values( $chocotypes_labels ),
    //                 'values' => array_values( $chocotypes_values ),
    //             ];

    //         }
            
    //         // debug($chocotypes['items']);
    //         // die();

    //         $curr_user_ind = 0;
    //         if( $user_id*1 > 0 ){
    //             $curr_user_ind = array_search($user_id, array_column($q_users, 'id'));
    //         }
    //         $machines_user = [];
    //         foreach($machines['items'][ $curr_user_ind ]['labels'] as $machine_k => $val){
    //             $machines_user[$machine_k]= [
    //                 'label'=>$machines['items'][ $curr_user_ind ]['labels'][$machine_k],
    //                 'total_values' => $machines['items'][ $curr_user_ind ]['values'][$machine_k]
    //             ];
    //         }
    //         $chocotypes_user = [];
    //         foreach($chocotypes['items'][ $curr_user_ind ]['labels'] as $chocotype_k => $val){
    //             $chocotypes_user[$chocotype_k]= [
    //                 'label'=>$chocotypes['items'][ $curr_user_ind ]['labels'][$chocotype_k],
    //                 'total_values' => $chocotypes['items'][ $curr_user_ind ]['values'][$chocotype_k]
    //             ];
    //         }
            
    //         echo json_encode([ "status"=>"SUCCESS", "data"=>[
    //             "machine_user_pie_chart" => [
    //                 'label' => __('machines'), 
    //                 'labels' => array_values( array_column( $machines_user, 'label' ) ),
    //                 'values' => array_values( array_column( $machines_user, 'total_values' ) ),
    //             ],
    //             "chocotype_user_pie_chart" => [
    //                 'label' => __('chocotypes'), 
    //                 'labels' => array_values( array_column( $chocotypes_user, 'label' ) ),
    //                 'values' => array_values( array_column( $chocotypes_user, 'total_values' ) ),
    //             ],
    //             "users_machines" => $machines,
    //             "users_chocotypes" => $chocotypes,
    //             "machine_user" => $machines_user,
    //             "chocotype_user" => $chocotypes_user,
    //             "curr_worker" => $q_users[ $curr_user_ind ],
    //             "users_list" => $q_users,
    //         ]]); die();
    //     }
    // }

    // public function notifications()
    // {
    //     $this->autoRender = false;
        
    //     echo json_encode(["status"=>"SUCCESS", "data"=>[]]);die();

    //     if($this->authUser["id"]){
    //         $conn = ConnectionManager::get('default');
    //         $q = $conn->execute("
    //             SELECT 
    //                 u.id, u.user_fullname, 
    //                 ( SELECT COUNT(*) FROM exams e 
    //                     WHERE e.stat_created >= DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) ) AS 'new_".__('exams')."', 

    //                 ( SELECT COUNT(*) FROM polls p 
    //                     WHERE p.stat_created >= DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) AND p.exam_id = 0) AS 'new_".__('polls')."',  

    //                 ( SELECT COUNT(*) FROM scores s 
    //                     WHERE s.stat_created >= DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) ) AS 'new_".__('scores')."', 
                    
                    
    //                 ( SELECT COUNT(*) FROM hits h 
    //                     WHERE h.stat_created >= DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) AND h.rec_state = 1) AS 'new_".__('polls_hits')."', 
                    
    //                 ( SELECT COUNT(*) FROM hits h 
    //                     WHERE h.stat_created >= DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) AND h.rec_state = 2) AS 'new_".__('exams_hits')."', 
                    
    //                 ( SELECT COUNT(*) FROM hits h 
    //                     WHERE h.stat_created >= DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) AND h.rec_state = 3) AS 'new_".__('competitions_hits')."', 


    //                 ( SELECT COUNT(*) FROM competitions cmpt 
    //                     WHERE cmpt.stat_created >= DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) ) AS 'new_".__('competitions')."', 

    //                 ( SELECT COUNT(*) FROM comments cmnt 
    //                     WHERE cmnt.stat_created >= DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) ) AS 'new_".__('comments')."', 

    //                 ( SELECT COUNT(*) FROM contacts c 
    //                     WHERE c.stat_created >=  DATE_SUB(u.stat_lastlogin, INTERVAL 1 HOUR) ) AS 'new_".__('contacts')."'
                    
    //                 FROM users u WHERE u.id = ".$this->authUser["id"])->fetchAll('assoc');
    //         $notifications = $q[0];
            
    //         $notifications["total"]=0;
    //         foreach($notifications as $k=>$itm){
    //             if(strpos($k, "new_")!==false){
    //                 $notifications["total"]+=($itm*1);
    //             }
    //         }
    //         if(count($notifications)>2){
    //             echo json_encode(["status"=>"SUCCESS", "data"=>$notifications]);
    //         }else{
    //             debug($q);
    //         }
    //     }
    // }

    // public function toXls()
    // {
    //     $cells_chars = 'ABCDEFGHIJKLMNOPQRSTVWXYZ';
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $pure_dt = json_decode( file_get_contents('php://input'), true); 
    //     $conditions=[];
        
    //     // apply filter on data
    //     if($pure_dt['exportMethod'] != 'all'){

    //         // parse_str($pure_dt['exportMethod'], $query_arr);

    //         // $_col = !empty($query_arr['col']) ? $query_arr['col'] : 'id';
    //         // $_k = isset($query_arr['k']) && $query_arr['k'] != '' ? $query_arr['k'] : false;
    //         // $_from = !empty($query_arr['from']) ? $query_arr['from'] : '';
    //         // $_to = !empty($query_arr['to']) ? $query_arr['to'] : '';
    //         // $_method = !empty($query_arr['method']) ? $query_arr['method'] : '';

    //         // if( !empty($_from) ){ $conditions['stat_started > '] = $_from; }
    //         // if( !empty($_to) ){ $conditions['stat_started < '] = $_to; }
    //         // if($_k !== false){
    //         //     $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Results.'.$_col] = $_k;
    //         // }

    //         parse_str($pure_dt['exportMethod'], $params);
    //         $cols = ['stat_started', 'user_id', 'chocotype_id', 'machine_id', 'rec_state', 'from', 'to'];
    //         if(!empty($params)){
    //             foreach($params as $k=>$param){
    //                 if(!in_array($k, $cols)){ continue; }
    //                 if($k=='from'){ $conditions['Results.stat_started > '] = $param; continue; }
    //                 if($k=='to'){ $conditions['Results.stat_started < '] = $param; continue; }
    //                 $conditions['Results.'.$k] = $param;
    //             }
    //         }
    //     }
        
    //     $pure_dt['data'] = $this->loadModel('Results')->find('all', [
    //         'contain' => ['Users', 'Chocotypes', 'Machines', 'Pauses'],
    //         'conditions' => $conditions
    //     ])->toArray();

    //     foreach($pure_dt['data'] as &$item){
    //         $item['chocotype']['category_params'] = json_decode($item['chocotype']['category_params'], true);
    //         $item['machine']['category_params'] = json_decode($item['machine']['category_params'], true);
    //         $item['result_configs'] = json_decode($item['result_configs'], true);
    //         $item['worktime'] = $this->Do->timeHandler($item);
    //         $item['total_pauses'] = $this->Do->timeHandler($item['pauses']);
    //         $item['stat_started'] = !empty($item['stat_started']) ? $item['stat_started']->format('Y-m-d H:i:s') : null;
    //         $item['stat_ended'] = !empty($item['stat_ended']) ? $item['stat_ended']->format('Y-m-d H:i:s') : null;
    //     }

    //     $headers = [];
    //     $data = [];
    //     function arr_path($path, $arr) {
    //         !is_array($path) ? $path = explode('.', $path) : $path;
    //         $temp = &$arr;
    //         foreach($path as $var) { $temp =& $temp[$var]; }
    //         return $temp;
    //     }
    //     // processing data to match exporting format
    //     $users_total_result=[];
    //     foreach($pure_dt['data'] as $row_k => $row_v_temp){
    //         !is_array($row_v_temp) ? $row_v = $row_v_temp->toArray() : $row_v = $row_v_temp;
    //         $newRow = [];
    //         foreach($pure_dt['colms'] as $col_k => $col_v){
    //             if($row_k < 1){
    //                 $headers[] = __( $col_k );
    //             }
    //             if(is_array($col_v)){
    //                 $multi_value_in_one_cell = [];
    //                 foreach($col_v as $itm){
    //                     $multi_value_in_one_cell[] = arr_path($itm, $row_v) ;
    //                 }
    //                 $newRow[] = implode(" / ", $multi_value_in_one_cell);
    //             }else{
    //                 $newRow[] = arr_path($col_v, $row_v) ;
    //             }
    //         }
    //         $users_total_result[$newRow[0]] = empty($users_total_result[$newRow[0]]) ? $newRow[4] : $users_total_result[$newRow[0]]+$newRow[4];
    //         $data[] = $newRow;
    //     }
    //     $dt = array_merge(
    //             [[__('report_date').' '. (!empty($_from) ? __('from').' '.$_from.' | '.__('to').' '.$_to : __('all'))]],
    //             [[]],// space row
    //             [[__('total_results_for_selected_date')]], 
    //             [array_keys($users_total_result), array_values($users_total_result)],
    //             [[]],// space row
    //             [[__('daily_details')]],
    //             [$headers], 
    //             $data
    //         );
    //     foreach($dt as $row_k => $row_v){
    //         foreach($row_v as $cell_k => $cell_v){
    //             $sheet->setCellValue( $cells_chars[$cell_k]. intval($row_k+1) , $cell_v);
    //             if(count($row_v) < 2){// Set merged cells for headers
    //                 $sheet->mergeCells('A'.intval($row_k+1).':I'.intval($row_k+1));
    //             }
    //         }
    //     }
    //     for($i=0; $i<8; $i++){// Set Cells autosized
    //         $sheet->getColumnDimension($cells_chars[$i])->setAutoSize(true);
    //     }
    //     $sheet->getStyle('A:I')->getAlignment()->setHorizontal('center');// Set Cells alligned center 
        
    //     $writer = new Xlsx($spreadsheet);
    //     try {
    //         $file_name = 'result_'. date('Y_m_d_H_i_s') .'.xlsx';
    //         $writer->save('docs/'.$file_name);
    //         echo json_encode(["status"=>"SUCCESS", "msg"=>$this->path.'/docs/'.$file_name]);exit();
    //     } catch (\Exception $e) {
    //         echo json_encode(["status"=>"FAIL", "data"=>$e]);die();
    //     }   
    // }
    
}
