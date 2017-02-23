<?php
namespace App\Model\Table;

use App\Model\Entity\Trabajador;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trabajadores Model
 *
 * @method \App\Model\Entity\Trabajador get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trabajador newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trabajador[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trabajador|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trabajador patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trabajador[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trabajador findOrCreate($search, callable $callback = null, $options = [])
 */
class TrabajadoresTable extends Table
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

        $this->setTable('RRHH.trabajadores');
        $this->setEntityClass('Trabajador');
        $this->setDisplayField('apellidoPaterno');
        $this->setPrimaryKey('dni');
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
            ->allowEmpty('dni', 'create');

        $validator
            ->allowEmpty('nombres');

        $validator
            ->allowEmpty('apellidoPaterno');

        $validator
            ->allowEmpty('apellidoMaterno');

        return $validator;
    }
}