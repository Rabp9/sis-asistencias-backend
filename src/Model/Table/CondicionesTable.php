<?php
namespace App\Model\Table;

use App\Model\Entity\Condicion;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Condiciones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Estados
 *
 * @method \App\Model\Entity\Condicione get($primaryKey, $options = [])
 * @method \App\Model\Entity\Condicione newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Condicione[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Condicione|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Condicione patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Condicione[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Condicione findOrCreate($search, callable $callback = null, $options = [])
 */
class CondicionesTable extends Table
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

        $this->setTable('RRHH.condiciones');
        $this->setEntityClass('Condicion');
        $this->setDisplayField('descripcion');
        $this->setPrimaryKey('id');

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
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->boolean('asistencia')
            ->requirePresence('asistencia', 'create')
            ->notEmpty('asistencia');

        $validator
            ->boolean('tardanza')
            ->requirePresence('tardanza', 'create')
            ->notEmpty('tardanza');

        return $validator;
    }
}
