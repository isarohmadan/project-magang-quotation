<?php

namespace app\models\table;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string|null $service_name
 * @property string|null $service_description
 * @property int|null $service_status
 * @property string|null $registration_fee
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_status'], 'integer'],
            [['service_name', 'service_description', 'registration_fee'], 'string', 'max' => 255],
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_name' => 'Service Name',
            'service_description' => 'Service Description',
            'service_status' => 'Service Status',
            'registration_fee' => 'Registration Fee',
        ];
    }
 
}
