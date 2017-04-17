<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trabajador Entity
 *
 * @property string $dni
 * @property string $nombres
 * @property string $apellidoPaterno
 * @property string $apellidoMaterno
 * @property int $estado_id
 * 
 * @property \App\Model\Entity\Estado $estado
 */
class Trabajador extends Entity
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
        '*' => true
    ];
    
    protected $_virtual = ['full_name'];
    
    protected function _getFullName() {
        if (!isset($this->_properties['apellidoPaterno'])) {
            return '';
        }
        return $this->_properties['apellidoPaterno'] . ' ' . $this->_properties['apellidoMaterno'] . ', ' .
            $this->_properties['nombres'];
    }
    
}
