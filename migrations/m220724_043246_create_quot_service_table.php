<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quot_service}}`.
 */
class m220724_043246_create_quot_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quot_service}}', [
            'id' => $this->primaryKey(),
            'id_quotation' => $this->integer(),
            'id_service' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%quot_service}}');
    }
}
