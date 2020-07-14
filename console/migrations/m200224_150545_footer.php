<?php

use yii\db\Migration;

/**
 * Class m200224_150545_footer
 */
class m200224_150545_footer extends Migration
{
    public function up()
    {
        $this->createFooer();

        // $this->createTable('footer', [
        //     'snet' => $this->string(32),
        //     'phones' => $this->string(32),
        //     'emails' => $this->string(32),
        //     'desc' => $this->text(),
        // ]);
    }

    public function down()
    {
        $this->dropTable('footer');
    }
    private function createFooter()
    {
        $this->createTable('footer', [
            'snet' => $this->string(32),
            'phones' => $this->string(32),
            'emails' => $this->string(32),
            'desc' => $this->text(),
        ]);

        $this->insert('footer', [
            'snet' => 'https://www.instagram.com/',
            'phones' => '+38(067) 555 55 55',
            'emails' => 'ukrdoors@gmail.com',
            'desc' => 'Et voluptates repudiandae sint et accusamus. Sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa.Sunt, explicabo inventore veritatis et harum quidem rerum hic tenetur.',

        ]);

        $this->insert('footer', [
            'snet' => 'https://www.facebook.com/',
            'phones' => '+38(095) 777 77 77',
            'emails' => 'ukrdoors@ukr.net',
            'desc' => 'Et voluptates repudiandae sint et accusamus. Sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa.Sunt, explicabo inventore veritatis et harum quidem rerum hic tenetur.',


        ]);



    }
}
