<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Term */

$this->title = Yii::t('app', '{modelClass}: ', [
    'modelClass' =>  mb_strtolower(mb_substr(Yii::t('app', 'Term'),0,1)).mb_strtolower(mb_substr(Yii::t('app', 'Term'),1))
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
$this->blocks['content-header'] = '<small><span class="glyphicon glyphicon-edit text-primary-light"></span></small> '.$this->title;
?>
<div class="term-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
