<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HorariosTrabajadores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Horarios
 * @property \Cake\ORM\Association\BelongsTo $Estados
 *
 * @method \App\Model\Entity\HorariosTrabajadore get($primaryKey, $options = [])
 * @method \App\Model\Entity\HorariosTrabajadore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HorariosTrabajadore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HorariosTrabajadore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HorariosTrabajadore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HorariosTrabajadore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HorariosTrabajadore findOrCreate($search, callable $callback = null, $options = [])
 */
class HorariosTrabajadoresTable extends Table
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

        $this->setTable('RRHH.horarios_trabajadores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Horarios')
            ->setForeignKey('horario_id')
            ->setJoinType('LEFT');
        
        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id',
            'joinType' => 'INNER'
        ]);
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
            ->date('fechaInicio')
            ->allowEmpty('fechaInicio');

        $validator
            ->date('fechaFin')
            ->allowEmpty('fechaFin');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['horario_id'], 'Horarios'));
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));

        return $rules;
    }
}
