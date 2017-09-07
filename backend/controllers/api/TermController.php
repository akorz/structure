<?php

namespace backend\controllers\api;

use Yii;
use common\models\Term;

class TermController extends Controller
{
    public $modelClass = 'common\models\Term';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'], $actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $taxonomy_id = Yii::$app->request->get('taxonomy_id', 0);
        $parent_id = Yii::$app->request->get('parent_id', 0);

        if ($parent_id)
            throw new \yii\web\ForbiddenHttpException('You are not allowed to access this page');

        $query = Term::find()->where(['taxonomy_id' => $taxonomy_id, 'deleted' => 0])->andWhere(['is', 'parent_id', null]);

        return new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
    }
}
