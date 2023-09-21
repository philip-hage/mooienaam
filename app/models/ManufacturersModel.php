<?php

class ManufacturersModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getManufacturers()
    {
        $this->db->query(" SELECT 
                        manufacturerId, 
                        manufactureName,
                        manufacturePhoneNumber,
                        manufactureEmail,
                        manufactureZipCode,
                        manufactureCity
                        FROM manufacturers
                        WHERE manufactureIsActive = 1 ORDER BY manufactureName ASC
                        ");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getManufacturerByPagination($offset, $limit)
    {
        $this->db->query(" SELECT 
                        manufacturerId, 
                        manufactureName,
                        manufacturePhoneNumber,
                        manufactureEmail,
                        manufactureZipCode,
                        manufactureCity
                        FROM manufacturers
                        WHERE manufactureIsActive = 1 ORDER BY manufactureName ASC LIMIT :offset, :limit
                        ");

        $this->db->bind(':offset', $offset);
        $this->db->bind(':limit', $limit);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getManufacturersById($id)
    {
        $this->db->query(" SELECT
                        manufacturerId,
                        manufactureName,
                        manufacturePhoneNumber,
                        manufactureEmail,
                        manufactureZipCode,
                        manufactureCity
                        FROM manufacturers
                        WHERE manufacturerId = :id
                        ");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateManufacture($post)
    {
        try {
            $this->db->query("UPDATE manufacturers SET manufactureName = :manufacturename,
                                                        manufacturePhoneNumber = :manufacturephonenumber, 
                                                        manufactureEmail = :manufactureemail, 
                                                        manufactureZipCode = :manufacturezipcode, 
                                                        manufactureCity = :manufacturecity 
                            WHERE manufacturerId = :id");
            $this->db->bind(':id', $post['id']);
            $this->db->bind(':manufacturename', $post['manufacturename']);
            $this->db->bind(':manufacturephonenumber', $post['manufacturephonenumber']);
            $this->db->bind(':manufactureemail', $post['manufactureemail']);
            $this->db->bind(':manufacturezipcode', $post['manufacturezipcode']);
            $this->db->bind(':manufacturecity', $post['manufacturecity']);
            $this->db->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteManufacture($id)
    {
        $this->db->query("UPDATE manufacturers SET manufactureIsActive = 0 WHERE manufacturerId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function createManufacture($post)
    {
        global $var;
        $this->db->query("INSERT INTO manufacturers (manufacturerId, 
                                                        manufactureName, 
                                                        manufacturePhoneNumber, 
                                                        manufactureEmail, 
                                                        manufactureZipCode, 
                                                        manufactureCity,
                                                        manufactureCreateDate) 
                                VALUES (:id, :manufacturename, :manufacturephonenumber, :manufactureemail, :manufacturezipcode, :manufacturecity, :manufactureCreateDate)");
        $this->db->bind(":id", $var['rand']);
        $this->db->bind(":manufacturename", $post["manufacturename"], PDO::PARAM_STR);
        $this->db->bind(":manufacturephonenumber", $post["manufacturephonenumber"], PDO::PARAM_STR);
        $this->db->bind(":manufactureemail", $post["manufactureemail"], PDO::PARAM_STR);
        $this->db->bind(":manufacturezipcode", $post["manufacturezipcode"], PDO::PARAM_STR);
        $this->db->bind(":manufacturecity", $post["manufacturecity"], PDO::PARAM_STR);
        $this->db->bind(":manufactureCreateDate", $var['timestamp'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}