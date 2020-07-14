<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Cube */

$this->title = 'Зображення № '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cubes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cube-view">
    <?php
        $dir = Yii::getAlias('@img-cube').'/p-'.$model->id;
        if(file_exists (Yii::getAlias('@img-cube').'/p-'.$model->id) )
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

        <?= Html::a('Завантажити зображення', ['set-image', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Видалити зображення', ['delete-imgfolder', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Url::to(['/product-model/view?id='.$model->product_id]); ?>"
            class="btn btn-info">Детально</a>
        <a href="<?php echo Url::to(['/product-model']); ?>" class="btn btn-info">Product_model</a>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'img_path',
            'product_id',
        ],
    ]) ?>

</div>
