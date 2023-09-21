<?php

class StoresController extends Controller
{
    private $storeModel;

    public function __construct()
    {
        $this->storeModel = $this->model('StoresModel');
    }

    public function index()
    {
        $data = [
            'title' => 'StoresController'
        ];

        $this->view('stores/index', $data);
    }

    public function storesOverview($pageNumber = null)
    {

        $totalRecords = count($this->storeModel->getStores());
        $pagination = $this->pagination($pageNumber, 4, $totalRecords);
        $stores = $this->storeModel->getStoresByPagination($pagination['offset'], $pagination['recordsPerPage']);


        $data = [
            'stores' => $stores,
            'title' => 'Overview Stores',
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
        $this->view('stores/storesOverview', $data);
    }

    public function updateStore($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->storeModel->updateStore($_POST);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview");
            }
    } else {
        $row = $this->storeModel->getStoresById($id);

        $data = [
            'row' => $row,
            'title' => 'Update store'
        ];
        $this->view('stores/updateStore', $data);
        }
    }

    public function deleteStore($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST')
        {

            $result = $this->storeModel->deleteStore($id);

            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview");
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview");
            }
        } else {
            $row = $this->storeModel->getStoresById($id);
            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this store?'
            ];
            $this->view('stores/deleteStore', $data);
        }
    }

    public function createStore()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST')
        {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $result = $this->storeModel->createStore($post);

            if ($result) {
                echo "The create was successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview");
            } else {
                echo "The create was not successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview");
            }

        } else {
            $data = [
                'title' => 'Create store'
            ];
            $this->view('stores/createStore', $data);
        }
    }

    public function storeHasPhones($storeId)
    {
        $storeHasPhones = $this->storeModel->getPhonesByStore($storeId);
        $store = $this->storeModel->getStoresById($storeId);

        $data = [
            'storeHasPhones' => $storeHasPhones,
            'title' => 'Overview StoreHasPhones',
            'storeId' => $storeId,
            'store' => $store
        ];
        $this->view('stores/storeHasPhonesOverview', $data);
    }

    public function updateStoreHasPhones($id = null)
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $result = $this->storeModel->updatePrice($post);

            if (!$result) {
                echo "The update was successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview/");
            } else {
                echo "The update was not successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview/");
            }
        } else {
            $row = $this->storeModel->getPhonesByStoreById($id);
            $data = [
                'row' => $row,
                'title' => 'Update storeHasPhones'
            ];
            $this->view('stores/updateStoreHasPhones', $data);
        }
    }

    public function deletePhoneFromStore($id = null)
    {
        if($_SERVER["REQUEST_METHOD"] == 'POST') {
            $result = $this->storeModel->deletePhoneFromStore($id);

            if (!$result) {
                echo "The delete was successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview/");
            } else {
                echo "The delete was not successful";
                header("Refresh: 3; url=" . URLROOT . "/storescontroller/storesOverview/");
            }
        } else {
            $row = $this->storeModel->getPhonesByStoreById($id);
            $data = [
                'row' => $row,
                'title' => 'Are you sure you want to delete this phone from this store?'
            ];
            $this->view('stores/deletePhoneFromStore', $data);
        }
    }

}