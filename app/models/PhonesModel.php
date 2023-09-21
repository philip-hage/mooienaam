<?php

class PhonesModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPhone()
    {
        $this->db->query("SELECT p.phoneId as PhoneId, 
                                     p.phoneName,
                                     m.manufacturerId FROM manufacturers as m INNER JOIN phones as p ON m.manufacturerId = p.phoneManufactureId 
                                     WHERE p.phoneIsActive = 1");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getPhoneById($id)
    {
        $this->db->query("SELECT p.phoneId,
                                   p.phoneName,
                                   m.manufacturerId FROM manufacturers as m INNER JOIN phones as p ON m.manufacturerId = p.phoneManufactureId
                                     WHERE p.phoneId = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function getPhoneByManufacturer($phoneid)
    {
        $this->db->query("SELECT p.phoneId,
                                     p.phoneName,
                                     p.phoneManufactureId,
                                     m.manufactureName 
                            FROM phones as p 
                                INNER JOIN manufacturers as m ON m.manufacturerId = p.phoneManufactureId
                                     WHERE p.phoneManufactureId = :id AND p.phoneIsActive = 1");
        $this->db->bind(':id', $phoneid);
        $row = $this->db->resultSet();
        return $row;
    }

    public function getPhoneByManufacturerByPagination($phoneid, $offset, $limit)
    {
        $this->db->query("SELECT p.phoneId,
                                     p.phoneName,
                                     p.phoneManufactureId,
                                     m.manufactureName 
                            FROM phones as p 
                                INNER JOIN manufacturers as m ON m.manufacturerId = p.phoneManufactureId
                                     WHERE p.phoneManufactureId = :id AND p.phoneIsActive = 1 LIMIT :offset, :limit");
            $this->db->bind(':offset', $offset);
            $this->db->bind(':limit', $limit);
        $this->db->bind(':id', $phoneid);
        $row = $this->db->resultSet();
        return $row;
    }

    public function updatePhone($post)
    {
        $this->db->query("UPDATE phones SET phoneName = :phonename
                               WHERE phoneId = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':phonename', $post['phonename']);
        $this->db->execute();
    }

    public function deletePhone($id)
    {
        $this->db->query("UPDATE phones SET phoneIsActive = 0 WHERE phoneId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function createPhone($post, $phoneManufactureId)
    {
        global $var;
        $this->db->query("INSERT INTO phones (phoneId, phoneName, phoneManufactureId, phoneCreateDate) VALUES (:id, :phonename, :phoneManufactureId, :phoneCreateDate)");
        $this->db->bind(':id', $var['rand']);
        $this->db->bind(':phonename', $post['phonename'], PDO::PARAM_STR);
        $this->db->bind(':phoneManufactureId', $phoneManufactureId);
        $this->db->bind(':phoneCreateDate', $var['timestamp'], PDO::PARAM_STR);
        $this->db->execute();
    }


}