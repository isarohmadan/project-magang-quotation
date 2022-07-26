<?php

use yii\db\Migration;

/**
 * Class m220721_070600_quot_service_table
 */
class m220721_070600_quot_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quot_service}',[
            'id'=>$this->primaryKey(),
            'id_quotation'=> $this->integer(),
            'id_service'=> $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220721_070600_quot_service_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220721_070600_quot_service_table cannot be reverted.\n";

        return false;
    }
    */
}
