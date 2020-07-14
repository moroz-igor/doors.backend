<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Products */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="products-view">
    <?php
        $dir = Yii::getAlias('@img-products').'/p-'.$model->id;
        if(file_exists (Yii::getAlias('@img-products').'/p-'.$model->id) )
        {
            echo '<h4>Завантажені зображеня: </h4><br>';
            $files = scandir($dir);
            for ($i=2; $i < count($files); $i++) {
                echo ' <span class="_img-description">'.$files[$i].'</span>';
            }
        }
        else{echo '<span class="_italic text-danger">Зображеня відсутні!</span>';}
     ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Завантажити зображення', ['set-image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Видалити зображення', ['delete-imgfolder', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Url::to(['/product-model/view?id='.$model->id]); ?>"
            class="btn btn-info">Детально</a>
        <a href="<?php echo Url::to(['/product-model']); ?>" class="btn btn-info">Product_model</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'section',
            'category_id',
            'title',
            'availability',
            'price',
            'brand',
            'img_way_1',
            'img_way_2',
            'discount',
            'status',
        ],
    ]) ?>

</div>
