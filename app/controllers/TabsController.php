<?php
class TabsController extends Controller {
    private $developersapplicationmodel;

    public function __construct()
    {
        $this->developersapplicationmodel = $this->model('DevelopersApplicationsModel');
    }

    public function applicationsTable($companyId) {
        $application = $this->developersapplicationmodel->getApplicationByCompany($companyId);
        
        $data = [
            'title' => 'Application Overview',
            'application' => $application,
            'companyId' => $companyId
        ];

        $this->view("tables/applicationsTable", $data);
    }
    
    public function developerTable($companyId) {
        $developer = $this->developersapplicationmodel->getDeveloperByCompany($companyId);

        $data = [
            'title' => 'Developer Application Overview',
            'developer' => $developer,
            'companyId' => $companyId
        ];

        $this->view("tables/developerTable", $data);
    }
}