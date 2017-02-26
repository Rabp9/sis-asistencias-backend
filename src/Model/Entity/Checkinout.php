<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Checkinout Entity
 *
 * @property int $user_id
 * @property \Cake\I18n\Time $checkIn
 * @property \Cake\I18n\Time $checkOut
 *
 * @property \App\Model\Entity\User $user
 */
class Checkinout extends Entity
{

}
