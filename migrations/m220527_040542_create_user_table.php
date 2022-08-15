<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220527_040542_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'email' => $this->string(255),
            'username' => $this->string(255),
            'password' => $this->string(255),
            'access_token' => $this->string(255),
            'auth_key' => $this->string(255),
            'status' => $this->boolean(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        $this->insert('{{%user}}', [
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@detelnet.id',
            'username' => 'admin',
            'password' => \Yii::$app->security->generatePasswordHash('admin'),
            'access_token' => \Yii::$app->security->generateRandomString(128),
            'auth_key' => \Yii::$app->security->generateRandomString(128),
            'status' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $this->insert('{{%user}}', [
            'first_name' => 'Super',
            'last_name' => 'User',
            'email' => 'user@detelnet.id',
            'username' => 'user',
            'password' => \Yii::$app->security->generatePasswordHash('user'),
            'access_token' => \Yii::$app->security->generateRandomString(128),
            'auth_key' => \Yii::$app->security->generateRandomString(128),
            'status' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
