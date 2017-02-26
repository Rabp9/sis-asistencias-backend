<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Condiciones Controller
 *
 * @property \App\Model\Table\CondicionesTable $Condiciones
 */
class CondicionesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->viewBuilder()->layout(false);
        $condiciones = $this->Condiciones->find()
            ->where(['Condiciones.estado_id' => 1]);

        $this->set(compact('condiciones'));
        $this->set('_serialize', ['condiciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Condicione id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $condicione = $this->Condiciones->get($id, [
            'contain' => ['Estados']
        ]);

        $this->set('condicione', $condicione);
        $this->set('_serialize', ['condicione']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $condicione = $this->Condiciones->newEntity();
        if ($this->request->is('post')) {
            $condicione = $this->Condiciones->patchEntity($condicione, $this->request->getData());
            if ($this->Condiciones->save($condicione)) {
                $this->Flash->success(__('The condicione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condicione could not be saved. Please, try again.'));
        }
        $estados = $this->Condiciones->Estados->find('list', ['limit' => 200]);
        $this->set(compact('condicione', 'estados'));
        $this->set('_serialize', ['condicione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Condicione id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $condicione = $this->Condiciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $condicione = $this->Condiciones->patchEntity($condicione, $this->request->getData());
            if ($this->Condiciones->save($condicione)) {
                $this->Flash->success(__('The condicione has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The condicione could not be saved. Please, try again.'));
        }
        $estados = $this->Condiciones->Estados->find('list', ['limit' => 200]);
        $this->set(compact('condicione', 'estados'));
        $this->set('_serialize', ['condicione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Condicione id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $condicione = $this->Condiciones->get($id);
        if ($this->Condiciones->delete($condicione)) {
            $this->Flash->success(__('The condicione has been deleted.'));
        } else {
            $this->Flash->error(__('The condicione could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
