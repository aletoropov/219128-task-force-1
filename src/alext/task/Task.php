<?php
namespace alext\task;

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
     *
     * @param $customer
     * @param string $status
     * @param null $implementer
     * @throws Exception
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

    /**
     * Возвращает имя статуса, в который перейдёт задание после выполнения конкретного действия.
     *
     * @param $action
     * @return string
     */
    public function getNextStatus($action)
    {
        switch ($action) {
            case 'action_respond':
                return self::STATUS_NEW;
            case 'action_cancel':
                return self::STATUS_CANCEL;
            case 'action_done':
                return self::STATUS_DONE;
            case 'action_start':
                return self::STATUS_IN_WORK;
        }
    }


}
