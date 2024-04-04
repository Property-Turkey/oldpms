<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ImgController Controller
 *
 * @method \App\Model\Entity\ImgController[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImgControllerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $imgController = $this->paginate($this->ImgController);

        $this->set(compact('imgController'));
    }

    /**
     * View method
     *
     * @param string|null $id Img Controller id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imgController = $this->ImgController->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('imgController'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imgController = $this->ImgController->newEmptyEntity();
        if ($this->request->is('post')) {
            $imgController = $this->ImgController->patchEntity($imgController, $this->request->getData());
            if ($this->ImgController->save($imgController)) {
                $this->Flash->success(__('The img controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The img controller could not be saved. Please, try again.'));
        }
        $this->set(compact('imgController'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Img Controller id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imgController = $this->ImgController->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imgController = $this->ImgController->patchEntity($imgController, $this->request->getData());
            if ($this->ImgController->save($imgController)) {
                $this->Flash->success(__('The img controller has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The img controller could not be saved. Please, try again.'));
        }
        $this->set(compact('imgController'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Img Controller id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imgController = $this->ImgController->get($id);
        if ($this->ImgController->delete($imgController)) {
            $this->Flash->success(__('The img controller has been deleted.'));
        } else {
            $this->Flash->error(__('The img controller could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
