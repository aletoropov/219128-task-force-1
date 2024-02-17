<?php

namespace app\models;

use yii\base\Model;
use yii\db\ActiveRecord;

class Contact extends ActiveRecord
{
    public function attributeLabels(): array
    {
        return [
          'name'     => 'Имя',
          'phone'    => 'Телефон',
          'email'    => 'E-mail',
          'position' => 'Должность',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'position'], 'safe']
        ];
    }
}