<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\PagesAsset;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Alert;
    PagesAsset::register($this);
$this->title = 'ukr.doors / особистий кабінет';

$this->registerCssFile('css/user.css',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);
?>
<div class="container">
    <?php
    if(Yii::$app->session->getFlash('info'))
    echo '<h2 class="_midl _it _lora _green">'.Yii::$app->session->getFlash('info').'</h2>';
    if(Yii::$app->session->getFlash('register'))
    echo '<h2 class="_midl _it _lora _green">'.Yii::$app->session->getFlash('register').'</h2>';
    ?>

    <h3><?= Html::encode($this->title); ?></h3>
    <p class="_it _lora _green">Тут ви можете перевірити, доповнити та відредагувати Ваші дані:</p>
    <div class="row">
        <div class="col-lg-5 col-md-5">
            <?php $form = ActiveForm::begin(['id' => 'form-edit']); ?>

                <span class="_it _lora _green">Ваш логін: </span>
                <h4><?php echo Html::encode(Yii::$app->user->identity->username); ?></h4>
                <span class="_it _lora _green">Ваша електронна пошта: </span>
                <h4><?php echo Html::encode(Yii::$app->user->identity->email); ?></h4>

                <span class="_it _lora _green">Телефон для зв'язку з Вами: </span>
                <h4><?php echo Html::encode(Yii::$app->user->identity->sellphone); ?></h4>

                <?= $form->field($model, 'sellphone')->textInput([
                    'value' => Yii::$app->user->identity->sellphone,
                ]); ?>

                <span class="_it _lora _green">Адреса ( Куди бажаєте доставити товар ): </span>
                <h4><?php echo Html::encode(Yii::$app->user->identity->address); ?></h4>
                <?= $form->field($model, 'address')->textInput([
                    'value' => Yii::$app->user->identity->address,
                ]); ?>

                <span class="_it _lora _green">Як до Вас звертатись ( Ваше ім'я ): </span>
                <h4><?php echo Html::encode(Yii::$app->user->identity->name); ?></h4>
                <?= $form->field($model, 'name')->textInput([
                    'value' => Yii::$app->user->identity->name,
                ]); ?>


                <div class="form-group">
                    <?= Html::submitButton('Зберегти доповнення та зміни', ['class' => 'btn btn-primary _sq _it', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-6 col-md-6 _midl">
            <h3>Ваші замовлення</h3>
            <?php if($ordersNew): ?>
                <table class ="_user-orders">
                    <caption>Нові замовлення / <?php echo Yii::$app->user->identity->name; ?></caption>
                    <th>Номер </th>
                    <th>Дата </th>
                    <th>Сумма </th>
                    <th>Статус </th>
                    <th><i class="fa fa-eye" aria-hidden="true"></i></th>
                        <?php foreach ($ordersNew as $order): ?>
                            <tr class="_lora _it">
                                <td><?php echo $order->id; ?></td>
                                <td><?php echo $order->created_at; ?></td>
                                <td><?php echo $order->sum; ?></td>
                                <td class="_green">Новий</td>
                                <td  class="_order-link">
                                    <a href="<?php echo Url::to(['user-order/'.$order->id]); ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <?php if($ordersProcess): ?>
                <table class ="_user-orders">
                    <caption>Замовлення в обробці / <?php echo Yii::$app->user->identity->name ?></caption>
                    <th>Номер </th>
                    <th>Дата </th>
                    <th>Сумма </th>
                    <th>Статус </th>
                    <th><i class="fa fa-eye" aria-hidden="true"></i></th>
                        <?php foreach ($ordersProcess as $order): ?>
                            <tr class="_lora _it">
                                <td><?php echo $order->id; ?></td>
                                <td><?php echo $order->created_at; ?></td>
                                <td><?php echo $order->sum; ?></td>
                                <td class="_chocolate">В обробці</td>
                                <td  class="_order-link">
                                    <a href="<?php echo Url::to(['user-order/'.$order->id]); ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <?php if($ordersClosed): ?>
                <table class ="_user-orders">
                    <caption>Завершені / <?php echo Yii::$app->user->identity->name ?></caption>
                    <th>Номер </th>
                    <th>Дата </th>
                    <th>Сумма </th>
                    <th>Статус </th>
                    <th><i class="fa fa-eye" aria-hidden="true"></i></th>
                        <?php foreach ($ordersClosed as $order): ?>
                            <tr class="_lora _it">
                                <td><?php echo $order->id; ?></td>
                                <td><?php echo $order->created_at; ?></td>
                                <td><?php echo $order->sum; ?></td>
                                <td class="_teal">Завершено</td>
                                <td  class="_order-link">
                                    <a href="<?php echo Url::to(['user-order/'.$order->id]); ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
