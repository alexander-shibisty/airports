<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use app\models\Airport;

/**
 * ContactForm is the model behind the contact form.
 */
class Flight extends ActiveRecord
{

    public static function tableName()
    {
        return 'flight_segment';
    }

    public function getAirports() {
        return $this->hasMany(Airport::className(), ['depAirportId' => 'airport_id']);
    }

    public static function getDb() {
        return Yii::$app->db1;
    }
}
