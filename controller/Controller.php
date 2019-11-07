<?php
require_once 'model/Model.php';

class Controller
{
    public function invoke()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : false;
        if (!$action) $action = isset($_POST['action']) ? $_POST['action'] : 'index';
        switch ($action) {
            case 'index':
                $listProducts = Model::getListProduct();
                include "view/listProduct.php";
                break;
            case 'addProductForm':
                $dataForm = Model::getDataForm();
                include 'view/addProduct.php';
                break;
            case 'addProduct':
                if (Model::addProduct()) {
                    $listProducts = Model::getListProduct();
                    include "view/listProduct.php";
                }else{
                    include 'view/addProduct.php';
                    echo "<script>alert(\"Code existed!\")</script>";
                }
                break;
            case 'editProduct':
                $dataForm = Model::getDataForm();
                $listProducts = Model::getListProduct();
                include "view/editProduct.php";
                break;
            case 'confirmModify':
                $dataForm = Model::getDataForm();
                $listProducts = Model::getListProduct();
                if (Model::editProduct($dataForm)) {
                    include 'view/listProduct.php';
                    echo "<script>alert(\"Your data has modified!\")</script>";
                } else {
                    include "view/editBook.php";
                    echo "<script>alert(\"Modification failed!\")</script>";
                }
                break;
            case 'destroySession':
                Model::destroySession();
                header("Location:index.php");
                break;
            case 'deleteProduct':
                $code = isset($_POST['code']) ? $_POST['code'] : false;
                $dataForm = Model::getDataForm();
                if ($code) {
                    Model::deleteProduct($dataForm['code']);
                    header("Location:index.php");
                } else {
                    echo "<script>alert(\"Couldn't find code!\")</script>";
                }
                break;
        }
    }
}