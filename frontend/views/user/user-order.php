<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use frontend\assets\PagesAsset;
        PagesAsset::register($this);
    $this->title = 'ukr.doors / user-order';

    $this->registerCssFile('css/user.css',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
 ?>
    <div class="container">
        <div class="row">
            <?php foreach ($order as $order_data): ?>
            <h2>Замовлення №: <?php echo $order_data->id; ?></h2>
            <?php
                if($order_data->status)
                {echo '<p class="_green _user-order-status">Нове замовлення<p/>'; }
                if($order_data->process)
                {echo '<p class="_chocolate _user-order-status">Добавлено в обробку<p/>'; }
                if($order_data->closed)
                {echo '<p class="_teal _user-order-status">Завершено<p/>'; }?>
            <div class="_text-right">
                <p>
                     <a href="<?php echo Url::to(['/edit']); ?>" class="_it _lora">
                        Повернутись в мій особистий кабінет
                    </a>
                </p>
            </div>
        <?php endforeach; ?>
        <table class="table _lora">
            <caption>Список товарів в замовленні</caption>
            <thead>
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Товар</th>
                    <th scope="col">Ціна</th>
                    <th scope="col">Кількість</th>
                    <th scope="col">Сумма</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderItems as $item): ?>
                <tr>
                    <th scope="row"><?php echo $item->session_id; ?></th>
                    <td><?php echo $item->title; ?></td>
                    <td><?php echo $item->price; ?></td>
                    <td><?php echo $item->qty_item; ?></td>
                    <td><?php echo $item->sum_item; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
            <p class="_text-right">
                Створено
                    <span class="_green _it _lora"> <?php echo $order_data->created_at; ?> </span>
                / Кільк-ть товарів:
                    <span class="_green _it _lora"> <?php echo $order_data->qty; ?> </span> шт
                / На суму:
                    <span class="_green _it _lora"> <?php echo $order_data->sum; ?> </span>грн.
            </p>
        </div>
    </div>
