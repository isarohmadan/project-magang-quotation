<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 */
class m220720_063515_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'service_name' => $this->String(),
            'service_description' => $this->String(),
            'service_status' => $this->integer(11),
            'registration_fee' => $this->String(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
    }
}
