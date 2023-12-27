<?php

namespace app\models;

use yii\base\Model;

class Contact extends Model
{
    public string $name;
    public string $phone;
    public string $email;
    public string $position;

    public function attributeLabels(): array
    {
        return [
          'name'     => 'Имя',
          'phone'    => 'Телефон',
          'email'    => 'E-mail',
          'position' => 'Должность',
        ];
    }
}