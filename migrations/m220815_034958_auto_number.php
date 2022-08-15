<?php

use yii\db\Migration;

/**
 * Class m220815_034958_auto_number
 */
class m220815_034958_auto_number extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        CREATE TABLE auto_number (
            "group" varchar(32) NOT NULL,
            "number" int,
            optimistic_lock int,
            update_time int,
            PRIMARY KEY ("group")
        );
        $this->createTable("news", [
            "group" => $this->varchar(255)->notNull(),
            "title" => $this->int(100),
         ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220815_034958_auto_number cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220815_034958_auto_number cannot be reverted.\n";

        return false;
    }
    */
}
