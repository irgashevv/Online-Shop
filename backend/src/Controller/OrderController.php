<?php
	include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../../../common/src/Model/Order.php";
include_once __DIR__ . "/../../../common/src/Model/OrderItem.php";
include_once __DIR__ . "/../../../common/src/Service/OrderService.php";


	class OrderController implements ControllerInterface
	{
		public function save()
		{
		    // TODO
		}

		public function create()
		{
			include_once __DIR__ . "/../../views/orders/form.php";
		}

		public function read()
		{
			$all = (new Order())->all();

			include_once __DIR__ . "/../../views/orders/list.php";
		}

		public function update()
		{
		    if (!empty($_POST)) {
		        $id = (int)$_POST['id'];
                $delivery = (int)$_POST['delivery_id'];
                $payment = (int)$_POST['payment_id'];
                $name = htmlspecialchars($_POST['name']);
                $phone = htmlspecialchars($_POST['phone']);
                $email = htmlspecialchars($_POST['email']);
                $status = (int)$_POST['status'];
                $updated = date('Y-m-d H:i:s', time());

                // TODO Need develop
                $total = 0;

                if ($id > 0) {
                    (new Order($id, null, $payment, $delivery, $total,
                        "", $name, $phone, $email, $status, $updated))->update();
                }
                header( "Location: index.php?model=order&action=read");
            }

		    $one = (new Order())->getById((int)$_GET['id']);

            include_once __DIR__ . "/../../views/orders/form.php";
		}

		public function delete()
		{
			// TODO
		}

	}