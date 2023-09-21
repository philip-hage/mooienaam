<?php

class DevelopersModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDevelopers()
    {
        $this->db->query("SELECT developerId,
                                    developerName,
                                    FROM developers
                                    WHERE developerIsActive = 1");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getDeveloperById($id)
    {
        $this->db->query("SELECT developerId,
                                     developerName
                                     FROM developers WHERE developerId = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getDevelopersByCompany($companyId)
    {
        $this->db->query("SELECT d.developerId,
                                     d.developerName,
                                     c.companyId,
                                     c.companyName,
                                     chd.companyId,
                                     chd.developerId
                                     FROM companieshasdevelopers as chd INNER JOIN developers as d ON chd.developerId = d.developerId
                                     INNER JOIN companies as c ON chd.companyId = c.companyId
                                     WHERE chd.companyId = :companyId AND d.developerIsActive = 1");
        $this->db->bind(':companyId', $companyId);
        $row = $this->db->resultSet();
        return $row;
    }

    public function updateDeveloper($post)
    {
        $this->db->query("UPDATE developers SET developerName = :developername
                                    WHERE developerId = :id");
        $this->db->bind(':developername', $post['developername']);
        $this->db->bind(':id', $post['id']);
        $this->db->execute();
    }

    public function deleteDeveloper($id)
    {
        $this->db->query("UPDATE developers SET developerIsActive = 0 WHERE developerId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

}