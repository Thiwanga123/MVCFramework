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

        $paymentModel = new PaymentModel();
        $hash = $paymentModel->generatePaymentHash();

       
    }

    public function notify() {
        $paymentModel = new PaymentModel();
        $paymentModel->handleIPN();
    }
}
