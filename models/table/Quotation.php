<?php

namespace app\models\table;

use Yii;
use app\lib\GetName;
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

    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['name_company', 'contact_person', 'company_address', 'service_type', 'offered_by', 'offered_to'], 'string', 'max' => 255],
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
