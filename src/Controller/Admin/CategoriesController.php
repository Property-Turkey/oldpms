<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class CategoriesController extends AppController
{

    public function index($_pid = null)
    {

        if (is_numeric($_pid) && $_pid > 0) {
            $conditions['Categories.parent_id'] = $_pid;
        }

        $_tags = isset($_GET['tags']) ? $_GET['tags'] : false;
        $_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : false;
        $_parent = isset($_GET['parent']) ? $_GET['parent'] : false;


        // TAGS search result for tags
        if (!empty($_tags)) {
            $tagsCondition = [
                'parent_id' => $_parent,
                'category_name LIKE' => '%' . $_keyword . '%'
            ];

            $data = $this->Categories
                ->find('all')
                ->select(['text' => 'category_name', 'value' => 'id'])
                ->where($tagsCondition);

            echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
            die();
        }

        if ($this->request->is('post')) {

            $this->autoRender = false;


            $dt = json_decode(file_get_contents('php://input'), true);

            $_method = !empty($_GET['method']) ? $_GET['method'] : '';

            // $dt = json_decode(file_get_contents('php://input'), true);

            $_id = $this->request->getQuery('id');
            $_list = $this->request->getQuery('list');

            $_from = !empty($_GET['from']) ? $_GET['from'] : '';
            $_to = !empty($_GET['to']) ? $_GET['to'] : '';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';
            $_k = (isset($_GET['k']) && strlen($_GET['k']) > 0) ? $_GET['k'] : false;


            $_dir = !empty($_GET['direction']) ? $_GET['direction'] : 'DESC';
            $_col = !empty($_GET['col']) ? $_GET['col'] : 'id';


            $noneSearchable = ['page', 'keyword'];
            $likeFields = ['page', 'keyword'];
            $exactFields = ['category_name'];


            $conditions = [];


            if (strlen($_k . '') > 0) {
                if ($_method == 'like') {
                    $conditions[$_col . ' LIKE '] = '%' . $_k . '%';
                } else {
                    $conditions[$_col] = is_numeric($_k) ? $_k * 1 : $_k;
                }
            }

            // $_pid'yi önceden kontrol et
            if (is_numeric($_pid) && $_pid > 0) {
                $conditions['Categories.parent_id'] = $_pid;
            } elseif (is_numeric($_pid) && ($_pid = 0 || $_pid = ' ')) {
                $conditions['Categories.parent_id'] = 0;
            }


            // //Search
            if (!empty($dt['search'])) {
                foreach ($dt['search'] as $col => $val) {
                    if (empty($val)) {
                        continue;
                    }

                    if (in_array($col, $noneSearchable)) {
                        continue;
                    }

                    // $_pid'yi içeren koşulları buraya ekleyin
                    if (in_array($col, $exactFields)) {
                        $conditions['Categories.' . $col . ' LIKE '] = '%' . $val . '%';
                    }
                }
            }


            // ONE RECORD
            if (!empty($_id)) {
                $data = $this->Categories->get($_id, [
                    'contain' => []
                ])->toArray();

                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($data)], JSON_UNESCAPED_UNICODE);
                die();

            }

            // LIST
            if (!empty($_list)) {
                $data = $this->paginate($this->Categories, [
                    "order" => [$_col => $_dir],
                    "conditions" => $conditions,
                    "contain" => [
                        'ParentCategories' => ['fields' => ['category_name']]
                    ],
                ]);
            }

            // $this->paginate = [
            //     'order' => [$_col => $_dir],
            //     'conditions' => $conditions,
            //     'contain' => ['ParentCategories' => ['fields' => ['category_name']]],
            // ];

            echo json_encode([
                "status" => "SUCCESS",
                "data" => $this->Do->convertJson($data),
                "paging" => $this->request->getAttribute('paging')['Categories'],
            ], JSON_UNESCAPED_UNICODE);
            die();

        }




    }



    public function save($id = -1)
    {
        $dt = json_decode(file_get_contents('php://input'), true);
        $this->autoRender = false;
        // Edit mode
        if ($this->request->is(['patch', 'put'])) {
            $rec = $this->Categories->get($dt['id']);
            $dt['icon'] = json_encode(!empty($dt['category_configs']) ? $dt['category_configs'] : ['icon' => '', 'isProtected' => '']);

            $rec = $this->Categories->patchEntity($rec, $dt);
        }

        // Add mode
        if ($this->request->is(['post'])) {
            $dt['id'] = null;
            $dt['stat_created'] = date('Y-m-d H:i:s');
            $dt['icon'] = json_encode(!empty($dt['category_configs']) ? $dt['category_configs'] : ['icon' => '', 'isProtected' => '']);

            $rec = $this->Categories->newEntity($dt);
        }

        if ($this->request->is(['post', 'patch', 'put'])) {
            


            if ($newRec = $this->Categories->save($rec)) {
                echo json_encode(["status" => "SUCCESS", "data" => $this->Do->convertJson($newRec)]);
                die();
            }

            echo json_encode(["status" => "FAIL", "data" => $rec->getErrors()]);
            die();
        }
    }


    public function delete($id = null)
    {

        if (!$id) {
            echo json_encode(["status" => "FAIL", "msg" => __("is-selected-empty-msg"), "data" => []]);
            die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender = false;

        if (!$this->_isAuthorized(true)) {
            echo json_encode(["status" => "FAIL", "msg" => __("no-auth"), "data" => []]);
            die();
        }



        $delRec = $this->Categories->deleteAll(['id IN ' => explode(",", $id)]);

        if ($delRec) {
            $res = ["status" => "SUCCESS", "data" => $delRec];
        } else {
            $res = ["status" => "FAIL", "data" => $delRec->getErrors()];
        }
        echo json_encode($res);
        die();

        // return $this->redirect(['action' => 'index']);

    }


    public function enable($val = 1, $ids = null)
    {
        if (!$ids) {
            echo json_encode(["status" => "FAIL", "msg" => __("is-selected-empty-msg"), "data" => []]);
            die();
        }
        $this->request->allowMethod(['post', 'delete']);
        $this->autoRender = false;
        if (!$this->_isAuthorized(true)) {
            echo json_encode(["status" => "FAIL", "msg" => __("no-auth"), "data" => []]);
            die();
        }
        $records = json_decode(file_get_contents('php://input'), true);
        $errors = [];
        foreach ($records as $rec) {
            if (!is_numeric($rec)) {
                continue;
            }
            $dt = $this->Categories->newEmptyEntity();
            ;
            $dt["id"] = $rec;
            $dt["rec_state"] = $val;
            if (!$this->Categories->save($dt)) {
                $errors[] = $dt->getErrors();
            }
        }

        if (empty($errors)) {
            $res = ["status" => "SUCCESS", "data" => $dt];
        } else {
            $res = ["status" => "FAIL", "data" => $dt->getErrors()];
        }
        echo json_encode($res);
        die();

    }


    // public function enable($ids = null)
    // {
    //     if (!$ids) {
    //         echo json_encode(["status" => "FAIL", "msg" => __("is-selected-empty-msg"), "data" => []]);
    //         die();
    //     }
    //     $this->request->allowMethod(['post', 'delete']);
    //     $this->autoRender = false;
    //     if (!$this->_isAuthorized(true)) {
    //         echo json_encode(["status" => "FAIL", "msg" => __("no-auth"), "data" => []]);
    //         die();
    //     }
    //     $records = json_decode(file_get_contents('php://input'), true);
    //     $errors = [];
    //     foreach ($records as $rec) {
    //         if (!is_numeric($rec)) {
    //             continue;
    //         }
    //         $dt = $this->Categories->newEmptyEntity();
    //         ;
    //         $dt["id"] = $rec;
    //         if (!$this->Categories->save($dt)) {
    //             $errors[] = $dt->getErrors();
    //         }
    //     }

    //     if (empty($errors)) {
    //         $res = ["status" => "SUCCESS", "data" => $dt];
    //     } else {
    //         $res = ["status" => "FAIL", "data" => $dt->getErrors()];
    //     }
    //     echo json_encode($res);
    //     die();

    // }

}
