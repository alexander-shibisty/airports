<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use app\models\TripService;

/**
 * ContactForm is the model behind the contact form.
 */
class Trip extends ActiveRecord
{

    public $description;
    const CORPORATE_ID = 3;

    public static function tableName()
    {
        return 'trip';
    }

    public function search(Airport $airport = null) {
        $query = Trip::find();

        $query
            ->andWhere(['trip.corporate_id' => Trip::CORPORATE_ID])
        ;

        if($airport !== null) {
            $query
                ->innerJoinWith('flights')
                ->andWhere(['flight_segment.depAirportId' => $airport->airport_id])
                ->andWhere(['trip_service.service_id' => TripService::SERVICE_ID])
            ;
        }
    
        $query
            ->groupBy(['id'])
        ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function getServices() {
        return $this->hasMany(TripService::className(), ['trip_id' => 'id']);
    }

    public function getFlights() {
        return $this->hasMany(Flight::className(), ['flight_id' => 'id'])
            ->via('services');
    }

    public static function getDb() {
        return Yii::$app->db1;
    }
}
