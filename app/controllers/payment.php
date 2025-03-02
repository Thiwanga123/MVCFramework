<?php
// require_once 'app/models/PaymentModel.php';

class Payment extends Controller {

    private $PaymentModel;
    
    public function index(){
        $this->view('payment/payhere_form');
    }

    public function success() {
        echo "Payment Successful!";
    }

    public function failed() {
        echo "Payment Failed!";
    }

    public function getHash() {
        $data = json_decode(file_get_contents('php://input'), true);
        $order_id = $data['order_id'];
        $amount = number_format($data['amount'], 2, '.', '');

        $paymentModel = new PaymentModel();
        $hash = $paymentModel->generatePaymentHash($order_id, $amount);

        echo json_encode(['hash' => $hash]);
    }

    public function notify() {
        $paymentModel = new PaymentModel();
        $paymentModel->handleIPN();
    }
}
