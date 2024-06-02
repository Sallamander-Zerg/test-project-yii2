<?php

use yii\db\Migration;

/*
 * Handles the creation of table {{%user}}.
 */
class m240526_130358_create_user_table extends Migration
{
    /*
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'pasword' => $this->string(255)->notNull(),
        ]);
    }

    /*
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}