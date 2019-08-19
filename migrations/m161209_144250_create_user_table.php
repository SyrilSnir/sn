<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `user`.
 */
class m161209_144250_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'user_types_id' => $this->integer()->comment('Тип пользователя'),
            'fio' => $this->string()->comment('ФИО'),
            'birthday' => $this->date()->comment('Дата рождения'),
            'external' => $this->smallInteger()->notNull()->defaultValue(0)->comment('Признак авторизации из внешнего источника'),
            'created_by' => $this->integer()->notNull()->defaultValue(0)->comment('Кем создан'),
            'created_at' => $this->dateTime()->notNull()->comment('Дата создания'),
            'updated_at' => $this->dateTime()->notNull()->comment('Дата обновления'),
            'active' => $this->boolean()->notNull()->defaultValue(true)
        ], $tableOptions);

    }
    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
