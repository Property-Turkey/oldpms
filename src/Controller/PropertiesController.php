<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;


class PropertiesController extends AppController
{
    

    public function proposal($id = null)
    {
        $id = str_replace($this->Do->get('salt'), '', base64_decode($id));
        
        $rec = $this->Do->convertJson( $this->Properties->get(  $id, [
            // 'contain'=>[
            //     'Users'=>['fields'=>['Users.id', 'Users.user_fullname', 'Users.user_configs']], 
            //     'Users.Offices'=>['fields'=>['Offices.id', 'Offices.office_name']], 
            //     'Projects'=>['fields'=>['Projects.id', 'Projects.project_title', 'Projects.project_ref', 'Projects.features_ids', 'Projects.project_photos', 'Projects.project_desc']], 
            //     'Sellers'=>['fields'=>['Sellers.id', 'Sellers.seller_name', 'Sellers.seller_type', 'Sellers.seller_configs']], 
            //     'Developers'=>['fields'=>['Developers.id', 'Developers.dev_name', 'Developers.dev_configs']], 
            // ]
        ] ));
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
        $this->set(compact('rec'));
    }

    function beforeFilter(EventInterface $event) 
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow(['proposal']);
    }


}
