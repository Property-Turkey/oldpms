<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
// use Cake\Datasource\ConnectionManager;

class UsersController extends AppController
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
    
            
            if( !empty($_from) ){ $conditions['Users.stat_created > '] = $_from; }
            if( !empty($_to) ){ $conditions['Users.stat_created < '] = $_to; }
            if($_k !== false){
                $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Users.'.$_col] = $_k;
            }
            
            $data=[];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');

            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Users->get( $_id )->toArray();
               
                echo json_encode(["status"=>"SUCCESS",  "data"=>$this->Do->convertJson( $data )], JSON_UNESCAPED_UNICODE); die();
            }

            // LIST
            if(!empty($_list)){ 
                $data = $this->paginate($this->Users, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                ]);
            }


            echo json_encode( 
                [ 
                    "status"=>"SUCCESS",  
                    "data"=>$this->Do->convertJson( $data ), 
                    // "paging"=>$this->Paginator->getPagingParams()["Properties"]
                    "paging" => $this->request->getAttribute('paging')['Users'],

                ], 
                JSON_UNESCAPED_UNICODE); die();


        }

        // $offices=$this->Users->Offices->find('list');
        // $this->set(compact('offices'));
    }

    public function view($id = null)
    {
        $rec = $this->Users->get($id);
        $this->set(compact('rec'));
    }

    public function myaccount($id = -1) 
    {
    }

    public function save($id = -1) 
    {
        $dt = json_decode( file_get_contents('php://input'), true);

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Users->get($dt['id']);
            $oldEmail = $rec->email;
        }

        // add mode
        if ($this->request->is(['post'])) {
            $rec = $this->Users->newEmptyEntity();
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
        }
        if ($this->request->is(['post', 'patch', 'put'])) {
            
            $this->autoRender  = false;

            $dt['user_configs'] = json_encode($dt['user_configs']);
            
            $rec = $this->Users->patchEntity($rec, $dt);
            unset($rec['office']);
            if ($newRec = $this->Users->save($rec)) {
                // send activation email in case email change or new account created
                if(!$dt['id'] || strtolower(trim($newRec->email)) != strtolower(trim($oldEmail))){
                    $this->Do->sendEmail([$newRec->email], __('new_account'), $newRec, 'register_tm');
                } 
                echo json_encode(["status"=>"SUCCESS", "data"=>$newRec]);
                die();
            }

            echo json_encode(["status"=>"FAIL", "data"=>$rec->getErrors()]); die();
        }

        // $offices=$this->Users->Offices->find('list');
        // $this->set(compact('offices'));
    }

	public function delimage() 
    {
        $this->request->allowMethod(['delete']);
        $ctrl = $this->request->getParam('controller');
        $this->autoRender  = false;
        $dt = json_decode( file_get_contents('php://input'), true);
        

		if( $this->Images->deleteFile('img/'.strtolower( $ctrl ).'_photos', $dt['image'])){
            $rec = $this->$ctrl->get($dt['id']);
            
			$imgsArray = explode(",", $rec->user_photos);
            $key = array_search($dt['image'], $imgsArray);
			unset($imgsArray[$key]);
			$update = ["id"=>$dt['id'], "user_photos"=>implode(",",$imgsArray)];
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

        $delRec=[];
        foreach(explode(",", $id) as $k=>$rec_id){
            $rec = $this->Users->get($rec_id);
            $delRec[$k] = $this->Users->delete($rec);
        }
        
        $res = (!empty(array_filter($delRec))) ? ["status"=>"SUCCESS", "data"=>$delRec] : ["status"=>"FAIL", "data"=>$delRec];

        echo json_encode($res);die();

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
            $rec = $this->Users->newEmptyEntity();
            $rec['id'] = $id;
            $rec['rec_state'] = $val;
            $updateRec[$k] = $this->Users->save($rec);
        }
        
        $res = (!empty(array_filter($updateRec))) ? ["status"=>"SUCCESS", "data"=>$updateRec] : ["status"=>"FAIL", "data"=>$updateRec];

        echo json_encode($res);die();
    }
    
    public function dashboard()
    {
        if ($this->request->is(['post'])) {
            
            $this->autoRender = false;
            echo json_encode([ "status"=>"SUCCESS", "data"=>[
                    'stats' => $this->statistics(), 
                    'notifications'=>$this->notifications()
                ] 
            ]); die();

        }
    }

    private function statistics()
{
    if ($this->authUser["id"]) {
        $Users = $this->getTableLocator()->get('Users');
        $Properties = $this->getTableLocator()->get('Properties');
        $Projects = $this->getTableLocator()->get('Projects');
        $Developers = $this->getTableLocator()->get('Developers');

        // NUMBERS
        $q_numbers = [
            'total_disabled_users' => $Users->find('all')->where(['rec_state' => 0])->count(),
            'total_enabled_users' => $Users->find('all')->where(['rec_state' => 1])->count(),
            'total_inactive_properties' => $Properties->find('all')->where(['language_id' => $this->currlangid, 'rec_state' => 0])->count(),
            'total_active_properties' => $Properties->find('all')->where(['language_id' => $this->currlangid, 'rec_state' => 1])->count(),
            'total_inactive_projects' => $Projects->find('all')->where(['rec_state' => 0])->count(),
            'total_active_projects' => $Projects->find('all')->where(['rec_state' => 1])->count(),
            'total_developers' => $Developers->find('all')->count(),
        ];

        // USERS 
        $q_users = $Users->find('all', [
            'fields' => ['id', 'label' => 'user_fullname', 'user_role', 'stat_logins']
        ])->toArray();

        $users = ['items' => $q_users, 'labels' => [], 'values' => []];
        $logins = ['items' => $q_users, 'labels' => [], 'values' => []];

        foreach ($users['items'] as &$user) {
            $users['labels'][$user['user_role']] = __(empty($user['user_role']) ? '' : $user['user_role']);
            $users['values'][$user['user_role']] = isset($users['values'][$user['user_role']]) ? $users['values'][$user['user_role']] + 1 : 1;
            $user['total_values'][$user['user_role']] = isset($user['total_values'][$user['user_role']]) ? $user['total_values'][$user['user_role']] + 1 : 1;
        }

        $users['labels'] = array_values($users['labels']);
        $users['values'] = array_values($users['values']);

        foreach ($logins['items'] as $login) {
            $logins['labels'][] = $login['label'];
            $logins['values'][] = $login['stat_logins'];
        }

        // PROPS PRICES
        // $currCurrency = $this->Do->get('currencies')[$this->currCurrency];
        // $currCurrency_icon = $this->Do->get('currencies_icons')[$this->currCurrency];
        // $block = floor($this->Do->currencyConverter("TRY", $currCurrency, 500000));
        $prop_prices_q = $Properties->find('all', [
            'conditions' => ['property_price >' => 0],
            'fields' => ['id', 'property_price', 'property_currency']
        ])->toArray();

        $prices = ['items' => [], 'values' => [], 'labels' => []];
        foreach ($prop_prices_q as &$itm) {
            $from = $this->Do->get('currencies')[empty($itm->property_currency) ? 3 : $itm->property_currency];
            // $itm->converted_price = floor($this->Do->currencyConverter($from, $currCurrency, $itm->property_price));
            // $range_num = floor($itm->converted_price / $block);
            // $prices['values'][$range_num] = isset($prices['values'][$range_num]) ? $prices['values'][$range_num] + 1 : 1;
        }
        arsort($prices['values']);
        foreach ($prices['values'] as $k => $v) {
            // $prices['labels'][$k] = $currCurrency_icon . ($block * ($k - 1)) . ' - ' . $currCurrency_icon . ($block * ($k)) . ' ' . $currCurrency;
        }

        $prices['values'] = array_values($prices['values']);
        $prices['labels'] = array_values($prices['labels']);

        return [
            "numbers" => $q_numbers,
            "users" => $users,
            "logins" => $logins,
            "prices" => $prices,
        ];
    } else {
        return [];
    }
}


    private function notifications()
    {

        if($this->authUser["id"]){
            
            $lastlogin = $this->authUser['stat_lastlogin'];

            $Properties = $this->getTableLocator()->get('Properties');
            $Projects = $this->getTableLocator()->get('Projects');
            // $UserProperty = $this->getTableLocator()->get('UserProperty');
            // $UserProject = $this->getTableLocator()->get('UserProject');

            // SYSTEM ADMIN 
            if(in_array( $this->authUser['user_role'], ['admin.admin', 'admin.root'])){
                $q=[
                    'new_properties' => $Properties->find('all')
                        ->where(['stat_created >=' => $lastlogin, 'language_id'=>$this->currlangid])->count(),
                    'new_projects' => $Projects->find('all')
                        ->where(['stat_created >=' => $lastlogin])->count(),
                    'new_outdated_properties' => $Properties->find('all')
                        ->where(['stat_updated <=' => $this->outdatedContent, 'language_id'=>$this->currlangid])->count(),
                    'new_outdated_projects' => $Projects->find('all')
                        ->where(['stat_updated <=' => $this->outdatedContent])->count(),
                ];
            }

            // PORTFOLIO OWNER
            if(in_array( $this->authUser['user_role'], ['admin.portfolio', 'admin.callcenter'])){
                $q=[
                    'new_outdated_properties' => $Properties->find('all')
                        ->where(['stat_updated <=' => $this->outdatedContent, 'user_id'=>$this->authUser['id'], 'language_id'=>$this->currlangid])->count(),
                    'new_outdated_projects' => $Projects->find('all')
                        ->where(['stat_updated <=' => $this->outdatedContent, 'user_id'=>$this->authUser['id']])->count(),
                ];
            }

            // SUPERVISOR
            if(in_array( $this->authUser['user_role'], ['admin.supervisor'])){
                $office_members_ids = $this->getTableLocator()->get('Users')->find('list', ['conditions'=>[
                    'office_id' => $this->authUser['office_id'],
                ]])->toArray();
                $q=[
                    'new_outdated_properties' => $Properties->find('all')
                        ->where(['stat_updated <=' => $this->outdatedContent, 'user_id IN '=>array_keys( $office_members_ids ), 'language_id'=>$this->currlangid])->count(),
                    'new_outdated_projects' => $Projects->find('all')
                        ->where(['stat_updated <=' => $this->outdatedContent, 'user_id IN '=>array_keys( $office_members_ids )])->count(),
                ];
            }
            
            // CONTENT
            // if(in_array( $this->authUser['user_role'], ['admin.content'])){
            //     $q=[
            //         // 'new_properties' => $UserProperty->find('all')
            //         //     ->where(['user_id'=>$this->authUser['id'], 'rec_state' => 1, 'language_id'=>$this->currlangid])->count(),
            //         'new_projects' => $UserProject->find('all')
            //             ->where(['user_id'=>$this->authUser['id'], 'rec_state' => 1])->count(),
            //     ];
            // }
            return $q;
        }else{
            return [];
        }
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