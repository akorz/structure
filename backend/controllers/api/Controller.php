<?php

namespace backend\controllers\api;

use Yii;
use yii\rest\ActiveController;

class Controller extends ActiveController
{
    public function checkAccess($action, $model = null, $params = [])
    {
        if (Yii::$app->user->isGuest)
            throw new \yii\web\ForbiddenHttpException('You are not allowed to access this page');
    }
}
