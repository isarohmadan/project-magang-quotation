<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Quotation}}`.
 */
class m220720_063502_create_Quotation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quotation}}', [
            'id' => $this->primaryKey(),
            'date_quotation' => $this->date(),
            'no_quotation' => $this->string(),
            'name_company' => $this->string(),
            'contact_person' => $this->string(),
            'company_address' => $this->string(),
            'service_type' => $this->string(),
            'offered_by' => $this->string(),
            'offered_to' => $this->string(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Quotation}}');
    }
}
