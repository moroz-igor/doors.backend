<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use backend\models\Isotope;

/* @var $this yii\web\View */
/* @var $model backend\models\Isotope */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Isotopes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$id = Isotope::isotopeProductId($model->this_id);
?>
<div class="isotope-view">
    <?php
        $dir = Yii::getAlias('@img-isotope').'/p-'.$model->this_id;
        if(file_exists (Yii::getAlias('@img-isotope').'/p-'.$model->this_id) )
        {
            echo '<h4>Завантажені зображеня: </h4><br>';
            $files = scandir($dir);
            for ($i=2; $i < count($files); $i++) {
                echo ' <span class="_img-description">'.$files[$i].'</span>';
            }
        }
        else{echo '<span class="_italic text-danger">Зображеня відсутні!</span>';}
     ?>


    <h1><?= Html::encode($this->title).' id: '.$id->id ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->this_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->this_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Завантажити зображення', ['set-image', 'id' => $model->this_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Видалити зображення', ['delete-imgfolder', 'id' => $model->this_id], ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Url::to(['/products/view?id='.$id->id]); ?>" class="btn btn-info">Product View</a>
        <a href="<?php echo Url::to(['/products/view?id='.$id->id]); ?>" class="btn btn-info">Детально</a>
        <a href="<?php echo Url::to(['/products']); ?>" class="btn btn-info">Products</a>
        <a href="<?php echo Url::to(['/product-model']); ?>" class="btn btn-info">Product_model</a>


    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'class',
            'name',
            'brand',
            'price',
            'discount',
            'img_way',
            'status',
            //'this_id',
        ],
    ]) ?>

</div>
