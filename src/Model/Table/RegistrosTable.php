<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Registros Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Condiciones
 *
 * @method \App\Model\Entity\Registro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Registro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Registro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Registro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Registro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Registro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Registro findOrCreate($search, callable $callback = null, $options = [])
 */
class RegistrosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('RRHH.registros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Condiciones')
            ->setForeignKey('condicion_id')
            ->setProperty('condicion');
                
        $this->belongsTo('Trabajadores')
            ->setForeignKey('trabajador_dni')
            ->setProperty('trabajador');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('trabajador_dni', 'create')
            ->notEmpty('trabajador_dni');

        $validator
            ->date('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

        $validator
            ->time('horario_hora_in')
            ->allowEmpty('horario_hora_in');

        $validator
            ->time('horario_hora_out')
            ->allowEmpty('horario_hora_out');

        $validator
            ->allowEmpty('observacion');

        $validator
            ->time('hora_in')
            ->allowEmpty('hora_in');

        $validator
            ->time('hora_out')
            ->allowEmpty('hora_out');

        return $validator;
    }
}
