<?php

include_once __DIR__ . '/../model/Product.php';

class ExportService
{
    private $connect;
    public function __construct()
    {
        $this->connect = DBConnector::getInstance()->connect();
    }

    private function initExportFile()
    {
        $date = date('YmdHis', time());
        $filename = 'products_' . $date . '.csv';
        $path = __DIR__ . '/../../../data/';

        return $path . $filename;
    }

    private function getData()
    {
        $products = (new Product())->all([], 28);

        $list = [];
        foreach ($products as $product){
            $list[] = [
                $product['id'],
                $product['title'],
                $product['picture'],
                $product['preview'],
                $product['price'],
                $product['status'],
                $product['created'],
                $product['updated'],
            ];

        }
        return $list;
    }

    public function export()
    {
        $fullFileName = $this->initExportFile();

        $list = $this->getData();

        $fp = fopen($fullFileName, 'w');

        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);

    }

}