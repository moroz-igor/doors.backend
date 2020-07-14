<?php

use yii\db\Migration;

/**
 * Class m200304_173024_about_shop
 */
class m200304_173024_about_shop extends Migration
{
    public function up()
    {
        $this->createAboutShop();
    }

    public function down()
    {
        $this->dropTable('about_shop');

    }
    private function createAboutShop()
    {
        $this->createTable('about_shop', [
            'title' => $this->string(),
            'section' => $this->smallInteger(),
            'subtitle' => $this->string(),
            'paragraph_1' => $this->text(),
            'paragraph_2' => $this->text(),
            'paragraph_3' => $this->text(),

        ]);
        $this->insert('about_shop', [
            'title' => 'ПРО МАГАЗИН',
            'section' => 2,
            'subtitle' => 'Двері',
            'paragraph_1' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut aut odit aut rerum necessitatibus saepe eveniet. Quo voluptas nulla vero eos et iusto odio dignissimos ducimus. Et expedita distinctio ipsa, quae ab illo inventore veritatis. Ex ea commodi autem quibusdam et harum quidem rerum facilis. Omnis voluptas sit, amet, consectetur, adipisci velit, sed. Animi, id est eligendi optio, cumque nihil molestiae consequatur.',
            'paragraph_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut aut odit aut rerum necessitatibus saepe eveniet. Quo voluptas nulla vero eos et iusto odio dignissimos ducimus. Et expedita distinctio ipsa, quae ab illo inventore veritatis.',
        ]);
        $this->insert('about_shop', [
            'section' => 3,
            'subtitle' => 'Вікна',
            'paragraph_1' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut aut odit aut rerum necessitatibus saepe eveniet. Quo voluptas nulla vero eos et iusto odio dignissimos ducimus. Et expedita distinctio ipsa, quae ab illo inventore veritatis. Ex ea commodi autem quibusdam et harum quidem rerum facilis. Omnis voluptas sit, amet, consectetur, adipisci velit, sed. Animi, id est eligendi optio, cumque nihil molestiae consequatur.',
            'paragraph_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut aut odit aut rerum necessitatibus saepe eveniet. Quo voluptas nulla vero eos et iusto odio dignissimos ducimus. Et expedita distinctio ipsa, quae ab illo inventore veritatis. Ex ea commodi autem quibusdam et harum quidem rerum facilis.',
            'paragraph_3' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut aut odit aut rerum necessitatibus saepe eveniet. Quo voluptas nulla vero eos et iusto odio dignissimos ducimus. Et expedita distinctio ipsa, quae ab illo inventore veritatis. Ex ea commodi autem quibusdam et harum quidem rerum facilis.',
        ]);
        $this->insert('about_shop', [
            'section' => 4,
            'subtitle' => 'Фурнітура та ін...',
            'paragraph_1' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut aut odit aut rerum necessitatibus saepe eveniet. Quo voluptas nulla vero eos et iusto odio dignissimos ducimus. Et expedita distinctio ipsa, quae ab illo inventore veritatis. Ex ea commodi autem quibusdam et harum quidem rerum facilis. Omnis voluptas sit, amet, consectetur, adipisci velit, sed. Animi, id est eligendi optio, cumque nihil molestiae consequatur.',
            'paragraph_2' => 'Lorem ipsum dolor sit amet. Necessitatibus saepe eveniet, ut aut odit aut rerum necessitatibus saepe eveniet. Quo voluptas nulla vero eos et iusto odio dignissimos ducimus.',
        ]);
    }
}
