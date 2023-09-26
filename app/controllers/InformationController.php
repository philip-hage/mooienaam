<?php

class InformationController extends Controller
{
    private $informationModel;
    private $phonesmodel;
    private $manufacturersmodel;
    public function __construct()
    {
        $this->informationModel = $this->model('InformationModel');
        $this->phonesmodel = $this->model('PhonesModel');
        $this->manufacturersmodel = $this->model('ManufacturersModel');
    }

    public function index()
    {
        $data = [
            'title' => 'Information'
        ];

        $this->view('information/index', $data);
    }

    public function informationOverview($ids)
    {
        $ids = explode("+", $ids);
        // var_dump($ids);exit;
        $contact = $this->informationModel->getContactByPhone($ids[0]);
        $specification = $this->informationModel->getSpecificationByPhone($ids[0]);
        $media = $this->informationModel->getMediaByPhone($ids[0]);
        $manufacturer = $this->manufacturersmodel->getManufacturersById($ids[1]);



        $data = [
            'contact' => $contact,
            'title' => 'Overview information',
            'specification' => $specification,
            'media' => $media,
            'phoneId' => $ids[0],
            'manufacturer' => $manufacturer
        ];
        $this->view('information/informationOverview', $data);
    }

    public function updateContact($ids)
    {
        $ids = explode("+", $ids);
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->informationModel->updateContact($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] . "+" . $ids[2]);
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] . "+" . $ids[2]);
            }

        } else {
            $row = $this->informationModel->getContactById($ids[0]);

            $data = [
                'row' => $row,
                'title' => 'Update contact',
                'contactId' => $ids[0],
                'phoneId' => $ids[1],
                'manufacturer' => $ids[2]
            ];
            $this->view('information/updateContact', $data);
        }
    }

    public function deleteContact($ids)
    {
        $ids = explode("+", $ids);
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->informationModel->deleteContact($ids[0]);

            if (!$result)
            {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] . "+" . $ids[2]);
            } else
            {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] . "+" . $ids[2]);
            }
        } else {
            $row = $this->informationModel->getContactById($ids[0]);
            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this contact?',
                'contactId' => $ids[0],
                'phoneId' => $ids[1],
                'manufacturer' => $ids[2]
            ];
            $this->view('information/deleteContact', $data);
        }
    }

    public function createContact($ids)
    {
        $ids = explode("+", $ids);
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->informationModel->createContact($post, $ids[0]);

            if (!$result)
            {
                echo "The create was successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[0] ."+" . $ids[1] );
            } else
            {
                echo "The create was not successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[0] ."+" . $ids[1]);
            }
        } else {
            $data = [
                'phoneid' => $ids[0],
                'manufacturer' => $ids[1],
                'title' => 'Create contact'
            ];
            $this->view('information/createContact', $data);
        }

    }

    public function updateSpecification($ids)
    {
        $ids = explode("+", $ids);
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->informationModel->updateSpecification($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] . "+" . $ids[2]);
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] . "+" . $ids[2]);
            }

        } else {
            $row = $this->informationModel->getSpecificationById($ids[0]);

            $data = [
                'row' => $row,
                'title' => 'Update specification',
                'specificationId' => $ids[0],
                'phoneId' => $ids[1],
                'manufacturer' => $ids[2]
            ];
            $this->view('information/updateSpecification', $data);
        }
    }

    public function deleteSpecification($ids)
    {
        $ids = explode("+", $ids);
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->informationModel->deleteSpecification($ids[0]);

            if (!$result)
            {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" .  $ids[1] . "+" . $ids[2]);
            } else
            {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" .  $ids[1] . "+" . $ids[2]);
            }
        } else {
            $row = $this->informationModel->getSpecificationById($ids[0]);
            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this contact?',
                'specificationId' => $ids[0],
                'phoneId' => $ids[1],
                'manufacturer' => $ids[2]
            ];
            $this->view('information/deleteSpecification', $data);
        }
    }

    public function createSpecification($ids)
    {
        $ids = explode("+", $ids);
        if($_SERVER["REQUEST_METHOD"] == 'POST')
            {
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $result = $this->informationModel->createSpecification($post, $ids[0]);

                if ($result)
                {
                    echo "The create was successful";
                    header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[0] ."+" . $ids[1]);
                } else
                {
                    echo "The create was not successful";
                    header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[0] ."+" . $ids[1]);
                }
            } else {

            $data = [
                'title' => 'Create Specification',
                'phoneid'=> $ids[0],
                'manufacturer' => $ids[1]
            ];
            $this->view('information/createSpecification', $data);
        }
    }

    public function createMedia($ids)
    {
        $ids = explode("+", $ids);
        if($_SERVER["REQUEST_METHOD"] == 'POST')
            {
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                $result = $this->informationModel->createMedia($post, $ids[0]);

                if ($result)
                {
                    echo "The create was successful";
                    header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[0] ."+" . $ids[1]);
                } else
                {
                    echo "The create was not successful";
                    header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[0] ."+" . $ids[1]);
                }
            } else {

            $data = [
                'title' => 'Create Media',
                'phoneid'=> $ids[0],
                'manufacturer' => $ids[1]
            ];
            $this->view('information/createMedia', $data);
            }
    }

    public function updateMedia($ids)
    {
        $ids = explode("+", $ids);
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->informationModel->updateMedia($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] ."+" . $ids[2]);
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] ."+" . $ids[2]);
            }

        } else {
            $row = $this->informationModel->getMediaById($ids[0]);

            $data = [
                'row' => $row,
                'title' => 'Update media',
                'mediaId' => $ids[0],
                'phoneId' => $ids[1],
                'manufacturer' => $ids[2]
            ];
            $this->view('information/updateMedia', $data);
        }
    }

    public function deleteMedia($ids)
    {
        $ids = explode("+", $ids);
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->informationModel->deleteMedia($ids[0]);

            if (!$result)
            {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] ."+" . $ids[2]);
            } else
            {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "InformationController/informationOverview/" . $ids[1] ."+" . $ids[2]);
            }
        } else {
            $row = $this->informationModel->getMediaById($ids[0]);
            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this Media?',
                'mediaId' => $ids[0],
                'phoneId' => $ids[1],
                'manufacturer' => $ids[2]
            ];
            $this->view('information/deleteMedia', $data);
        }
    }
}