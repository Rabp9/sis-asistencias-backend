<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Checkinout Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Checkinout get($primaryKey, $options = [])
 * @method \App\Model\Entity\Checkinout newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Checkinout[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Checkinout|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Checkinout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Checkinout[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Checkinout findOrCreate($search, callable $callback = null, $options = [])
 */
class CheckinoutTable extends Table
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

        $this->setTable('dbo.CHECKINOUT');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->dateTime('checkIn')
            ->requirePresence('checkIn', 'create')
            ->notEmpty('checkIn');

        $validator
            ->dateTime('checkOut')
            ->requirePresence('checkOut', 'create')
            ->notEmpty('checkOut');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'biometrico';
    }
}
