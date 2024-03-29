<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class DevelopersController extends AppController
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

            $_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    
            
            if( !empty($_from) ){ $conditions['Developers.stat_created > '] = $_from; }
            if( !empty($_to) ){ $conditions['Developers.stat_created < '] = $_to; }
            if($_k !== false){
                $_method == 'like' ?  $conditions[$_col.' LIKE '] = '%'.$_k.'%' : $conditions['Developers.'.$_col] = $_k;
            }
            
            $data=[];
            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');
            $_selectList = $this->request->getQuery('selectList');

            // ONE RECORD
            if(!empty($_id)){
                $data = $this->Developers->get( $_id )->toArray();
                $data = $this->Do->convertJson($data);
                echo json_encode( 
                    [ "status"=>"SUCCESS",  "data"=>$data], 
                    JSON_UNESCAPED_UNICODE); die();
            }

            // LIST
            if(!empty($_list)){ 

                $queryParams = $this->getRequest()->getQueryParams();
                $queryParams['page'] = $_page;
                $this->setRequest($this->getRequest()->withQueryParams($queryParams));

                $data = $this->paginate($this->Developers, [
                    "order"=>[ $_col => $_dir ],
                    "conditions"=>$conditions,
                ]);
                $data = $this->Do->convertJson($data);
            }

            // Select LIST
            if(!empty($_selectList)){
                $data = $this->Developers->find('list');
                echo json_encode( [ "status"=>"SUCCESS",  "data"=>[], "developers_list"=>$data], 
                    JSON_UNESCAPED_UNICODE); die();
            }


            echo json_encode( 
                [ 
                    "status"=>"SUCCESS",  
                    "data"=>$this->Do->convertJson( $data ), 
                    "paging" => $this->request->getAttribute('paging')['Developers'],

                ], 
                JSON_UNESCAPED_UNICODE); die();
            
        }

    }

    public function view($id = null)
    {
        $rec = $this->Developers->get( $id );
        $this->set(compact('rec'));
    }

    public function save($id = -1) 
    {
        
        $dt = json_decode( file_get_contents('php://input'), true);
        

        // edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Developers->get($dt['id']);
            $oldEmail = $rec->email;
        }

        // add mode
        if ($this->request->is(['post'])) {
            $rec = $this->Developers->newEmptyEntity();
            $dt['id'] = null;
            $dt['stat_updated'] = date('Y-m-d H:i:s');
            $dt['stat_created'] = date('Y-m-d H:i:s');
        }
        
        if ($this->request->is(['post', 'patch', 'put'])) {
            
            $this->autoRender  = false;
            if(empty($dt['dev_configs']['mobile'])){
                $rec->setErrors(['dev_configs[mobile]'=>['_required'=>__('error_empty')]]);
            }
            $dt['dev_configs'] = json_encode($dt['dev_configs'], JSON_UNESCAPED_UNICODE);
            $rec = $this->Developers->patchEntity($rec, $dt);
            if ($newRec = $this->Developers->save($rec)) {
                echo json_encode(["status"=>"SUCCESS", "data"=>$newRec]); die();
            }

            echo json_encode(["status"=>"FAIL", "data"=>$rec->getErrors()]); die();
        }
    }

	public function delimage() 
    {
        $this->request->allowMethod(['delete']);
        $ctrl = $this->request->getParam('controller');
        $this->autoRender  = false;
        $dt = json_decode( file_get_contents('php://input'), true);
        

		if( $this->Images->deleteFile('img/'.strtolower( $ctrl ).'_photos', $dt['image'])){
            $rec = $this->$ctrl->get($dt['id']);
            
			$imgsArray = explode(",", $rec->developer_photos);
            $key = array_search($dt['image'], $imgsArray);
			unset($imgsArray[$key]);
			$update = ["id"=>$dt['id'], "developer_photos"=>implode(",",$imgsArray)];
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
            $rec = $this->Developers->get($rec_id);
            $delRec[$k] = $this->Developers->delete($rec);
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
            $rec = $this->Developers->newEmptyEntity();
            $rec['id'] = $id;
            $rec['rec_state'] = $val;
            $updateRec[$k] = $this->Developers->save($rec);
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