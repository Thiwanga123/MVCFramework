<?php

class SupplierModel{

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getSuppliersWithinRadius($lat, $lng) {
        $maxDistance = 10 * 1000;

        $sql = "
            SELECT id, name, location, latitude, longitude, 
                (6371 * acos(cos(radians(:lat)) * cos(radians(latitude)) 
                * cos(radians(longitude) - radians(:lng)) 
                + sin(radians(:lat)) * sin(radians(latitude)))) AS distance 
            FROM suppliers
            HAVING distance <= :maxDistance
            ORDER BY distance";

        $stmt = $this->db->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':lat', $lat, PDO::PARAM_STR);
        $stmt->bindParam(':lng', $lng, PDO::PARAM_STR);
        $stmt->bindParam(':maxDistance', $maxDistance, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch the results
        $suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $suppliers;
    }
}

?>