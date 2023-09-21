<?php

class Persoonsgegevens extends Controller
{
    private $persoonsgegevensModel;

    public function __construct()
    {
        $this->persoonsgegevensModel = $this->model('PersoonsgegevensModel');
    }

    public function index()
    {

        $data = [
            'title' => 'Persoonsgegevens',
        ];

        $this->view('persoonsgegevens/index', $data);
    }

    public function persoonsGegevensOverzicht()
    {
        $persoonsGegevens = $this->persoonsgegevensModel->getGegevens();

        $rows = '';
        foreach ($persoonsGegevens as $value) {
            $rows .= "<tr> 
                            <td>" . $value->Voornaam . "</td>
                            <td>" . $value->Tussenvoegsel . "</td> 
                            <td>" . $value->Achternaam . "</td>
                            <td>" . $value->Mobiel . "</td>
                            <td>" . $value->Email . "</td>
                            <td>" . $value->IsVolwassen . "</td>  
                            <td><a href='" . URLROOT . "/persoonsgegevens/update/" . $value->PersoonId . "'>Wijzigen</a></td>  
            ";
        }

        $data = [
            'title' => 'Overzicht klanten',
            'rows' => $rows
        ];
        $this->view('persoonsgegevens/overzicht', $data);
    }

    public function update($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->persoonsgegevensModel->updatePersoonsGegevens($_POST);

            if ($result) {
                echo "Het toevoegen is niet gelukt";
                header("Refresh: 3; url=" . URLROOT . "/persoonsgegevens/persoonsGegevensOverzicht");
            } else {
                echo "Het toevoegen is gelukt";
                header("Refresh: 3; url=" . URLROOT . "/persoonsgegevens/persoonsGegevensOverzicht");
            }
        } else {
            $row = $this->persoonsgegevensModel->getGegevensById($id);
            $data = [
                'title' => 'Klant details',
                'row' => $row
            ];
            $this->view('persoonsgegevens/update', $data);
        }
    }
}
