<?php
        $consumer_key= "f97UCTRHePuVAqcSGiV497mOG7EkYC9i";
        $consumer_secret= "h8FuChqVIxJeuUkT";
        $BusinessShortCode='174379';
        $LipaNaMpesaPasskey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

        $timestamp=date("Ymdhis");

        if(!isset($consumer_key)||!isset($consumer_secret)){
            die("Please declare the consumer key and consumer secret as defined in the documentation");
        }
        $url12 = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl12 = curl_init();
        curl_setopt($curl12, CURLOPT_URL, $url12);

        $credentials = base64_encode($consumer_key.':'.$consumer_secret);

        curl_setopt($curl12, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl12, CURLOPT_HEADER, false);
        curl_setopt($curl12, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl12, CURLOPT_SSL_VERIFYPEER, false);

        $curl_response = curl_exec($curl12);

        $token= json_decode($curl_response)->access_token;


$url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
  $password=base64_encode($BusinessShortCode.$LipaNaMpesaPasskey.$timestamp);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$token)); //setting custom header


$curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $password,
    'Timestamp' => $timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => '2',
    'PartyA' => '254708843466',
    'PartyB' => '174379',
    'PhoneNumber' => '254708843466',
    'CallBackURL' => 'https://www.miathenehigh.ac.ke',
    'AccountReference' => 'Engineer',
    'TransactionDesc' => 'Payment of Goods'
);

$data_string = json_encode($curl_post_data);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curl);
print_r($curl_response);

echo $curl_response;
?>
