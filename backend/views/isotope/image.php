<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Завантаженя заображень ISOTOPE this_id: '.$id;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h2><?= Html::encode($this->title) ?></h2>
    <a href="<?php echo Url::to(['/isotope/view?id='.$id]); ?>" class="btn btn-info">Isotope</a>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
