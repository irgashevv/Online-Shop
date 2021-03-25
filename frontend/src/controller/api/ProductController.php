<?php

include_once __DIR__ . "/../../../../common/src/model/Product.php";
include_once __DIR__ . "/../../../../common/src/service/UserService.php";

class ProductController
{
	public function index()
	{
	    header("Charset: utf-8");
	    header("Content-Type: application/json: charset=utf-8");

	    $all = (new Product())->getAllForExport(10);

	    print json_encode($all);
	    die();
	}

	public function create()
	{
	    header("Content-Type: application/json");

	    try {
            $data = $_POST;

            $product = new Product(
                null,
                htmlspecialchars($data['title']),
                htmlspecialchars($data['picture']),
                htmlspecialchars($data['preview']),
                htmlspecialchars($data['content']),
                intval($data['price']),
                htmlspecialchars($data['status']),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s')
            );

            $product->save();

            print json_encode([
                'result' => 'OK'
            ]);
        }
        catch (Exception $e) {
            throw new Exception(json_encode(['result' => 'ERROR', 'message' => $e->getMessage()]), 400);
        }
	    die();
	}

	public function update()
	{
	    header("Content-Type: application/json");

	    try {
            $data = $_POST;

            $product = new Product(
                intval($data['id']),
                htmlspecialchars($data['title']),
                htmlspecialchars($data['picture']),
                htmlspecialchars($data['preview']),
                htmlspecialchars($data['content']),
                intval($data['price']),
                htmlspecialchars($data['status']),
                date('Y-m-d H:i:s'),
                date('Y-m-d H:i:s')
            );

            $product->save();

            print json_encode([
                'result' => 'OK'
            ]);
        }
        catch (Exception $e) {
            throw new Exception(json_encode(['result' => 'ERROR', 'message' => $e->getMessage()]), 400);
        }
	    die();
	}

	public function delete()
	{
	    header("Content-Type: application/json");

	    try {
            $data = $_POST;

            if (!isset($data['id'])) {
                throw new Exception('Undefined id');
            }

            (new Product())->deleteById((int)$data['id']);

            print json_encode([
                'result' => 'OK'
            ]);
        }
        catch (Exception $e) {
            throw new Exception(json_encode(['result' => 'ERROR', 'message' => $e->getMessage()]), 400);
        }
	    die();
	}
}