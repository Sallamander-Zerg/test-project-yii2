<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%UserRules}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%roles}}`
 */
class m240530_100430_create_UserRules_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%UserRules}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'role_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-UserRules-user_id}}',
            '{{%UserRules}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-UserRules-user_id}}',
            '{{%UserRules}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `role_id`
        $this->createIndex(
            '{{%idx-UserRules-role_id}}',
            '{{%UserRules}}',
            'role_id'
        );

        // add foreign key for table `{{%roles}}`
        $this->addForeignKey(
            '{{%fk-UserRules-role_id}}',
            '{{%UserRules}}',
            'role_id',
            '{{%roles}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-UserRules-user_id}}',
            '{{%UserRules}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-UserRules-user_id}}',
            '{{%UserRules}}'
        );

        // drops foreign key for table `{{%roles}}`
        $this->dropForeignKey(
            '{{%fk-UserRules-role_id}}',
            '{{%UserRules}}'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            '{{%idx-UserRules-role_id}}',
            '{{%UserRules}}'
        );

        $this->dropTable('{{%UserRules}}');
    }
}
