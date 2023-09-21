<?php

class ManufacturersController extends Controller
{
    private $manufacturersmodel;

    public function __construct()
    {
        $this->manufacturersmodel = $this->model('ManufacturersModel');
    }

    public function index()
    {

        $data = [
            'title' => 'ManufacturersController'
        ];

        $this->view('manufacturers/index', $data);
    }

    public function manufacturersOverview($pageNumber = NULL)
    {
        $totalRecords = count($this->manufacturersmodel->getManufacturers());

        $pagination = $this->pagination($pageNumber, 4, $totalRecords);

        $manufacturers = $this->manufacturersmodel->getManufacturerByPagination($pagination['offset'], $pagination['recordsPerPage']);


        $data = [
            'title' => 'Overview Manufacturers',
            'manufacturers' => $manufacturers,
            'pageNumber' => $pagination['pageNumber'],
            'nextPage' => $pagination['nextPage'],
            'previousPage' => $pagination['previousPage'],
            'totalPages' => $pagination['totalPages'],
            'firstPage' => $pagination['firstPage'],
            'secondPage' => $pagination['secondPage'],
            'thirdPage' => $pagination['thirdPage'],
            'offset' => $pagination['offset'],
            'recordsPerPage' => $pagination['recordsPerPage']
        ];
        $this->view('manufacturers/manufacturersOverview', $data);
    }

    public function updateManufacturer($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


            $result = $this->manufacturersmodel->updateManufacture($_POST);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/manufacturerscontroller/manufacturersOverview");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/manufacturerscontroller/manufacturersOverview");
            }

        } else {
            $row = $this->manufacturersmodel->getManufacturersById($id);

            $data = [
                'row' => $row,
                'title' => 'Update manufacturer'
            ];
            $this->view('manufacturers/updateManufacturer', $data);
        }
    }

    public function deleteManufacturer($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->manufacturersmodel->deleteManufacture($id);

            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/manufacturerscontroller/manufacturersOverview");
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/manufacturerscontroller/manufacturersOverview");
            }
        } else {


            $row = $this->manufacturersmodel->getManufacturersById($id);

            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this manufacturer?'
            ];
            $this->view('manufacturers/deleteManufacturer', $data);
        }
    }

    public function createManufacturer()
    {

        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $this->manufacturersmodel->createManufacture($_POST);
            header("Location: " . URLROOT . "/manufacturerscontroller/manufacturersOverview");
        } else {

            $data = [
                'title' => 'Create manufacturer'
            ];
            $this->view('manufacturers/createManufacturer', $data);
        }
    }
}

