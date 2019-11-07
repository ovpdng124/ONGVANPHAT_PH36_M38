<?php
require_once 'model/Product.php';

class Model
{
    public static function getSession()
    {
        return isset($_SESSION['products']) ? $_SESSION['products'] : array();
    }

    public static function getDataForm()
    {
        $code = filter_input(INPUT_POST, 'code');
        $price = filter_input(INPUT_POST, 'price');
        $name = trim(preg_replace('/\s+/', ' ', filter_input(INPUT_POST, 'name')));
        $description = trim(preg_replace('/\s+/', ' ', filter_input(INPUT_POST, 'description')));
        $name = strtolower($name);
        $description = strtolower($description);
        $name = ucwords($name);
        $description = ucwords($description);
        $dataForm = array(
            'code' => $code,
            'name' => $name,
            'description' => $description,
            'price' => $price,
        );
        return $dataForm;
    }

    public static function addProduct()
    {
        $productDB = self::getSession();
        $dataForm = self::getDataForm();
        $bool = true;
        foreach ($productDB as $item) {
            if ($item->getCode() == $dataForm['code']) {
                $bool = false;
            }
        }
        if ($bool) {
            $newProduct = new Product($dataForm['code'], $dataForm['name'], $dataForm['description'], $dataForm['price']);
            $productDB[] = $newProduct;
            $_SESSION['products'] = $productDB;
            return true;
        }else{
            return false;
        }
    }

    public static function getListProduct()
    {
        return $listProducts = self::getSession();
    }

    public static function editProduct($dataForm)
    {
        $listProducts = self::getListProduct();
        foreach ($listProducts as $item) {
            if ($item->getCode() == $dataForm['code']) {
                $item->setCode($dataForm['code']);
                $item->setName($dataForm['name']);
                $item->setDescription($dataForm['description']);
                $item->setPrice($dataForm['price']);
                return true;
            }
        }
        return false;
    }

    public static function deleteProduct($code)
    {
        $listProduct = self::getListProduct();
        foreach ($listProduct as $key => $item) {
            if ($item->getCode() == $code) {
                unset($listProduct[$key]);
                break;
            }
        }
        $_SESSION['products'] = $listProduct;
    }
    public static function destroySession(){
        session_destroy();
    }
}