<!DOCTYPE html>

<html>

<head>
  <title>Hello!</title>
</head>

<body>
  <?php
 $host='localhost';
 $username= 'root';
 $pasword = "";
 $dbname= "mpesa";

 $conn= mysqli_connect($host,$username,$pasword,$dbname);

 if(!$conn){
     echo "Error in database connection";
 }

 $json_data='{
"TransactionType": "Pay Bill",
"TransID": "LJV8XUKQZZ",
"TransTime": "20171031132220",
"TransAmount": "500.00",
"BusinessShortCode": "999999",
"BillRefNumber": "WIN",
"InvoiceNumber": "",
"OrgAccountBalance": "29678.00",
"ThirdPartyTransID": "0",
"MSISDN": "254722000000",
"FirstName": "JOHN",
"MiddleName": "M.",
"LastName": "DOE"
}';

//parse
$payment=json_decode($json_data);

//$pay=$payment['TransactionType'];
$transtype=$payment->TransactionType;
$transID=$payment->TransID;
$TransTime=$payment->TransTime;
$TransAmount=$payment->TransAmount;
$BusinessShortCode=$payment->BusinessShortCode;
$BillRefNumber=$payment->BillRefNumber;
$InvoiceNumber=$payment->InvoiceNumber;
$OrgAccountBalance=$payment->OrgAccountBalance;
$ThirdPartyTransID=$payment->ThirdPartyTransID;
$MSISDN=$payment->MSISDN;
$FirstName=$payment->FirstName;
$MiddleName=$payment->MiddleName;
$LastName=$payment->LastName;

$sql= "INSERT INTO payment(TransactionType,TransID,TransTime,TransAmount,BusinessShortCode,BillRefNumber,InvoiceNumber,OrgAccountBalance,ThirdPartyTransID,MSISDN,FirstName,MiddleName,LastName)
VALUES('$transtype','$transID','$TransTime','$TransAmount','$BusinessShortCode','$BillRefNumber','$InvoiceNumber','$OrgAccountBalance','$ThirdPartyTransID','$MSISDN','$FirstName','$MiddleName','$LastName')";
$result=mysqli_query($conn,$sql);
if($result){
    echo '
    header("Content-Type:application/json")


    ;
     ';
}
else{
    echo "oppss!! Error";
}
  ?>
</body>
</html>