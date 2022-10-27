<?php


class Product extends BaseController
{
    public function index()
    {
        $productModel = $this->model('ProductModel');
        $products = $productModel->getAll();
        $this->view('productView', ['products' => $products]);
    }

    public function post()
    {
        $name = $_FILES['file']['tmp_name'];
        $type = $_FILES['file']['type'];
        if ($type === 'application/json') {
            return $this->file_json($name);
        } else if ($type === 'text/xml') {
            return $this->file_xml($name);
        }
    }

    public function file_json($file)
    {
        $data = file_get_contents($file);
        $data = json_decode($data);
        $db = $this->model('ProductModel');
        $db->insertProduct($data);
        ob_start();
        session_start();
        $_SESSION['message'] = "Kayıt Başarılı";
        header('location:index');
    }

    public function file_xml($file)
    {
        $data = simplexml_load_file($file);
        $data = $data->children();
        $db = $this->model('ProductModel');
        $db->insertProduct($data);
        ob_start();
        session_start();
        $_SESSION['message'] = "Kayıt Başarılı";
        header('location:index');
    }

    public function download($type)
    {

        $db = $this->model('ProductModel');
        $data = $db->getAll();
        if ($type == "json") {
            header('Content-disposition: attachment; filename=Product.json');
            header("Content-Type: application/json; charset=UTF-8");
            echo json_encode($data,JSON_PRETTY_PRINT);
        } elseif ($type == "xml") {
            header('Content-disposition: attachment; filename=Product.xml');
            header('Content-type: text/xml');
            $xml = new SimpleXMLElement("<product/>");
            foreach ($data as $item) {
                $item_child = $xml->addChild('item');
                $item_child->addChild('id', $item['id']);
                $item_child->addChild('name', $item['name']);
                $item_child->addChild('price', $item['price']);
                $item_child->addChild('category', $item['category']);
            }
            print $xml->saveXML();
        }
    }

}