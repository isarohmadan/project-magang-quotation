<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "quot_service".
 *
 * @property int $id
 * @property int|null $id_quotation
 * @property int|null $id_service
 */
class QuotService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quot_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_quotation', 'id_service'], 'integer'],
            [['id_quotation', 'id_service'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_quotation' => 'Id Quotation',
            'id_service' => 'Id Service',
        ];
    }
    public function getService(){
        return $this->hasMany(Service::class, ['id' => 'id_service']);
    }
}
