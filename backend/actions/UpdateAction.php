<?php

namespace backend\actions;

use Yii;

class UpdateAction extends Action
{
    public function run($id)
    {
        $model = $this->repository->findById($id);

        if ($model->load(Yii::$app->request->post()) && $this->repository->save($model))
            return $this->controller->redirect(['index']);

        return $this->controller->render('update', [
            'model' => $model,
        ]);
    }
}