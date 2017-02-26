<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\FrozenDate;
use Cake\ORM\TableRegistry;

/**
 * Registros Controller
 *
 * @property \App\Model\Table\RegistrosTable $Registros
 */
class RegistrosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Condiciones']
        ];
        $registros = $this->paginate($this->Registros);

        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);
    }

    /**
     * View method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registro = $this->Registros->get($id, [
            'contain' => ['Condiciones']
        ]);

        $this->set('registro', $registro);
        $this->set('_serialize', ['registro']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registro = $this->Registros->newEntity();
        if ($this->request->is('post')) {
            $registro = $this->Registros->patchEntity($registro, $this->request->getData());
            if ($this->Registros->save($registro)) {
                $this->Flash->success(__('The registro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro could not be saved. Please, try again.'));
        }
        $condiciones = $this->Registros->Condiciones->find('list', ['limit' => 200]);
        $this->set(compact('registro', 'condiciones'));
        $this->set('_serialize', ['registro']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registro = $this->Registros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registro = $this->Registros->patchEntity($registro, $this->request->getData());
            if ($this->Registros->save($registro)) {
                $this->Flash->success(__('The registro has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registro could not be saved. Please, try again.'));
        }
        $condiciones = $this->Registros->Condiciones->find('list', ['limit' => 200]);
        $this->set(compact('registro', 'condiciones'));
        $this->set('_serialize', ['registro']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registro = $this->Registros->get($id);
        if ($this->Registros->delete($registro)) {
            $this->Flash->success(__('The registro has been deleted.'));
        } else {
            $this->Flash->error(__('The registro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /**
     * GgtByTrabajadorAndFechas method
     *
     * @param string|null $id Registro id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function getByTrabajadorAndFechas() {
        $this->viewBuilder()->layout(false);
        
        $trabajador_dni = $this->request->param('trabajador_dni');
        $fechaInicio = $this->request->param('fechaInicio');
        $fechaFin = $this->request->param('fechaFin');
        $registros = [];
        $fechas = [];
        
        // Crear array de fechas en intervalo
        $fechaAux = new FrozenDate($fechaInicio);
        $fechaFin = new FrozenDate($fechaFin);
        $fechaFin = $fechaFin->modify('+ 1 day');
        while ($fechaFin != $fechaAux) {
            $fechas[] = $fechaAux;
            $fechaAux = $fechaAux->modify('+ 1 day');
        }
        // Eliminar sàbados y domingos
        $fechas = array_filter($fechas, function($fecha) {
            return !in_array($fecha->format('w'), [6, 0]);
        });
        $usersTable = TableRegistry::get('Users');
        
        foreach ($fechas as $fecha) {
            $registro = $this->Registros->find()
                ->where([
                    'Registros.trabajador_dni' => $trabajador_dni,
                    'Registros.fecha' => $fecha->format('Y-m-d')
                ])->first();
            
            $asistencia = $this->Registros->Condiciones->find()
                ->where(['Condiciones.descripcion' => 'Asistencia'])
                ->first();
            
            $inasistencia = $this->Registros->Condiciones->find()
                ->where(['Condiciones.descripcion' => 'Inasistencia Injustificada'])
                ->first();
            
            $tardanza = $this->Registros->Condiciones->find()
                ->where(['Condiciones.descripcion' => 'Tardanza'])
                ->first();
            
            if (!$registro) {
                $registro = $this->Registros->newEntity();
                $registro->trabajador_dni = $trabajador_dni;
                $registro->fecha = $fecha;
                
                $trabajador = $this->Registros->Trabajadores->find()
                    ->where(['Trabajadores.dni' => $trabajador_dni])
                    ->contain(['Horarios_Trabajadores.Horarios'])
                    ->first();
                
                $registro->horario_hora_in = $trabajador->horariosTrabajador->horario->horaInicio;
                $registro->horario_hora_out = $trabajador->horariosTrabajador->horario->horaFin;
                
                // Get hora_in and hora_out
                $user = $usersTable->find()
                    ->where(['Users.dni' => $trabajador_dni])
                    ->first();
                
                $chekIn = $usersTable->Checkinout->find()
                    ->where([
                        'Checkinout.user_id' => $user->id,
                        'CAST(Checkinout.checktime AS DATE) =' => $fecha->format('Y-m-d'),
                        'Checkinout.tipo' => 'I'
                    ])
                    ->first();
                
                $chekOut = $usersTable->Checkinout->find()
                    ->where([
                        'Checkinout.user_id' => $user->id,
                        'CAST(Checkinout.checktime AS DATE) =' => $fecha->format('Y-m-d'),
                        'Checkinout.tipo' => 'O'
                    ])
                    ->first();
                
                if ($chekIn) {
                    $registro->hora_in = $chekIn->checktime->format('H:i:s');
                    
                    if ($registro->hora_in <= $registro->horario_hora_in) {
                        $registro->condicion_id = $asistencia->id;
                    } else {
                        $registro->condicion_id = $tardanza->id;
                    }
                } else {
                    $registro->condicion_id = $inasistencia->id;
                }
                
                if ($chekOut) {
                    $registro->hora_out = $chekOut->checktime->format('H:i:s');
                }
                
                $this->Registros->save($registro);
                $registro = $this->Registros->get($registro->id, [
                    'contain' => ['Trabajadores', 'Condiciones']
                ]);
                $registros[] = $registro;
            } else {   
                // Get hora_in and hora_out
                $user = $usersTable->find()
                    ->where(['Users.dni' => $trabajador_dni])
                    ->first();
                
                $chekIn = $usersTable->Checkinout->find()
                    ->where([
                        'Checkinout.user_id' => $user->id,
                        'CAST(Checkinout.checktime AS DATE) =' => $fecha->format('Y-m-d'),
                        'Checkinout.tipo' => 'I'
                    ])
                    ->first();
                
                $chekOut = $usersTable->Checkinout->find()
                    ->where([
                        'Checkinout.user_id' => $user->id,
                        'CAST(Checkinout.checktime AS DATE) =' => $fecha->format('Y-m-d'),
                        'Checkinout.tipo' => 'O'
                    ])
                    ->first();
                
                if ($chekIn) {
                    $registro->hora_in = $chekIn->checktime->format('H:i:s');
                    
                    if ($registro->hora_in <= $registro->horario_hora_in) {
                        $registro->condicion_id = $asistencia->id;
                    } else {
                        $registro->condicion_id = $tardanza->id;
                    }
                } else {
                    $registro->condicion_id = $inasistencia->id;
                }
                
                if ($chekOut) {
                    $registro->hora_out = $chekOut->checktime->format('H:i:s');
                }
                
                $this->Registros->save($registro);
                
                $registro = $this->Registros->get($registro->id, [
                    'contain' => ['Trabajadores', 'Condiciones']
                ]);
                $registros[] = $registro;
            }
        }
        
        $this->set(compact('registros'));
        $this->set('_serialize', ['registros']);
    }
}
