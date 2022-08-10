<?php

namespace app\models\table;

use app\lib\GetName;
use Yii;

/**
 * This is the model class for table "quotation".
 *
 * @property int $id
 * @property string|null $date_quotation
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
            [['date_quotation'], 'safe'],
            [['no_quotation', 'name_company', 'contact_person', 'company_address', 'service_type', 'offered_by', 'offered_to'], 'string', 'max' => 255],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => 'bahirul\yii2\autonumber\Behavior',
                'attribute' => 'no_quotation',
                'value' => function($event){
                    $generate = GetName::getName($this->name_company);
                    return '?'.'/'.'QUOT-'.$generate.'/'.date('Y-m-d') ;
                },
                'digit' => 3
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_quotation' => 'Date Quotation',
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
