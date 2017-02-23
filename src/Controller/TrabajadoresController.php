<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trabajadores Controller
 *
 * @property \App\Model\Table\TrabajadoresTable $Trabajadores
 */
class TrabajadoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $trabajadores = $this->Trabajadores->find();
        
        $this->set(compact('trabajadores'));
        $this->set('_serialize', ['trabajadores']);
    }

    /**
     * View method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trabajadore = $this->Trabajadores->get($id, [
            'contain' => []
        ]);

        $this->set('trabajadore', $trabajadore);
        $this->set('_serialize', ['trabajadore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trabajadore = $this->Trabajadores->newEntity();
        if ($this->request->is('post')) {
            $trabajadore = $this->Trabajadores->patchEntity($trabajadore, $this->request->getData());
            if ($this->Trabajadores->save($trabajadore)) {
                $this->Flash->success(__('The trabajadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trabajadore could not be saved. Please, try again.'));
        }
        $this->set(compact('trabajadore'));
        $this->set('_serialize', ['trabajadore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trabajadore = $this->Trabajadores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trabajadore = $this->Trabajadores->patchEntity($trabajadore, $this->request->getData());
            if ($this->Trabajadores->save($trabajadore)) {
                $this->Flash->success(__('The trabajadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trabajadore could not be saved. Please, try again.'));
        }
        $this->set(compact('trabajadore'));
        $this->set('_serialize', ['trabajadore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trabajadore = $this->Trabajadores->get($id);
        if ($this->Trabajadores->delete($trabajadore)) {
            $this->Flash->success(__('The trabajadore has been deleted.'));
        } else {
            $this->Flash->error(__('The trabajadore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
