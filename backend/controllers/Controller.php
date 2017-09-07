<?php

namespace backend\controllers;

use yii;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use backend\actions\IndexAction;
use backend\actions\CreateAction;
use backend\actions\UpdateAction;
use backend\actions\DeleteAction;
use yii\filters\AccessControl;

class Controller extends yii\web\Controller
{
    protected $modelClass;
    protected $modelSearchClass;
    protected $repositoryClass;
    protected $repository;

    public function init()
    {
        $this->repository = new $this->repositoryClass;
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => $this->modelSearchClass,
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => $this->modelClass,
                'repository' => $this->repository,
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => $this->modelClass,
                'repository' => $this->repository,
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => $this->modelClass,
                'repository' => $this->repository,
            ],
        ];
    }

    /**
     * Finds the model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = $this->repository->findById($id)) !== null)
            return $model;

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
