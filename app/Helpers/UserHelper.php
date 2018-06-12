<?php
/**
 *
 */

namespace App\Helpers;

/**
 * Class UserHelper
 * @package App\Helpers
 */
class UserHelper
{
    const STATUS_ACTIVE = 'active';
    const STATUS_WAIT = 'wait';

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    /**
     * @return array
     */
    public static function getRoles(): array
    {
        return [
            self::ROLE_USER => 'Пользователь',
            self::ROLE_ADMIN => 'Админ'
        ];
    }

    /**
     * @return array
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_WAIT => 'В ожидании'
        ];
    }
}