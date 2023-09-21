<?php

class PhonesController extends Controller
{
    private $phonesmodel;
    private $manufacturersmodel;

    public function __construct()
    {
        $this->phonesmodel = $this->model('PhonesModel');
        $this->manufacturersmodel = $this->model('ManufacturersModel');
    }

    public function index()
    {

        $data = [
            'title' => 'PhonesController'
        ];

        $this->view('phones/index', $data);
    }

    public function phoneoverview($phoneManufactureId = null)
    {

        $phones = $this->phonesmodel->getPhoneByManufacturer($phoneManufactureId);
        $manufacter = $this->manufacturersmodel->getManufacturersById($phoneManufactureId);
        $data = [
            'phones' => $phones,
            'phoneManufactureId' => $phoneManufactureId,
            'title' => 'Overzicht telefoons',
            'manufacter' => $manufacter,

        ];
        $this->view('phones/phoneoverview', $data);
    }

    public function updatePhone($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->phonesmodel->updatePhone($_POST);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview");
            }

        } else {
            $row = $this->phonesmodel->getPhoneById($id);

            $data = [
                'row' => $row,
                'title' => 'Update phone'
            ];
            $this->view('phones/updatePhone', $data);

        }
    }

    public function deletePhone($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $result = $this->phonesmodel->deletePhone($id);
            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview");
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview");
            }
        } else {
            $row = $this->phonesmodel->getPhoneById($id);

            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this phone?'
            ];
            $this->view('phones/deletePhone', $data);
        }


    }

    public function createPhone($phoneManufactureId = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->phonesmodel->createPhone($_POST, $phoneManufactureId);

            if (!$result){
                echo "You created a phone!";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview/" . $phoneManufactureId);
            } else {
                echo "Unfortunately creating a phone didn't work";
                header("Refresh: 3; url=" . URLROOT . "/phonesController/phoneoverview/" . $phoneManufactureId);
            }

        } else {
            $data = [
                'id'=> $phoneManufactureId,
                'title' => 'Create phone'
            ];
            $this->view('phones/createPhone', $data);
        }
    }



}