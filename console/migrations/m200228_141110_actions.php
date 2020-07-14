<?php
use yii\db\Migration;
/**
 * Class m200228_141110_actions
 */
class m200228_141110_actions extends Migration
{
    public function up()
    {

        $this->createTable('actions', [
            'title_1' => $this->text(),
            'title_2' => $this->text(),
            'ticker' => $this->text(),
            'status' => $this->smallInteger(),
        ]);
        $this->insert('actions', [
            'title_1' => 'Увага знижка! -30%',
            'title_2' => 'Святкова знижка на двері виробника - Новий стиль!',
            'ticker' => 'Коротке речення про акціі та знижки, яке буде доповнювати загальну     інформацію і може бути цікавою потенційним покупцям! ',
            'status' => 1,

        ]);
    }
    public function down()
    {
        $this->dropTable('actions');
    }
}
