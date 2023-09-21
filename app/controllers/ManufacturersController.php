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
        $recordsPerPage =4;
        $offset = ($pageNumber * $recordsPerPage) - $recordsPerPage;
        $totalRecords = count($this->manufacturersmodel->getManufacturers());
        $manufacturers = $this->manufacturersmodel->getManufacturerByPagination($offset, $recordsPerPage);
        $nextPage = $pageNumber + 1;
        $previousPage = $pageNumber - 1;
        $totalPages = ceil($totalRecords / $recordsPerPage);
        $firstPage = 1;
        $secondPage = 2;
        $thirdPage = 3;

    // Page number 1
        if ($pageNumber == 1) {
            $firstPage = $pageNumber;
        } else {
            if ($pageNumber == $totalPages) {
                $firstPage = $pageNumber - 2;
            } else {
                $firstPage = $pageNumber - 1;
            }
        }

        //Page number 2
        if($pageNumber != 1)
        {
            $secondPage = $pageNumber;
            if($pageNumber == $totalPages) {
               $secondPage = $pageNumber - 1;
            }else {
                $secondPage = $pageNumber;
            }
        }else {
            $secondPage = $pageNumber + 1;
        }

        //Page number 3
        if ($pageNumber == 1 || $pageNumber == 2) {
            $thirdPage = 3;
        } elseif ($pageNumber == $totalPages) {
            $thirdPage = $pageNumber;
        } else {
            $thirdPage = $pageNumber + 1;
        }

        $data = [
            'title' => 'Overview Manufacturers',
            'manufacturers' => $manufacturers,
            'pageNumber' => $pageNumber,
            'nextPage' => $nextPage,
            'previousPage' => $previousPage,
            'totalPages' => $totalPages,
            'firstPage' => $firstPage,
            'secondPage' => $secondPage,
            'thirdPage' => $thirdPage
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

