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
        $totalRecords = count($this->companiesmodel->getCompanies());
        $pagination = $this->pagination($pageNumber, 4, $totalRecords);

        $companies = $this->companiesmodel->getCompaniesByPagnination($pagination['offset'], $pagination['recordsPerPage']);

        $data = [
            'title' => 'Overview Companies',
            'companies' => $companies,
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
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            } else
            {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
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
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            } else
            {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
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