<?php

use yii\db\Migration;

/**
 * Class m200306_102608_contacts
 */
class m200306_102608_contacts extends Migration
{
    public function up()
    {
            $this->createContacts();
    }

    public function down()
    {
        $this->dropTable('contacts');
    }
    private function createContacts()
    {
        $this->createTable('contacts',[
            'title' => $this->string(32),
            'adress' => $this->string(32),
            'adress_des' => $this->string(32),
            'sub_title' => $this->string(32),
            'description' => $this->text(),
        ]);
        $this->insert('contacts', [
            'title'=> 'Про нас',
            'adress'=> 'Вінницька обл.',
            'adress_des'=> 'Ми в центрі міста',
            'sub_title'=> 'Lorem impus',
            'description'=> 'Lorem ipsum dolor sit amet. Voluptatem, quia non numquam eius modi tempora incidunt, ut perspiciatis unde. Laborum et molestiae consequatur, vel illum. Ut et expedita distinctio labore et dolorum fuga. Accusamus et expedita distinctio optio cumque. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium totam. Porro quisquam est, qui ratione voluptatem accusantium doloremque laudantium totam. Placeat, facere possimus, omnis iste natus error. Molestias excepturi sint, obcaecati cupiditate non recusandae.Lorem ipsum dolor sit amet. Voluptatem, quia non numquam eius modi tempora incidunt, ut perspiciatis unde. Laborum et molestiae consequatur, vel illum. Ut et expedita distinctio labore et dolorum fuga.',
        ]);
        $this->insert('contacts', [
            'adress'=> 'м. Калинівка',
            'adress_des'=> 'Приміщення соціальної аптеки',
            'description'=> 'Quisquam est, omnis voluptas assumenda est, qui dolorem. Voluptas nulla vero eos et quas molestias excepturi sint, obcaecati cupiditate. Repudiandae sint et accusamus et quas molestias excepturi sint, obcaecati cupiditate. Amet, consectetur, adipisci velit, sed quia consequuntur magni dolores. Aut fugit, sed ut perspiciatis, unde omnis dolor sit amet. Sapiente delectus, ut perspiciatis, unde omnis voluptas sit, aspernatur.Quisquam est, omnis voluptas assumenda est, qui dolorem. Voluptas nulla vero eos et quas molestias excepturi sint, obcaecati cupiditate. Repudiandae sint et accusamus et quas molestias excepturi sint, obcaecati cupiditate. Amet, consectetur, adipisci velit, sed quia consequuntur magni dolores. Aut fugit, sed ut perspiciatis, unde omnis dolor sit amet. Sapiente delectus, ut perspiciatis, unde omnis voluptas sit, aspernatur.',
        ]);
        $this->insert('contacts', [
            'adress'=> 'вул. Шевченка 16',
            'description'=> 'Lorem ipsum dolor sit amet. Voluptatem, quia non numquam eius modi tempora incidunt, ut perspiciatis unde. Laborum et molestiae consequatur, vel illum. Ut et expedita distinctio labore et dolorum fuga. Accusamus et expedita distinctio optio cumque. Dolore magnam aliquam quaerat voluptatem accusantium doloremque laudantium totam. Porro quisquam est, qui ratione voluptatem accusantium doloremque laudantium totam. Placeat, facere possimus, omnis iste natus error. Molestias excepturi sint, obcaecati cupiditate non recusandae.Lorem ipsum dolor sit amet. Voluptatem, quia non numquam eius modi tempora incidunt, ut perspiciatis unde. Laborum et molestiae consequatur, vel illum. Ut et expedita distinctio labore et dolorum fuga.',
        ]);

    }
}
