<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Registro Entity
 *
 * @property int $id
 * @property string $trabajador_dni
 * @property int $condicion_id
 * @property \Cake\I18n\Time $fecha
 * @property \Cake\I18n\Time $horario_hora_in
 * @property \Cake\I18n\Time $horario_hora_out
 * @property string $observacion
 * @property \Cake\I18n\Time $hora_in
 * @property \Cake\I18n\Time $hora_out
 *
 * @property \App\Model\Entity\Condicione $condicione
 */
class Registro extends Entity
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
    
    protected $_virtual = ['fecha', 'horarioHoraIn', 'horarioHoraOut', 'horaIn', 'horaOut', 'minTarde'];
    
    protected function _getFecha() {
        if (!isset($this->_properties['fecha'])) {
            return '';
        } elseif ($this->_properties['fecha'] == '') {
            return '';
        } elseif (!is_object($this->_properties['fecha'])) {
            return $this->_properties['fecha'];
        }
        return $this->_properties['fecha']->format('Y-m-d');
    }
    
    protected function _getHorarioHoraIn() {
        if (!isset($this->_properties['horario_hora_in'])) {
            return '';
        } elseif ($this->_properties['horario_hora_in'] == '') {
            return '';
        } elseif (!is_object($this->_properties['horario_hora_in'])) {
            return $this->_properties['horario_hora_in'];
        }
        return $this->_properties['horario_hora_in']->i18nFormat('HH:mm:ss');
    }
    
    protected function _getHorarioHoraOut() {
        if (!isset($this->_properties['horario_hora_out'])) {
            return '';
        } elseif ($this->_properties['horario_hora_out'] == '') {
            return '';
        } elseif (!is_object($this->_properties['horario_hora_out'])) {
            return $this->_properties['horario_hora_out'];
        }
        return $this->_properties['horario_hora_out']->i18nFormat('HH:mm:ss');
    }
    
    protected function _getHoraIn() {
        if (!isset($this->_properties['hora_in'])) {
            return '';
        } elseif ($this->_properties['hora_in'] == '') {
            return '';
        } elseif (!is_object($this->_properties['hora_in'])) {
            return $this->_properties['hora_in'];
        }
        return $this->_properties['hora_in']->i18nFormat('HH:mm:ss');
    }
    
    protected function _getHoraOut() {
        if (!isset($this->_properties['hora_out'])) {
            return '';
        } elseif ($this->_properties['hora_out'] == '') {
            return '';
        } elseif (!is_object($this->_properties['hora_out'])) {
            return $this->_properties['hora_out'];
        }
        return $this->_properties['hora_out']->i18nFormat('HH:mm:ss');
    }
    
    protected function _getMinTarde() {
        if ($this->_properties['horario_hora_in'] == null || $this->_properties['hora_in'] == null) {
            return '';
        }
        $horario_hora_in = strtotime($this->_properties['horario_hora_in']->i18nFormat('HH:mm:ss'));
        $hora_in = strtotime($this->_properties['hora_in']->i18nFormat('HH:mm:ss'));
        if ($horario_hora_in < $hora_in) {
            $min_tarde = date('H:i:s', strtotime('00:00:00') + $hora_in - $horario_hora_in);
            return (date('H', strtotime($min_tarde)) * 60) + date('i', strtotime($min_tarde));
        }
        return '';
    }
}
