<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use app\models\Trip;
use app\models\Flight;
use app\models\Airport;
use yii\helpers\ArrayHelper;

/**
 * ContactForm is the model behind the contact form.
 */
class TripService extends ActiveRecord
{

    const SERVICE_ID = 2;

    public static function tableName()
    {
        return 'trip_service';
    }

    // public function search(Airport $airport = null) {
    //     $query = Trip::find();

    //     $query->innerJoinWith('services')
    //         ->andWhere(['trip.corporate_id' => Trip::CORPORATE_ID])
    //         ->andWhere(['trip_service.service_id' => static::SERVICE_ID])
    //     ;

    //     if($airport !== null) {
    //         $query
    //             ->innerJoinWith('flights')
    //             ->andWhere(['flight_segment.depAirportId' => $airport->airport_id])
    //         ;
    //     }
    
    //     $query
    //         ->groupBy(['trip.id'])
    //     ;

    //     $dataProvider = new ActiveDataProvider([
    //         'query' => $query,
    //     ]);

    //     return $dataProvider;
    // }

    public function getTrip() {
        return $this->hasOne(Trip::className(), ['id' => 'trip_id']);
    }

    public function getFlights() {
        return $this->hasMany(Flight::className(), ['flight_id' => 'id']);
    }

    public function getAirports() {
        return $this->hasMany(Airport::className(), ['airport_id' => 'depAirportId'])
            ->via('flights');
    }

    public static function getDb() {
        return Yii::$app->db1;
    }
}
