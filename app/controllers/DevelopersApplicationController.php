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

    public function developerApplicationOverview($ids)
    {
        $ids = explode("+", $ids);
        $developer = $this->developersapplicationmodel->getDeveloperByCompany($ids[0]);
        $application = $this->developersapplicationmodel->getApplicationByCompany($ids[0]);

        $data = [
            'title' => 'Developer Application Overview',
            'developer' => $developer,
            'application' => $application,
            'companyId' => $ids[0]
        ];
        $this->view('developerapplication/developerApplicationOverview', $data);
    }

    public function updateDeveloper($ids)
    {
        $ids = explode("+", $ids);
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->developersapplicationmodel->updateDeveloper($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $ids[1]);
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/1/" . $ids[1]);
            }
        } else {
            $row = $this->developersapplicationmodel->getDeveloperById($ids[0]);

            $data = [
                'title' => 'Update Developer',
                'row' => $row,
                'developerId' => $ids[0],
                'companyId' => $ids[1]
            ];
            $this->view('developerapplication/developerUpdate', $data);
        }
    }

    public function deleteDeveloper($ids)
    {
        $ids = explode("+", $ids);
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->developersapplicationmodel->deleteDeveloper($ids[0]);

            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $ids[1]);
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/companiescontroller/companiesOverview/" . $ids[1]);
            }

        } else {
            $row = $this->developersapplicationmodel->getDeveloperById($ids[0]);

            $data = [
                'title' => 'Are you sure you want to delete this developer',
                'row' => $row,
                'developerId' => $ids[0],
                'companyId' => $ids[1]
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
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $id);
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/DevelopersApplicationController/" . $id);
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
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $id);
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/developerApplicationOverview/" . $id);
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

    public function applicationHasDevelopers($applicationId)
    {
        $applicationHasDevelopers = $this->developersapplicationmodel->getDeveloperByApplications($applicationId);
        $company = $this->companiesmodel->getCompaniesById($applicationId);


        $data = [
            'title' => 'Overview Application has developers',
            'applicationHasDevelopers' => $applicationHasDevelopers,
            'applicationId' => $applicationId,
            'company' => $company
        ];
        $this->view('developerapplication/applicationhasdeveloper', $data);
    }

    public function updateDeveloperHasApplication($ids)
    {
        $ids = explode("+", $ids);
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->developersapplicationmodel->updateDeveloperHasApplication($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/applicationHasDevelopers/" . $ids[1]);
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/applicationHasDevelopers/" . $ids[1]);
            }
        } else {
            $row = $this->developersapplicationmodel->getDeveloperById($ids[0]);

            $data = [
                'title' => 'Update Developer',
                'row' => $row,
                'developerId' => $ids[0],
                'applicationId' => $ids[1]
            ];
            $this->view('developerapplication/developerhasapplicationUpdate', $data);
        }
    }

    public function deleteDeveloperHasApplication($ids)
    {
        $ids = explode("+", $ids);
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->developersapplicationmodel->deleteDeveloperHasApplication($ids[0]);

            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/applicationHasDevelopers/" . $ids[1]);
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/applicationHasDevelopers/" / $ids[1]);
            }
        } else {
            $row = $this->developersapplicationmodel->getDeveloperByApplicationsById($ids[0]);

            $data = [
                'title' => 'Are you sure you want to delete this developer',
                'row' => $row,
                'developerId' => $ids[0],
                'applicationId' => $ids[1]
            ];
            $this->view('developerapplication/developerhasapplicationDelete', $data);
        }
    }

    public function createDeveloperApplication($applicationId = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->developersapplicationmodel->createDeveloperApplication($post, $applicationId);

            if (!$result) {
                echo "The create was successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/applicationHasDevelopers/" . $applicationId);
            } else {
                echo "The create was not successful";
                header("Refresh: 3; url=" . URLROOT . "/DevelopersApplicationController/applicationHasDevelopers/" . $applicationId);
            }
    } else {
        $developers = $this->developersapplicationmodel->getDevelopers($applicationId);

        $data = [
            'id' => $applicationId,
            'title' => 'Create Developer',
            'developers' => $developers
        ];
        $this->view('developerapplication/createDeveloperApplication', $data);
    }
}
}
