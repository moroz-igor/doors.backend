<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if ($filterList[0]->status): ?>
    <section class="_filters">
        <h3>Фільтри</h3>
        <div>
            <?php $form = ActiveForm::begin(); ?>
                <?php foreach ($filterList as $filter): ?>
                    <?php if ($filter->filter): ?>
                        <label>
                        <input name="<?php echo $filter->input_name; ?>" class="cb pristine" type="checkbox" value="1"/>
                        <span><?php echo $filter->filter; ?></span>
                        </label>
                    <?php endif; ?>
                <?php endforeach; ?>
                <label class="_selection-filters">
                    <select name="brand">
                        <?php foreach ($filterList as $filter): ?>
                            <?php if ($filter->brand): ?>
                                <option><?php echo $filter->brand; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="_selection-filters">
                    <select name="color">
                        <?php foreach ($filterList as $filter): ?>
                            <?php if ($filter->color): ?>
                                <option><?php echo $filter->color; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </label>
                <p class="_submit-filters hidden">
                    <button class="btn btn-info " type="submit"> Застосувати фільтри </button>
                </p>
            <?php ActiveForm::end(); ?>
            <!-- Button trigger modal -->
            <a class="btn" data-toggle="modal" data-target="#staticBackdrop">
                Підказка! Як працюють пошук та фільтри!
            </a>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"  role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Як працює пошук?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body _lora">
                    Пошук товарів у базі даних відбувається по назві товару.
                    Введіть пошукове слово та натисніть кнопку пошуку, програма видасть Вам першу порцію товарів, що відповідають Вашому пошуковому запиту, повторне натиснення кнопки пошуку видасть наступну частину товарів і так далі до тих пір поки, будуть знаходитись товари,
                    які включають в назву слово, яке Ви ввели в пошукову форму!
                </div>
                <h5 class="modal-title" id="staticBackdropLabel">Як працюють фільтри?</h5>
                <div class="modal-body _lora">
                    <h5>Що означає вибір помаранчевого чекбоксу "Фільтр"?</h5>
                    <p>
                        Якщо галочка "Фільтр" не відмічена, то программа буде додавати до пошуку вибрані Вами критерії, якщо галочка "Фільтр" відмічена, то програма буде виключати із пошуку все, окрім вибранних Вами критеріїв пошуку.
                    </p>
                    <p>Так наприклад:</p>
                    <p>
                    Якщо ви вибрали критерії пошуку "Акційні" та бренд "Новий стиль" і при цьому "Фільтр" - не відмічено то програма знайде Вам усі акційні товари зі знижкою плюс всі товари під брендом "Новий стиль".</p>
                    <p>
                    Якщо ви вибрали критерії пошуку "Акційні" та бренд "Новий стиль" і при цьому "Фільтр" - відмічено то програма знайде тільки акційні товари зі знижкою у яких  виробник "Новий стиль".</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
