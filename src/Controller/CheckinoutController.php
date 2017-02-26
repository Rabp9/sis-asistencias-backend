<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Checkinout Controller
 *
 * @property \App\Model\Table\CheckinoutTable $Checkinout
 */
class CheckinoutController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $checkinout = $this->paginate($this->Checkinout);

        $this->set(compact('checkinout'));
        $this->set('_serialize', ['checkinout']);
    }

    /**
     * View method
     *
     * @param string|null $id Checkinout id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $checkinout = $this->Checkinout->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('checkinout', $checkinout);
        $this->set('_serialize', ['checkinout']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $checkinout = $this->Checkinout->newEntity();
        if ($this->request->is('post')) {
            $checkinout = $this->Checkinout->patchEntity($checkinout, $this->request->getData());
            if ($this->Checkinout->save($checkinout)) {
                $this->Flash->success(__('The checkinout has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The checkinout could not be saved. Please, try again.'));
        }
        $users = $this->Checkinout->Users->find('list', ['limit' => 200]);
        $this->set(compact('checkinout', 'users'));
        $this->set('_serialize', ['checkinout']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Checkinout id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $checkinout = $this->Checkinout->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $checkinout = $this->Checkinout->patchEntity($checkinout, $this->request->getData());
            if ($this->Checkinout->save($checkinout)) {
                $this->Flash->success(__('The checkinout has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The checkinout could not be saved. Please, try again.'));
        }
        $users = $this->Checkinout->Users->find('list', ['limit' => 200]);
        $this->set(compact('checkinout', 'users'));
        $this->set('_serialize', ['checkinout']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Checkinout id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $checkinout = $this->Checkinout->get($id);
        if ($this->Checkinout->delete($checkinout)) {
            $this->Flash->success(__('The checkinout has been deleted.'));
        } else {
            $this->Flash->error(__('The checkinout could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
