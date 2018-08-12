<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Airport extends ActiveRecord
{
    //public $value;

    public static function tableName()
    {
        return '{{nemo_guide_etalon}}.{{' . static::getDb()->getSchema()->getRawTableName('airport_name') . '}}';
    }

    public function rules()
    {
        return [
            [['value'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'value' => 'Airport',
        ];
    }

    public function search() {
        $query = Airport::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public static function getDb() {
        return Yii::$app->db2;
    }
}
