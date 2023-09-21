<?php

class PersoonsgegevensModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getGegevens()
    {
        $this->db->query("SELECT 
                                    pers.Id AS PersoonId,
                                    pers.Voornaam,
                                    pers.Achternaam,
                                    pers.Tussenvoegsel,
                                    pers.IsVolwassen,
                                    pers.DatumAangemaakt,
                                    ct.Id AS ContactId,
                                    ct.Mobiel,
                                    ct.Email,
                                    tp.Id FROM TypePersoon AS tp INNER JOIN Persoon AS pers ON tp.Id = pers.TypePersoonId
                                    INNER JOIN Contact AS ct ON pers.Id = ct.PersoonId
                                    WHERE tp.Id = 1 ORDER BY pers.Achternaam ASC
                                   ");
        $results = $this->db->resultSet();
        return $results;
    }

    public function getGegevensById($id)
    {
        $this->db->query("SELECT 
                                    pers.Id AS PersoonId,
                                    pers.Voornaam,
                                    pers.Achternaam,
                                    pers.Tussenvoegsel,
                                    pers.IsVolwassen,
                                    ct.Id AS ContactId,
                                    ct.Mobiel,
                                    ct.Email,
                                    tp.Id FROM TypePersoon AS tp INNER JOIN Persoon AS pers ON tp.Id = pers.TypePersoonId
                                    INNER JOIN Contact AS ct ON pers.Id = ct.PersoonId
                                    WHERE pers.Id = :id
                                   ");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function updatePersoonsGegevens($post)
    {
        $this->db->query("UPDATE contact SET Email = :email WHERE Id = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':email', $post['Email']);
        $this->db->execute();
    }
}
