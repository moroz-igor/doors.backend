<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\widgets\ActiveForm;
use backend\models\Cube;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Завантаженя заображень cube-id: '.$id;
$this->params['breadcrumbs'][] = $this->title;
    $cube = Cube::cubeProductId($id);
?>
<div class="products-index">

    <?php echo WidgetNavigator::widget(); ?>
    <h2><?= Html::encode($this->title) ?></h2>

    <a href="<?php echo Url::to(['/cube']); ?>" class="btn btn-info">Сube</a>
    <a href="<?php echo Url::to(['/cube/view?id='.$id]); ?>" class="btn btn-info">Cube View</a>
    <a href="<?php echo Url::to(['/products/view?id='.$cube->product_id]); ?>" class="btn btn-info">Product View</a>
    <a href="<?php echo Url::to(['/product-model/view?id='.$cube->product_id]); ?>"
        class="btn btn-info">Детально</a>


   <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>