<?php

namespace App\Helpers;


class PostHelper
{
    const STATUS_ACTIVE = 'active';
    const STATUS_MODERATE = 'moderate';
    const STATUS_DRAFT = 'draft';
    const STATUS_DELETED = 'delete';

    /**
     * @return array
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_ACTIVE => 'Активно',
            self::STATUS_MODERATE => 'На модерации',
            self::STATUS_DRAFT => 'Черновик',
            self::STATUS_DELETED => 'Удалено'
        ];
    }
}