<?php

namespace backend\controllers;

class TaxonomyController extends Controller
{
    protected $modelClass = 'common\models\Taxonomy';
    protected $modelSearchClass = 'backend\models\search\TaxonomySearch';
    protected $repositoryClass = 'common\repositories\TaxonomyRepository';
}
