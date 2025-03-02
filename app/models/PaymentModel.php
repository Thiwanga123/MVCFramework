<?php

class PaymentModel {

    public function generatePaymentHash($order_id, $amount) {
        $config = include 'config/payhere.php';

        $merchant_id = $config['merchant_id'];
        $currency = $config['currency'];
        $merchant_secret = $config['merchant_secret'];

        $hash = strtoupper(md5(
            $merchant_id . 
            $order_id . 
            $amount . 
            $currency . 
            strtoupper(md5($merchant_secret))
        ));

        return $hash;
    }

    public function handleIPN() {
        $postData = $_POST;

        $config = include 'config/payhere.php';
        $merchant_secret = $config['merchant_secret'];

        $local_md5sig = strtoupper(md5(
            $postData['merchant_id'] .
            $postData['order_id'] .
            $postData['payhere_amount'] .
            $postData['payhere_currency'] .
            $postData['status_code'] .
            strtoupper(md5($merchant_secret))
        ));

        if ($local_md5sig === $postData['md5sig'] && $postData['status_code'] == 2) {
            file_put_contents('payments.log', "Payment Success: Order " . $postData['order_id'] . "\n", FILE_APPEND);
        } else {
            file_put_contents('payments.log', "Payment Failed or Invalid Signature: Order " . $postData['order_id'] . "\n", FILE_APPEND);
        }
    }
}
