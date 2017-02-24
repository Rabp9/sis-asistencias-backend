<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Horario Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property \Cake\I18n\Time $horaInicio
 * @property \Cake\I18n\Time $horaFin
 * @property int $estado_id
 *
 * @property \App\Model\Entity\Estado $estado
 */
class Horario extends Entity
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
    
    protected $_virtual = ['horaInicio', 'horaFin'];
    
    protected function _getHoraInicio() {
        return $this->_properties['horaInicio']->i18nFormat('HH:mm:ss');
    }
    
    protected function _getHoraFin() {
        return $this->_properties['horaFin']->i18nFormat('HH:mm:ss');
    }
}
