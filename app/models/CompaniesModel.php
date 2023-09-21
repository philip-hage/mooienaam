<?php

class CompaniesModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCompanies()
    {
        $this->db->query("SELECT 
                        companyId,
                        companyName,
                        companyPhone,
                        companyEmail,
                        companyCity
                        FROM companies 
                        WHERE companyIsActive = 1");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCompaniesByPagnination($offset, $limit)
    {
        $this->db->query("SELECT 
                        companyId,
                        companyName,
                        companyPhone,
                        companyEmail,
                        companyCity
                        FROM companies 
                        WHERE companyIsActive = 1 LIMIT :offset, :limit");
        $this->db->bind(':offset', $offset);
        $this->db->bind(':limit', $limit);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getCompaniesById($id)
    {
        $this->db->query("SELECT 
                        companyId,
                        companyName,
                        companyPhone,
                        companyEmail,
                        companyCity
                        FROM companies 
                        WHERE companyId = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updateCompany($post)
    {
        $this->db->query("UPDATE companies SET companyName = :companyname,
                                                companyPhone = :companyphone, 
                                                companyEmail = :companyemail, 
                                                companyCity = :companycity 
                        WHERE companyId = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':companyname', $post['companyname']);
        $this->db->bind(':companyphone', $post['companyphone']);
        $this->db->bind(':companyemail', $post['companyemail']);
        $this->db->bind(':companycity', $post['companycity']);
        $this->db->execute();
    }

    public function deleteCompany($id)
    {
        $this->db->query("UPDATE companies SET companyIsActive = 0 WHERE companyId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function createCompany($post)
    {
        global $var;
        $this->db->query("INSERT INTO companies (companyId,
                                                companyName,
                                                companyPhone,
                                                companyEmail,
                                                companyCity,
                                                   companyCreateDate
                                                )
                                VALUES (:id,
                                :companyname,
                                :companyphone,
                                :companyemail,
                                :companycity,
                                :companycreatedate
                                )");
        $this->db->bind(':id', $var['rand']);
        $this->db->bind(':companyname', $post['companyname'], PDO::PARAM_STR);
        $this->db->bind(':companyphone', $post['companyphone'], PDO::PARAM_STR);
        $this->db->bind(':companyemail', $post['companyemail'], PDO::PARAM_STR);
        $this->db->bind(':companycity', $post['companycity'], PDO::PARAM_STR);
        $this->db->bind(':companycreatedate', $var['timestamp'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}