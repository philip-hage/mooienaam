<?php

class StoresModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getStores()
    {
        $this->db->query("SELECT storeId,
                                     storeName,
                                     storePhone,
                                     storeEmail,
                                     storeZipCode,
                                     storeCity FROM stores
                                     WHERE storeIsActive = 1");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getStoresByPagination($offset, $limit)
    {
        $this->db->query("SELECT storeId,
                                     storeName,
                                     storePhone,
                                     storeEmail,
                                     storeZipCode,
                                     storeCity FROM stores
                                     WHERE storeIsActive = 1 LIMIT :offset, :limit");
        $this->db->bind(':offset', $offset);
        $this->db->bind(':limit', $limit);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getStoresById($id)
    {
        $this->db->query("SELECT storeId,
                                    storeName,
                                    storePhone,
                                    storeEmail,
                                    storeZipCode,
                                    storeCity FROM stores
                                    WHERE storeId = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateStore($post)
    {
        $this->db->query("UPDATE stores SET storeName = :storename,
                                                    storePhone = :storephone, 
                                                    storeEmail = :storeemail, 
                                                    storeZipCode = :storezipcode, 
                                                    storeCity = :storecity 
                        WHERE storeId = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':storename', $post['storename']);
        $this->db->bind(':storephone', $post['storephone']);
        $this->db->bind(':storeemail', $post['storeemail']);
        $this->db->bind(':storezipcode', $post['storezipcode']);
        $this->db->bind(':storecity', $post['storecity']);
        $this->db->execute();
    }

    public function deleteStore($id)
    {
        $this->db->query("UPDATE stores SET storeIsActive = 0 WHERE storeId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function createStore($post)
    {
        global $var;
        $this->db->query("INSERT INTO stores (storeId,
                                                  storeName,
                                                  storePhone,
                                                  storeEmail,
                                                  storeZipCode,
                                                  storeCity,
                                                  storeCreateDate)
                              VALUES (:id, :storename, :storephone, :storeemail, :storezipcode, :storecity, :storecreatedate)");
        $this->db->bind(':id', $var['rand']);
        $this->db->bind(':storename', $post['storename'], PDO::PARAM_STR);
        $this->db->bind(':storephone', $post['storephone'], PDO::PARAM_STR);
        $this->db->bind(':storeemail', $post['storeemail'], PDO::PARAM_STR);
        $this->db->bind(':storezipcode', $post['storezipcode'], PDO::PARAM_STR);
        $this->db->bind(':storecity', $post['storecity'],  PDO::PARAM_STR);
        $this->db->bind(':storecreatedate', $var['timestamp'],  PDO::PARAM_STR);
        return $this->db->execute();
    }

    public function getPhonesByStore($storeId)
    {
        $this->db->query("SELECT p.phoneId,
                                     p.phoneName,
                                     s.storeId,
                                     s.storeName,
                                     sp.storeId,
                                     sp.phoneId,
                                     sp.phonePrice
                                     FROM storeshasphones as sp INNER JOIN phones as p ON sp.phoneId = p.phoneId
                                     INNER JOIN stores as s ON sp.storeId = s.storeId
                                     WHERE sp.storeId = :storeId AND sp.IsActive = 1");
        $this->db->bind(':storeId', $storeId);
        return $this->db->resultSet();
    }

    public function getPhonesByStoreById($phoneId)
    {
        $this->db->query("SELECT p.phoneId,
                                     p.phoneName,
                                     s.storeId,
                                     s.storeName,
                                     sp.storeId,
                                     sp.phoneId,
                                     sp.phonePrice
                                     FROM storeshasphones as sp INNER JOIN phones as p ON sp.phoneId = p.phoneId
                                     INNER JOIN stores as s ON sp.storeId = s.storeId
                                     WHERE sp.phoneId = :phoneId");
        $this->db->bind(':phoneId', $phoneId);
        return $this->db->single();
    }


    public function updatePrice($post)
    {
        $this->db->query("UPDATE storeshasphones SET phonePrice = :phoneprice
                                     WHERE phoneId = :phoneid AND storeId = :storeid");
        $this->db->bind(':phoneid', $post['id']);
        $this->db->bind(':storeid', $post['storeid']);
        $this->db->bind(':phoneprice', $post['phoneprice']);
        $this->db->execute();
    }

    public function deletePhoneFromStore($id)
    {
        $this->db->query("UPDATE storeshasphones SET IsActive = 0 WHERE phoneId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function getPhones()
    {
        $this->db->query("SELECT phoneId,
                                 phoneName
                                 FROM phones 
                                 WHERE phoneIsActive = 1");
        return $this->db->resultSet();
    }

    public function createStorePhone($post, $storeId)
    {
        $this->db->query("INSERT INTO storeshasphones (
                                                        storeId, phoneId, phonePrice
        ) VALUES (:storeid, :phoneid, :phoneprice )");

        $this->db->bind(':storeid', $storeId);
        $this->db->bind(':phoneid', $post['id']);
        $this->db->bind(':phoneprice', $post['phoneprice']);
        $this->db->execute();
    }

}