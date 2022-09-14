<?php
interface CalculDistance {
    /**
     * Retourne la distance en mètres entre 2 points GPS exprimés en degrés.
     * @param float $lat1 Latitude du premier point GPS
     * @param float $long1 Longitude du premier point GPS
     * @param float $lat2 Latitude du second point GPS
     * @param float $long2 Longitude du second point GPS
     * @return float La distance entre les deux points GPS
     */
    public function calculDistance2PointsGPS(float $lat1, float $long1, float $lat2, float $long2): float {
        $R = 6378.137;
        $lat1 = Π×($lat1)/180;
        $lat2 = Π×($lat2)/180;
        $long1= Π×($long1)/180;
        $long2 = Π×($long2)/180;
        $d = $R*acos(sin($lat2)*sin($lat1)+cos($lat2)*cos($lat1)*cos($long2-$long1));
        return $d;
    }


    /**
     * Retourne la distance en mètres du parcours passé en paramètres. Le parcours est
     * défini par un tableau ordonné de points GPS.
     * @param Array $parcours Le tableau contenant les points GPS
     * @return float La distance du parcours
     */
    public function calculDistanceTrajet(Array $parcours): float {
        $distance = 0;
        for ($i = 1; $i <= count($parcours)-1; $i+=2) {
            $distance += calculDistance2PointsGPS($parcours[0]["latitude"],
                                                    $parcours[0]["longitude"],
                                                    $parcours[1]["latitude"],
                                                    $parcours[1]["longitude"])
        }
        return $distance;
    }
}
?>
