<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Contacts;

class ContactsController extends Controller
{
    public function actionContacts()
    {
        $this->layout = 'pages';

        $pageData = Contacts::getContactsContent();
        return $this->render('contacts', [
            'pageData' => $pageData,
        ]);
    }
}
