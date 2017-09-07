<?php

namespace backend\actions;

use Yii;

class CreateAction extends Action
{
    public function run()
    {
        $model = new $this->modelClass;

        if ($model->load(Yii::$app->request->post()) && $this->repository->save($model))
            return $this->controller->redirect(['index']);

        return $this->controller->render('create', [
            'model' => $model,
        ]);
    }
}