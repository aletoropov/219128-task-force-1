<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\db\Query;
use yii\web\NotFoundHttpException;

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
}