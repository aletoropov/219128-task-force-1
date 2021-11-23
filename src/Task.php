<?php

/**
 * Class Task
 */

class Task
{

    /**
     * Исполнитель
     *
     * @var
     */
    private $implementer;

    /**
     * Заказчик
     *
     * @var
     */
    private $customer;

    /**
     * Cтатус задачи
     *
     * @var
     */
    private $status;

    /**
     * Task constructor.
     * @param $customer
     * @param string $status
     * @param null $implementer
     */
    public function __construct($customer, $status = 'new', $implementer = null)
    {
        $this->setCustomer($this);
        $this->setImplementer($implementer);
        $this->setStatus($status);
    }

    /**
     * Устанавливаем исполнителя
     *
     * @param $str
     */
    private function setImplementer($str)
    {
        $this->implementer = $str;
    }

    /**
     * Устанавливаем заказчика
     *
     * @param $str
     */
    private function setCustomer($str)
    {
        $this->customer = $str;
    }

    /**
     * Устанавливаем статус задания
     *
     * @param $str
     * @throws Exception
     */
    private function setStatus($str)
    {
        if (!in_array($str, $this->getStatusesMap())) {
            throw new Exception('Неверный статут');
        }
        $this->status = $str;
    }

    /**
     * Список всех доступных статусов.
     */
    const STATUS_NEW = 'new';
    const STATUS_CANCEL = 'cancel';
    const STATUS_IN_WORK = 'inwork';
    const STATUS_DONE = 'done';
    const STATUS_FAIL = 'fail';


    /**
     * Возвращает карту статусов
     *
     * @return string[]
     */
    public function getStatusesMap()
    {
        return[
            self::STATUS_NEW => 'new',
            self::STATUS_CANCEL => 'cancel',
            self::STATUS_IN_WORK => 'inwork',
            self::STATUS_DONE => 'done',
            self::STATUS_FAIL => 'fail',
        ];
    }

    /**
     * Возвращает карту действий
     *
     * @return string[]
     */
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
