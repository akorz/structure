<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TermSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Terms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-index box box-primary">
    <?= \backend\widgets\CrudMenuWidget::widget() ?>
    <?php Pjax::begin(); ?>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'taxonomy_name',
                    'value' => 'taxonomy.name',
                ],
                [
                    'attribute' => 'parent_name',
                    'value' => 'parent.name',
                ],
                'name',
                'order',
                [
                    'attribute' => 'deleted',
                    'format' => 'boolean',
                    'filter'=>[0 => 'No', 1 => 'Yes'],
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
