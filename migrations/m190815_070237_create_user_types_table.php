<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_types}}`.
 */
class m190815_070237_create_user_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_types}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('Название типа пользователя'),
            'slug' => $this->string()->notNull()->comment('Идентификатор типа пользователя'),
        ]);
        $this->addForeignKey(
                '{{%fk-users-user_types_id}}', 
                '{{%users}}', 
                'user_types_id', 
                '{{%user_types}}', 
                '{{id}}');
        $this->createIndex(
                '{{idx-users-user_types_id}}', 
                '{{%users}}',
                '{{user_types_id}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_types}}');
    }
}
