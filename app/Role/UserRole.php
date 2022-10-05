<?php

namespace App\Role;

/***
 * Class UserRole
 * @package App\Role
 */
class UserRole
{
    //producer, support, fighter, buyer, admin

    const ROLE_ADMIN = 'admin';
    const ROLE_PRODUCER = 'producer';
    const ROLE_SUPPORT = 'support';
    const ROLE_FIGHTER = 'fighter';
    const ROLE_BUYER = 'buyer';

    /***
     * @return array
     */
    public static function getRoleList()
    {
        return [
            static::ROLE_ADMIN => 'Администратор',
            static::ROLE_PRODUCER => 'Продюсер',
            static::ROLE_SUPPORT => 'Контент-менеджер',
            static::ROLE_FIGHTER => 'Боец',
            static::ROLE_BUYER => 'Фанат',
        ];
    }
}
