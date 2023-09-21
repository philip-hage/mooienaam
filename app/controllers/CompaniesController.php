<?php

class CompaniesController extends Controller
{
    private $companiesmodel;

    public function __construct()
    {
        $this->companiesmodel = $this->model('CompaniesModel');
    }

    public function index()
    {

        $data = [
            'title' => 'Companies'
        ];

        $this->view('companies/index', $data);
    }

    public function companiesOverview($pageNumber = NULL)
    {

        $recordsPerPage = 2;
        $offset = ($pageNumber * $recordsPerPage) - $recordsPerPage;
        $totalRecords = count($this->companiesmodel->getCompanies());
        $companies = $this->companiesmodel->getCompaniesByPagnination($offset, $recordsPerPage);
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
            'title' => 'Overview Companies',
            'companies' => $companies,
            'pageNumber' => $pageNumber,
            'nextPage' => $nextPage,
            'previousPage' => $previousPage,
            'totalPages' => $totalPages,
            'firstPage' => $firstPage,
            'secondPage' => $secondPage,
            'thirdPage' => $thirdPage
        ];
        $this->view('companies/companiesOverview', $data);
    }

    public function updateCompany($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->companiesmodel->updateCompany($_POST);

            if (!$result)
            {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview");
            } else
            {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview");
            }
        } else {
            $row = $this->companiesmodel->getCompaniesById($id);

            $data = [
                'row' => $row,
                'title' => 'Update company'
            ];
            $this->view('companies/updateCompany', $data);
        }

    }

    public function deleteCompany($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->companiesmodel->deleteCompany($id);

            if (!$result)
            {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview");
            } else
            {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview");
            }
        } else {
            $row = $this->companiesmodel->getCompaniesById($id);
            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this company?'
            ];
            $this->view('companies/deleteCompany', $data);
        }
    }

    public function createCompany()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->companiesmodel->createCompany($post);

            if ($result)
            {
                echo "The create was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview");
            } else
            {
                echo "The create was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview");
            }
        } else {
            $data = [
                'title' => 'Create company'
            ];
            $this->view('companies/createCompany', $data);
        }
    }
}