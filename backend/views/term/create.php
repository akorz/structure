<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Term */

$this->title = Yii::t('app', 'Add new {modelClass}', [
        'modelClass' => mb_strtolower(mb_substr(Yii::t('app', 'Term'),0,1)).mb_strtolower(mb_substr(Yii::t('app', 'Term'),1))
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = '<small><span class="glyphicon glyphicon-plus text-success-light"></span></small> '.$this->title;
?>
<div class="term-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>