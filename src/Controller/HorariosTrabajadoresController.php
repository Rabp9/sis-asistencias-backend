<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HorariosTrabajadores Controller
 *
 * @property \App\Model\Table\HorariosTrabajadoresTable $HorariosTrabajadores
 */
class HorariosTrabajadoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Horarios', 'Estados']
        ];
        $horariosTrabajadores = $this->paginate($this->HorariosTrabajadores);

        $this->set(compact('horariosTrabajadores'));
        $this->set('_serialize', ['horariosTrabajadores']);
    }

    /**
     * View method
     *
     * @param string|null $id Horarios Trabajadore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $horariosTrabajadore = $this->HorariosTrabajadores->get($id, [
            'contain' => ['Horarios', 'Estados']
        ]);

        $this->set('horariosTrabajadore', $horariosTrabajadore);
        $this->set('_serialize', ['horariosTrabajadore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->layout(false);
        $horariosTrabajador = $this->HorariosTrabajadores->newEntity();
        $horariosTrabajador->estado_id = 1;
        if ($this->request->is('post')) {
            $horariosTrabajador = $this->HorariosTrabajadores->patchEntity($horariosTrabajador, $this->request->getData());
            if ($this->HorariosTrabajadores->save($horariosTrabajador)) {
                $horariosTrabajador = $this->HorariosTrabajadores->get($horariosTrabajador->id, [
                    'contain' => ['Horarios']
                ]);
                $message = [
                    'type' => 'success',
                    'text' => __('Se asignado correctamente el horario'),
                ];
            } else {
                $message = [
                    'type' => 'error',
                    'text' => __('No fue posible asignar el horario'),
                ];
            }
        }
        $this->set(compact('horariosTrabajador', 'message'));
        $this->set('_serialize', ['horariosTrabajador', 'message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Horarios Trabajadore id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $horariosTrabajadore = $this->HorariosTrabajadores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $horariosTrabajadore = $this->HorariosTrabajadores->patchEntity($horariosTrabajadore, $this->request->getData());
            if ($this->HorariosTrabajadores->save($horariosTrabajadore)) {
                $this->Flash->success(__('The horarios trabajadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The horarios trabajadore could not be saved. Please, try again.'));
        }
        $horarios = $this->HorariosTrabajadores->Horarios->find('list', ['limit' => 200]);
        $estados = $this->HorariosTrabajadores->Estados->find('list', ['limit' => 200]);
        $this->set(compact('horariosTrabajadore', 'horarios', 'estados'));
        $this->set('_serialize', ['horariosTrabajadore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Horarios Trabajadore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $horariosTrabajadore = $this->HorariosTrabajadores->get($id);
        if ($this->HorariosTrabajadores->delete($horariosTrabajadore)) {
            $this->Flash->success(__('The horarios trabajadore has been deleted.'));
        } else {
            $this->Flash->error(__('The horarios trabajadore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
