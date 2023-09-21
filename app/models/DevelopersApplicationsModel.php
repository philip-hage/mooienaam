<?php 

class DevelopersApplicationsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getDeveloperByCompany($developerid)
    {
        $this->db->query("SELECT c.companyId,
                                 d.developerId,
                                 d.developerCompanyId,
                                 d.developerFirstName,
                                 d.developerLastName
                                 FROM developers as d INNER JOIN companies as c ON d.developerCompanyId = c.companyId
                                 WHERE d.developerCompanyId = :id AND d.developerIsActive = 1");
        $this->db->bind(':id', $developerid);
        return $this->db->resultSet();
    }

    public function getDeveloperById($id)
    {
        $this->db->query("SELECT c.companyId,
                                 d.developerId,
                                 d.developerCompanyId,
                                 d.developerFirstName,
                                 d.developerLastName
                                 FROM developers as d INNER JOIN companies as c ON d.developerCompanyId = c.companyId
                                 WHERE d.developerId = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function deleteDeveloper($id)
    {
        $this->db->query("UPDATE developers SET developerIsActive = 0 WHERE developerId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function updateDeveloper($post)
    {
        $this->db->query("UPDATE developers SET developerFirstName = :developerfirstname,
                                                developerLastName = :developerlastname
                                            WHERE developerId = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':developerfirstname', $post['developerfirstname']);
        $this->db->bind(':developerlastname', $post['developerlastname']);
        $this->db->execute();
    }

    public function createDeveloper($post, $developerCompanyId)
    {
        global $var;
        $this->db->query("INSERT INTO developers (developerId,
                                                  developerCompanyId,
                                                  developerFirstName,
                                                  developerLastName,
                                                  developerCreateDate)
                                                  VALUES (:id, :developercompanyid, :developerfirstname, :developerlastname, :developercreatedate)");
        $this->db->bind(':id', $var['rand']);
        $this->db->bind('developercompanyid', $developerCompanyId);
        $this->db->bind(':developerfirstname', $post['developerfirstname']);
        $this->db->bind(':developerlastname', $post['developerlastname']);
        $this->db->bind(':developercreatedate', $var['timestamp']);
        $this->db->execute();
    }

    public function getApplicationByCompany($applicationid)
    {
        $this->db->query("SELECT c.companyId,
                                 a.applicationId,
                                 a.applicationCompanyId,
                                 a.applicationName,
                                 a.applicationUsage,
                                 a.applicationDateRelease,
                                 a.applicationRating,
                                 a.applicationPrice
                                 FROM applications as a INNER JOIN companies as c ON a.applicationCompanyId = c.companyId
                                 WHERE a.applicationCompanyId = :id AND a.applicationIsActive = 1");
        $this->db->bind(':id', $applicationid);
        return $this->db->resultSet();
    }

    public function getApplicationById($id)
    {
        $this->db->query("SELECT c.companyId,
                                 a.applicationId,
                                 a.applicationCompanyId,
                                 a.applicationName,
                                 a.applicationUsage,
                                 a.applicationDateRelease,
                                 a.applicationRating,
                                 a.applicationPrice
                                 FROM applications as a INNER JOIN companies as c ON a.applicationCompanyId = c.companyId
                                 WHERE a.applicationId = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateApplication($post)
    {
        $this->db->query("UPDATE applications SET applicationName = :applicationname,
                                                  applicationUsage = :applicationusage,
                                                  applicationDateRelease = :applicationdaterelease,
                                                  applicationRating = :applicationrating,
                                                  applicationPrice = :applicationprice
                                            WHERE applicationId = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':applicationname', $post['applicationname']);
        $this->db->bind(':applicationusage', $post['applicationusage']);
        $this->db->bind(':applicationdaterelease', $post['applicationdaterelease']);
        $this->db->bind(':applicationrating', $post['applicationrating']);
        $this->db->bind(':applicationprice', $post['applicationprice']);
        $this->db->execute();
    }

    public function deleteApplication($id)
    {
        $this->db->query("UPDATE applications SET applicationIsActive = 0 WHERE applicationId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function createApplication($post, $applicationCompanyId)
    {
        global $var;
        $this->db->query("INSERT INTO applications (applicationId,
                                                    applicationCompanyId,
                                                    applicationName,
                                                    applicationUsage,
                                                    applicationDateRelease,
                                                    applicationRating,
                                                    applicationPrice,
                                                    applicationCreateDate)
                                                    VALUES (:id, :applicationcompanyid, :applicationname, :applicationusage, :applicationdaterelease, :applicationrating, :applicationprice, :applicationcreatedate)
                                                    ");
        $this->db->bind(':id', $var['rand']);
        $this->db->bind(':applicationcompanyid', $applicationCompanyId);
        $this->db->bind(':applicationname', $post['applicationname']);
        $this->db->bind(':applicationusage', $post['applicationusage']);
        $this->db->bind(':applicationdaterelease', $post['applicationdaterelease']);
        $this->db->bind(':applicationrating', $post['applicationrating']);
        $this->db->bind(':applicationprice', $post['applicationprice']);
        $this->db->bind(':applicationcreatedate', $var['timestamp']);
        $this->db->execute();
    }

}