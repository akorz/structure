<?php

namespace backend\actions;

use Yii;

class IndexAction extends Action
{
    public function run()
    {
        $searchModel = new $this->modelClass;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->controller->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}