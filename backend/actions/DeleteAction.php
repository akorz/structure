<?php

namespace backend\actions;

class DeleteAction extends Action
{
    public function run($id)
    {
        $model = $this->repository->findById($id);
        $this->repository->delete($model);

        return $this->controller->redirect(['index']);
    }
}