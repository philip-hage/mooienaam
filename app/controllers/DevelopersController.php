<?php

class DevelopersController extends Controller
{
    private $developersmodel;
    private $companiesmodel;

    public function __construct()
    {
        $this->developersmodel = $this->model('DevelopersModel');
        $this->companiesmodel = $this->model('CompaniesModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Developers'
        ];

        $this->view('developers/index', $data);
    }

    public function developersOverview($companyId = null)
    {
        $developers = $this->developersmodel->getDevelopersByCompany($companyId);
        $company = $this->companiesmodel->getCompaniesById($companyId);

        $data = [
            'title' => 'Overview Developers',
            'developers' => $developers,
            'company' => $company,
            'companyId' => $companyId
        ];
        $this->view('developers/developersOverview', $data);
    }

    public function updateDeveloper($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->developersmodel->updateDeveloper($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesoverview/1");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesoverview/1");
            }
        } else {
            $row = $this->developersmodel->getDeveloperById($id);

            $data = [
                'row' => $row,
                'title' => 'Update developer'
            ];

            $this->view('developers/updateDeveloper', $data);
        }
    }

    public function deleteDeveloper($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->developersmodel->deleteDeveloper($id);

            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesoverview/1");
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesoverview/1");
                }
        } else {
                $row = $this->developersmodel->getDeveloperById($id);
                $data = [
                    'row' => $row,
                    'title' => 'Are you sure you want to delete this developer?'
                ];
                $this->view('developers/deleteDeveloper', $data);
        }
    }

}