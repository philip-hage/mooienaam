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


        $recordsPerPage = 1;
        $offset = ($pageNumber * $recordsPerPage) - $recordsPerPage;
        $totalRecords = count($this->storeModel->getStores());
        $stores = $this->storeModel->getStoresByPagination($offset, $recordsPerPage);
        $nextPage = $pageNumber + 1;
        $previousPage = $pageNumber - 1;
        $totalPages = ceil($totalRecords / $recordsPerPage);
        $firstPage = 1;
        $secondPage = 2;
        $thirdPage = 3;

        // Page number 1
        if ($pageNumber == 1) {
            if ($pageNumber == $totalPages && $pageNumber != 1)
            {
                $firstPage = $pageNumber - 1;
            } else {
                $firstPage = $pageNumber ;
            }
        } else {
                $firstPage = $pageNumber - 1;
        }

        //Page number 2
        if($pageNumber != 1)
        {
            if ($pageNumber == $totalPages && $pageNumber != 2)
            {
                $secondPage = $pageNumber -1;
            } else {
                $secondPage = $pageNumber;
            }
        }else {
            $secondPage = $pageNumber + 1;
        }

        //Page number 3
        if ($pageNumber == 1 || $pageNumber == 2) {
            $thirdPage = 3;
        } elseif ($pageNumber == $totalPages) {
            $thirdPage = $pageNumber;
        } else {
            $thirdPage = $pageNumber + 1;
        }

        $data = [
            'stores' => $stores,
            'title' => 'Overview Stores',
            'pageNumber' => $pageNumber,
            'nextPage' => $nextPage,
            'previousPage' => $previousPage,
            'totalPages' => $totalPages,
            'firstPage' => $firstPage,
            'secondPage' => $secondPage,
            'thirdPage' => $thirdPage

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