<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Term */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="term-form box box-primary">
    <?= \backend\widgets\CrudMenuWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'taxonomy_id')->dropDownList(array(), ['prompt'=>Yii::t('app','Select value')]) ?>

        <?= $form->field($model, 'parent_id')->dropDownList(array(), ['prompt'=>Yii::t('app','Select value')]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'order')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php $this->registerJs("
backend.loadTaxonomy('#term-taxonomy_id', '" . (isset($model->taxonomy_id) ? $model->taxonomy_id : '') . "');
backend.loadParentTerm('#term-parent_id', '" . (isset($model->parent_id) ? $model->parent_id : '') . "', '" . (isset($model->taxonomy_id) ? $model->taxonomy_id : '') . "');

$('#term-taxonomy_id').change(function() {
    backend.loadParentTerm('#term-parent_id', '', $('#term-taxonomy_id').val());
});
", yii\web\View::POS_READY); ?>

