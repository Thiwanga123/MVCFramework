<?php

class PaymentModel {

    public function generatePaymentHash() {
        $config = '<?php echo URLROOT;?>/config/payhere.php';

        $order_id='ORDER123';
        $amount=1000;
        $merchant_id = '1229635';
        $currency = $config['currency'];
        $merchant_secret = 'MTc4NjQxNDY3MzExNTkxOTYxMzIyNjMzMDAzNzk1NDE3NTI3ODk5MA==';

        $hash = strtoupper(md5(
            $merchant_id . 
            $order_id . 
            $amount . 
            $currency . 
            strtoupper(md5($merchant_secret))
        ));

        $array = array(
            'merchant_id' => $merchant_id,
            'order_id' => $order_id,
            'amount' => $amount,
            'currency' => $currency,
            'hash' => $hash
        );

       //return $array;
       return $array;
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
