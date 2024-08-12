<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use app\models\Contact;

class ContactController extends Controller
{
    public function actionJSON(): Response
    {
        $contacts = Contact::find()->asArray()->all();
        $response = Yii::$app->response;
        $response->data = $contacts;
        $response->format = Response::FORMAT_JSON;
        return $response;
    }

    public function actionIndex()
    {
        $contact = Contact::find()->one();

        return $this->render('contact', ['contact' => $contact]);
    }

    public function actionAdd()
    {
//        // добавление записи в базу с помощью ActiveRecord
//        $contact = new Contact();
//        $contact->name = 'Иван Иванов';
//        $contact->phone = '8-999-99-99';
//        $contact->email = 'toropovsite@yandex.ru';
//        $contact->position = 'Менеджер';
//        // сохранение модели в базе данных
//        $contact->save();

        $props = [
            'name' => 'Петр Петров',
            'phone' => '9-900-00-00',
            'email' => 'pp@bk.ru',
            'position' => 'Бухгалтер',
        ];

        $contact = new Contact();
        $contact->attributes = $props;
        $contact->save();

        return $this->goHome();
    }

    public function actionShow()
    {
        $contact = Contact::findOne($id);
        if (!$contact) {
            throw new NotFoundHttpException('Контакт с ID ' . $id . ' не найден');
        }
        return $this->render('view', ['contact' => $contact]);
    }

    public function actionFilter($status)
    {
        $contacts = Contact::findAll(['status' => $status]);
        return $this->render('index', ['contact' => $contacts]);
    }
}