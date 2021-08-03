<?php

/**
 * Class Task
 */

class Task
{
    /**
     * Список всех доступных статусов.
     */
    const STATUS_NEW = 1;
    const STATUS_CANCEL = 2;
    const STATUS_IN_WORK = 3;
    const STATUS_DONE = 4;
    const STATUS_FAIL = 5;


    public function getActionMap()
    {
        return[
            self::STATUS_NEW => 'Новое',
            self::STATUS_CANCEL => 'Отменено',
            self::STATUS_IN_WORK => 'В работе',
            self::STATUS_DONE => 'Выполнено',
            self::STATUS_FAIL => 'Провалено',
        ];
    }

    public function getStatusesMap()
    {

    }


}
