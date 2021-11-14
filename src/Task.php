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


    /**
     * Возвращает карту статусов
     *
     * @return string[]
     */
    public function getStatusesMap()
    {
        return[
            self::STATUS_NEW => 1,
            self::STATUS_CANCEL => 2,
            self::STATUS_IN_WORK => 3,
            self::STATUS_DONE => 4,
            self::STATUS_FAIL => 5,
        ];
    }

    public function getActionMap()
    {
        return[
            ActionRespond::class => 'Откликнуться',
            ActionCancel::class => 'Отменить',
            ActionComplete::class => 'Завершить',
            ActionStartProject::class => 'Старт задания',
            ActionSendNotification::class => 'Отправить уведомление',
            ActionSendMessage::class => 'Отправить сообщение',
        ];
    }


}
