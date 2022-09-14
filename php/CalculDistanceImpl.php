<?php
class CalculDistanceImpl implements CalculDistance {

   const R = 6378.137;
    /**
     * Retourne la distance en mètres entre 2 points GPS exprimés en degrés.
     * @param float $lat1 Latitude du premier point GPS
     * @param float $long1 Longitude du premier point GPS
     * @param float $lat2 Latitude du second point GPS
     * @param float $long2 Longitude du second point GPS
     * @return float La distance entre les deux points GPS
     */
    public function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2){
        $lat1 = degreVersRad($lat1);
        $lat2 = degreVersRad($lat2);
        $long1= degreVersRad($long1);
        $long2 = degreVersRad($long2);
        return (self::$R*acos(sin($lat2)*sin($lat1)+cos($lat2)*cos($lat1)*cos($long2-$long1)));
    }


    /**
     * Retourne la distance en mètres du parcours passé en paramètres. Le parcours est
     * défini par un tableau ordonné de points GPS.
     * @param Array $parcours Le tableau contenant les points GPS
     * @return float La distance du parcours
     */
    public function calculDistanceTrajet(Array $parcours){
        $distTotale = 0;
        var_dump(count($parcours));
        for ($i = 0; $i < count($parcours)-1; ++$i) {
            $distTotale += $this -> calculDistance2PointsGPS(($parcours[$i]["latitude"]), ($parcours[$i]["longitude"]),($parcours[$i+1]["latitude"]),($parcours[$i+1]["longitude"]));
        }
        return $distTotale;
    }

    private function degreVersRad(float $deg){
        return pi*($deg)/180;
    }
}
?>
