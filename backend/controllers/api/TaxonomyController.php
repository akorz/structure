<?php

namespace backend\controllers\api;

class TaxonomyController extends Controller
{
    public $modelClass = 'common\models\Taxonomy';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create']);
        return $actions;
    }
}
