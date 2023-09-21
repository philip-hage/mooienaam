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

    public function informationOverview($phoneId = null, $manufacturerId = null)
    {
        $contact = $this->informationModel->getContactByPhone($phoneId);
        $specification = $this->informationModel->getSpecificationByPhone($phoneId);
        $media = $this->informationModel->getMediaByPhone($phoneId);
        $manufacturer = $this->manufacturersmodel->getManufacturersById($manufacturerId);



        $data = [
            'contact' => $contact,
            'title' => 'Overview information',
            'specification' => $specification,
            'media' => $media,
            'phoneId' => $phoneId,
            'manufacturer' => $manufacturerId
        ];
        $this->view('information/informationOverview', $data);
    }

    public function updateContact($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->informationModel->updateContact($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/informationController/informationOverview");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/informationController/informationOverview");
            }

        } else {
            $row = $this->informationModel->getContactById($id);

            $data = [
                'row' => $row,
                'title' => 'Update contact'
            ];
            $this->view('information/updateContact', $data);
        }
    }

    public function deleteContact($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->informationModel->deleteContact($id);

            if (!$result)
            {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview");
            } else
            {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview");
            }
        } else {
            $row = $this->informationModel->getContactById($id);
            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this contact?'
            ];
            $this->view('information/deleteContact', $data);
        }
    }

    public function createContact($contactPhoneId = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->informationModel->createContact($post, $contactPhoneId);

            if (!$result)
            {
                echo "The create was successful";
                header("Refresh: 3; url=" . URLROOT . "/informationController/informationOverview/" . $contactPhoneId);
            } else
            {
                echo "The create was not successful";
                header("Refresh: 3; url=" . URLROOT . "/informationController/informationOverview/" . $contactPhoneId);
            }
        } else {
            $data = [
                'id' => $contactPhoneId,
                'title' => 'Create contact'
            ];
            $this->view('information/createContact', $data);
        }

    }

    public function updateSpecification($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->informationModel->updateSpecification($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/informationController/informationOverview");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/informationController/informationOverview");
            }

        } else {
            $row = $this->informationModel->getSpecificationById($id);

            $data = [
                'row' => $row,
                'title' => 'Update specification'
            ];
            $this->view('information/updateSpecification', $data);
        }
    }

    public function deleteSpecification($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $result = $this->informationModel->deleteSpecification($id);

            if (!$result)
            {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview");
            } else
            {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview");
            }
        } else {
            $row = $this->informationModel->getSpecificationById($id);
            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this contact?'
            ];
            $this->view('information/deleteSpecification', $data);
        }
    }

    public function createSpecification($specificationPhoneId = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
            {
                $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $result = $this->informationModel->createSpecification($post, $specificationPhoneId);

                if ($result)
                {
                    echo "The create was successful";
                    header("Refresh: 3; url=" . URLROOT . "/informationController/informationOverview/" . $specificationPhoneId);
                } else
                {
                    echo "The create was not successful";
                    header("Refresh: 3; url=" . URLROOT . "/informationController/informationOverview/" . $specificationPhoneId);
                }
            } else {

            $data = [
                'title' => 'Create Specification',
                'id'=> $specificationPhoneId
            ];
            $this->view('information/createSpecification', $data);
        }
    }
}