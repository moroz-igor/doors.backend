<?php

use yii\db\Migration;

/**
 * Class m200305_132627_partners
 */
class m200305_132627_partners extends Migration
{
    public function up()
    {
        $this->createPartners();
    }

    public function down()
    {
        $this->dropTable('partners');

    }
    private function createPartners()
    {
        $this->createTable('partners', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'brand_img' => $this->string(),

        ]);
        $this->insert('partners',[
            'id' => 1,
            'title' => 'Наші парнери',
            'description' => 'Quisquam est, omnis iste natus error sit voluptatem accusantium. Qui earum rerum hic tenetur a sapiente. Animi, id est laborum et iusto odio dignissimos ducimus. Dolorem ipsum, quia voluptas nulla vero. Nemo enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit. Iure reprehenderit, qui dolorem eum iure reprehenderit. Atque corrupti, quos dolores et expedita distinctio praesentium voluptatum deleniti atque corrupti.',
            'brand_img' => 'img/logo-creator/brand-1.png' ,

        ]);
        for ($brand=2; $brand <=10 ; $brand++)
         {
            $this->insert('partners',[
                'id' => $brand,
                'brand_img' => 'img/logo-creator/brand-'.$brand.'.png' ,
            ]);
        }
    }
}
