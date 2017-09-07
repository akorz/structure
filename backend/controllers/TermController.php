<?php

namespace backend\controllers;

/**
 * TermController implements the CRUD actions for Term model.
 */
class TermController extends Controller
{
    protected $modelClass = 'common\models\Term';
    protected $modelSearchClass = 'backend\models\search\TermSearch';
    protected $repositoryClass = 'common\repositories\TermRepository';
}
