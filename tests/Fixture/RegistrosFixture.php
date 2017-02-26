<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegistrosFixture
 *
 */
class RegistrosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => '10', 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'trabajador_dni' => ['type' => 'string', 'fixed' => true, 'length' => '8', 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null],
        'condicion_id' => ['type' => 'integer', 'length' => '10', 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null],
        'horario_hora_in' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'horario_hora_out' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'observacion' => ['type' => 'string', 'length' => '100', 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'hora_in' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'hora_out' => ['type' => 'time', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_registros_trabajadores' => ['type' => 'foreign', 'columns' => ['trabajador_dni'], 'references' => ['trabajadores', 'dni'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_registros_condiciones' => ['type' => 'foreign', 'columns' => ['condicion_id'], 'references' => ['condiciones', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'trabajador_dni' => 'Lorem ',
            'condicion_id' => 1,
            'fecha' => '2017-02-26',
            'horario_hora_in' => '04:29:17',
            'horario_hora_out' => '04:29:17',
            'observacion' => 'Lorem ipsum dolor sit amet',
            'hora_in' => '04:29:17',
            'hora_out' => '04:29:17'
        ],
    ];
}
