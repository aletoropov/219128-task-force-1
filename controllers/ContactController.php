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
        $company = Company::find()->where(1)->joinWith('contact')->one();
        $contacts = $company->contacts;
        foreach ($contacts as $contact) {
            echo $contact->name, $contact->phone, $contact->company->name;
        }
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