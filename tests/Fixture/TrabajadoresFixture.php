<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TrabajadoresFixture
 *
 */
class TrabajadoresFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'dni' => ['type' => 'string', 'fixed' => true, 'length' => '8', 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null],
        'nombres' => ['type' => 'string', 'length' => '80', 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'apellidoPaterno' => ['type' => 'string', 'length' => '60', 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'apellidoMaterno' => ['type' => 'string', 'length' => '60', 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['dni'], 'length' => []],
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
            'dni' => 'da1ece19-dbe7-47f9-b6ec-429c627e645c',
            'nombres' => 'Lorem ipsum dolor sit amet',
            'apellidoPaterno' => 'Lorem ipsum dolor sit amet',
            'apellidoMaterno' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
