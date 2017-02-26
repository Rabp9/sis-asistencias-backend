<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HorariosTrabajador Entity
 *
 * @property int $id
 * @property int $horario_id
 * @property string $trabajador_dni
 * @property int $estado_id
 * @property \Cake\I18n\Time $fechaInicio
 * @property \Cake\I18n\Time $fechaFin
 *
 * @property \App\Model\Entity\Horario $horario
 * @property \App\Model\Entity\Estado $estado
 */
class HorariosTrabajador extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
