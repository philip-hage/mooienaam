<?php

class Phones extends Controller
{
    private $phonesModel;

    public function __construct()
    {
        $this->phonesModel = $this->model('PhonesModel');
    }

    public function index()
    {
        $data = [
            'title'=> 'Phones',
        ];
        $this->view('phones/index', $data);
    }
}