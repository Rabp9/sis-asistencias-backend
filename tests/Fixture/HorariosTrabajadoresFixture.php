<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HorariosTrabajadoresFixture
 *
 */
class HorariosTrabajadoresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => '10', 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'horario_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'trabajador_dni' => ['type' => 'string', 'fixed' => true, 'length' => '8', 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null],
        'estado_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'fechaInicio' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'fechaFin' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_horarios_trabajadores_trabajadores' => ['type' => 'foreign', 'columns' => ['trabajador_dni'], 'references' => ['trabajadores', 'dni'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_horarios_trabajadores_estados' => ['type' => 'foreign', 'columns' => ['estado_id'], 'references' => ['estados', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_horarios_trabajadores_horarios' => ['type' => 'foreign', 'columns' => ['horario_id'], 'references' => ['horarios', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'horario_id' => 1,
            'trabajador_dni' => 'Lorem ',
            'estado_id' => 1,
            'fechaInicio' => '2017-02-24',
            'fechaFin' => '2017-02-24'
        ],
    ];
}
