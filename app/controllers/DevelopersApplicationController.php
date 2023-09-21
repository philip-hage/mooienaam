<?php 

class DevelopersApplicationController extends Controller
{
    private $developersapplicationmodel;
    private $companiesmodel;

    public function __construct()
    {
        $this->developersapplicationmodel = $this->model('DevelopersApplicationsModel');
        $this->companiesmodel = $this->model('CompaniesModel');
    }

    public function index()
    {
       $data = [
        'title' => 'information'
       ];

        $this->view('developerapplication/index', $data);
    }

    public function developerApplicationOverview($companyId = null)
    {
        $developer = $this->developersapplicationmodel->getDeveloperByCompany($companyId);
        $application = $this->developersapplicationmodel->getApplicationByCompany($companyId);

        $data = [
            'title' => 'Developer Application Overview',
            'developer' => $developer,
            'application' => $application,
            'companyId' => $companyId
        ];
        $this->view('developerapplication/developerApplicationOverview', $data);
    }

    public function updateDeveloper($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->developersapplicationmodel->updateDeveloper($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            }
        } else {
            $row = $this->developersapplicationmodel->getDeveloperById($id);

            $data = [
                'title' => 'Update Developer',
                'row' => $row
            ];
            $this->view('developerapplication/developerUpdate', $data);
        }
    }

    public function deleteDeveloper($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->developersapplicationmodel->deleteDeveloper($id);

            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            }

        } else {
            $row = $this->developersapplicationmodel->getDeveloperById($id);

            $data = [
                'title' => 'Are you sure you want to delete this developer',
                'row' => $row
            ];
            $this->view('developerapplication/developerDelete', $data);
        }
    }

    public function createDeveloper($developerCompanyId = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->developersapplicationmodel->createDeveloper($post, $developerCompanyId);

            if (!$result)
            {
                echo "The create was successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $developerCompanyId);
            } else
            {
                echo "The create was not successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $developerCompanyId);
            }
        } else {
            $data = [
                'title' => 'Create Developer',
                'id' => $developerCompanyId
            ];
            $this->view('developerapplication/developerCreate', $data);
        }
    }

    public function updateApplication($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->developersapplicationmodel->updateApplication($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            }
        } else {
            $row = $this->developersapplicationmodel->getApplicationById($id);

            $data = [
                'title' => 'Update Application',
                'row' => $row
            ];
            $this->view('developerapplication/applicationUpdate', $data);
        }
    }

    public function deleteApplication($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->developersapplicationmodel->deleteApplication($id);

            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/1");
            }
        } else {
            $row = $this->developersapplicationmodel->getApplicationById($id);

            $data = [
                'title' => 'Are you sure you want to delete this developer',
                'row' => $row
            ];
            $this->view('developerapplication/applicationDelete', $data);
        }
    }

    public function createApplication($applicationCompanyId = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $result = $this->developersapplicationmodel->createApplication($post, $applicationCompanyId);

            if (!$result)
            {
                echo "The create was successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $applicationCompanyId);
            } else
            {
                echo "The create was not successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $applicationCompanyId);
            }

        } else {
            $data = [
                'title' => 'Create Application',
                'id' => $applicationCompanyId
            ];
            $this->view('developerapplication/applicationCreate', $data);
        }
    }
}

?>