<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property int $id
 * @property string|null $date
 * @property string|null $no_quotation
 * @property string|null $name_company
 * @property string|null $contact_person
 * @property string|null $company_address
 * @property string|null $service_type
 * @property string|null $offered_by
 * @property string|null $offered_to
 */
class Quotation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['no_quotation', 'name_company', 'contact_person', 'company_address', 'service_type', 'offered_by', 'offered_to'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'no_quotation' => 'No Quotation',
            'name_company' => 'Name Company',
            'contact_person' => 'Contact Person',
            'company_address' => 'Company Address',
            'service_type' => 'Service Type',
            'offered_by' => 'Offered By',
            'offered_to' => 'Offered To',
        ];
    }
}
