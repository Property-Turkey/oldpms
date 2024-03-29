<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;


class ProposalsController extends AppController
{
    

    public function proposal($id = null, $tbl = null, $floorplan_id = -1)
    {
        if( $floorplan_id < 1 ){
            $rec = $this->Do->convertJson( $this->Proposals->get(  $id, [
                'contain'=>['Properties']
            ] ));
            // photos for slider
            if(!empty( $rec['property']['property_photos'] )){
                $rec['property']['property_photos_names'] = array_values(array_column( ( $rec['property']['property_photos'] ) , 'name'));
            }
            
        }else{
            $rec = $this->Do->convertJson( $this->Proposals->get(  $id, [
                'contain'=>['Projects.Floorplans'=>['conditions'=>['Floorplans.id' => $floorplan_id]] ]
            ] ));
        }
        
        if($rec){
            $history = [
                'tar_id'=>$rec['id'],
                'tbl_tar'=>2,
                'history_country'=>$this->Do->getCountryByIP( env('REMOTE_ADDR'), 'country_name' ),
                'history_ip'=>env('REMOTE_ADDR'),
                'history_lang'=>$this->Do->getMachineLang(),
            ];
            $this->Do->adder( $history, 'Histories' );
        }

        // $rec = $this->Do->convertJson($rec);
        
        $this->set(compact('rec'));
    }

    function beforeFilter(EventInterface $event) 
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['proposal']);
    }


}
