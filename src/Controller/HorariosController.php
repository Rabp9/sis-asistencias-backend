<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Horarios Controller
 *
 * @property \App\Model\Table\HorariosTable $Horarios
 */
class HorariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->viewBuilder()->layout(false);
        
        $horarios = $this->Horarios->find()
            ->where(['Horarios.estado_id' => 1])->toArray();
        
        $this->set(compact('horarios'));
        $this->set('_serialize', ['horarios']);
    }


    /**
     * View method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $horario = $this->Horarios->get($id);

        $this->set(compact('horario'));
        $this->set('_serialize', ['horario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->layout(false);
        $horario = $this->Horarios->newEntity();
        $horario->estado_id = 1;
        if ($this->request->is('post')) {
            $horario = $this->Horarios->patchEntity($horario, $this->request->getData());
            if ($this->Horarios->save($horario)) {
                $message = [
                    'type' => 'success',
                    'text' => __('Se registro correctamente el horario'),
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'text' => __('No fue posible registrar el horario'),
                ];
            }
        }
        $this->set(compact('horario', 'message'));
        $this->set('_serialize', ['horario', 'message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $horario = $this->Horarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $horario = $this->Horarios->patchEntity($horario, $this->request->getData());
            if ($this->Horarios->save($horario)) {
                $this->Flash->success(__('The horario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The horario could not be saved. Please, try again.'));
        }
        $estados = $this->Horarios->Estados->find('list', ['limit' => 200]);
        $this->set(compact('horario', 'estados'));
        $this->set('_serialize', ['horario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $horario = $this->Horarios->get($id);
        if ($this->Horarios->delete($horario)) {
            $this->Flash->success(__('The horario has been deleted.'));
        } else {
            $this->Flash->error(__('The horario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
