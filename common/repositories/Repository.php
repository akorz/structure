<?php

namespace common\repositories;

class Repository
{
    protected $modelClass;

    public function save($model)
    {
        return $model->save();
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function findById($id)
    {
        $modelClass = $this->modelClass;
        return $modelClass::findOne(['id' => $id]);
    }

    public function findAll()
    {
        $modelClass = $this->modelClass;
        return $modelClass::find()->all();
    }
}