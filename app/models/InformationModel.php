<?php

class InformationModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getContactByPhone($contactid)
    {
        $this->db->query("SELECT p.phoneId,
                                      c.contactId,
                                      c.contactPhoneId, 
                                     c.contactFirstName,
                                        c.contactLastName,
                                        c.contactEmail,
                                        c.contactNumber,
                                        c.contactBirthdayDate
                                        FROM contacts as c INNER JOIN phones as p ON c.contactPhoneId = p.phoneId
                                        WHERE c.contactPhoneId = :id AND c.contactIsActive = 1");
        $this->db->bind(':id', $contactid);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getSpecificationByPhone($specificationid)
    {
        $this->db->query("SELECT p.phoneId,
                                      s.specificationId,
                                      s.specificationPhoneId,
                                      s.specificationName,
                                      s.specificationValue
                                      FROM specifications as s INNER JOIN phones as p ON s.specificationPhoneId = p.phoneId
                                      WHERE s.specificationPhoneId = :id AND s.specificationIsActive = 1");
        $this->db->bind(':id', $specificationid);
        return $this->db->resultSet();
    }

    public function getMediaByPhone($mediaid)
    {
        $this->db->query("SELECT p.phoneId,
                                     m.mediaId,
                                     m.mediaPhoneId,
                                     m.mediaType,
                                     m.mediaPath
                                     FROM media as m INNER JOIN phones as p ON m.mediaPhoneId = p.phoneId
                                     WHERE m.mediaPhoneId = :id AND m.mediaIsActive = 1");
        $this->db->bind(':id', $mediaid);
        return $this->db->resultSet();
    }

    public function getContactById($id)
    {
        $this->db->query("SELECT p.phoneId,
                                     c.contactId,
                                     c.contactPhoneId,
                                     c.contactFirstName,
                                     c.contactLastName,
                                     c.contactEmail,
                                     c.contactNumber,
                                     c.contactBirthdayDate
                                     FROM contacts as c INNER JOIN phones as p ON c.contactPhoneId = p.phoneId
                                     WHERE c.contactId = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateContact($post)
    {
        $this->db->query("UPDATE contacts SET contactFirstName = :contactfirstname,
                                                     contactLastName = :contactlastname, 
                                                     contactEmail = :contactemail, 
                                                     contactNumber = :contactnumber, 
                                                     contactBirthdayDate = :contactbirthdaydate 
                         WHERE contactId = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':contactfirstname', $post['contactfirstname']);
        $this->db->bind(':contactlastname', $post['contactlastname']);
        $this->db->bind(':contactemail', $post['contactemail']);
        $this->db->bind(':contactnumber', $post['contactnumber']);
        $this->db->bind(':contactbirthdaydate', $post['contactbirthdaydate']);
        $this->db->execute();
    }

    public function deleteContact($id)
    {
        $this->db->query("UPDATE contacts SET contactIsActive = 0 WHERE contactId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function createContact($post, $contactPhoneId)
    {
        global $var;
        $this->db->query("INSERT INTO contacts (contactId,
                                                    contactPhoneId,
                                                    contactFirstName,
                                                    contactLastName,
                                                     contactEmail,
                                                        contactNumber,
                                                        contactBirthdayDate,
                                                    contactCreateDate) 
                                                    VALUES (:id, :contactphoneid, :contactfirstname, :contactlastname, :contactemail, :contactnumber, :contactbirthdaydate, :contactcreatedate)");
        $this->db->bind(':id', $var['rand']);
        $this->db->bind(':contactphoneid', $contactPhoneId);
        $this->db->bind(':contactfirstname', $post['contactfirstname']);
        $this->db->bind(':contactlastname', $post['contactlastname']);
        $this->db->bind(':contactemail', $post['contactemail']);
        $this->db->bind(':contactnumber', $post['contactnumber']);
        $this->db->bind(':contactbirthdaydate', $post['contactbirthdaydate']);
        $this->db->bind(':contactcreatedate', $var['timestamp']);
        $this->db->execute();
    }

    public function getSpecificationById($id)
    {
        $this->db->query("SELECT p.phoneId,
                                     s.specificationId,
                                     s.specificationPhoneId,
                                     s.specificationName,
                                     s.specificationValue
                                     FROM specifications as s INNER JOIN phones as p ON s.specificationPhoneId = p.phoneId
                                     WHERE s.specificationId = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateSpecification($post)
    {
        $this->db->query("UPDATE specifications SET specificationName = :specificationname,
                                                        specificationValue = :specificationvalue
                                                        WHERE specificationId = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':specificationname', $post['specificationname']);
        $this->db->bind(':specificationvalue', $post['specificationvalue']);
        $this->db->execute();
    }

    public function deleteSpecification($id)
    {
        $this->db->query("UPDATE specifications SET specificationIsActive = 0 WHERE specificationId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function createSpecification($post, $specificationPhoneId)
    {
        global $var;
        $this->db->query("INSERT INTO specifications (specificationId,
                                                          specificationPhoneId,
                                                          specificationName,
                                                           specificationValue,
                                                            specificationCreatedate)
                                                           VALUES(:id, :specificationphoneid, :specificationname, :specificationvalue, :specificationcreatedate)");
        $this->db->bind(':id', $var['rand']);
        $this->db->bind(':specificationphoneid', $specificationPhoneId);
        $this->db->bind(':specificationname', $post['specificationname']);
        $this->db->bind(':specificationvalue', $post['specificationvalue']);
        $this->db->bind(':specificationcreatedate', $var['timestamp']);
        return $this->db->execute();
    }

    public function createMedia($post, $mediaPhoneId)
    {
        global $var;
        $this->db->query("INSERT INTO media (
                                                mediaId,
                                                mediaPhoneId,
                                                mediaType,
                                                mediaPath,
                                                mediaCreate)
                                        VALUES(:id, :mediaphoneid, :mediatype, :mediapath, :mediacreate)");
        $this->db->bind(':id', $var['rand']);
        $this->db->bind(':mediaphoneid', $mediaPhoneId);
        $this->db->bind(':mediatype', $post['mediatype']);
        $this->db->bind(':mediapath', $post['mediapath']);
        $this->db->bind(':mediacreate', $var['timestamp']);
        return $this->db->execute();
    }
    public function updateMedia($post)
    {
        $this->db->query("UPDATE media SET mediaType = :mediatype,
                                           mediaPath = :mediapath
                                            WHERE mediaId = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':mediatype', $post['mediatype']);
        $this->db->bind(':mediapath', $post['mediapath']);
        $this->db->execute();
    }

    public function deleteMedia($id)
    {
        $this->db->query("UPDATE media SET mediaIsActive = 0 WHERE mediaId = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function getMediaById($id)
    {
        $this->db->query("SELECT    p.phoneId,
                                     m.mediaId,
                                     m.mediaPhoneId,
                                     m.mediaType,
                                     m.mediaPath
                                     FROM media as m INNER JOIN phones as p ON m.mediaPhoneId = p.phoneId
                                     WHERE m.mediaId = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }


}