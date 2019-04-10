  <?php
   require_once('config.php');

header("Content-Type:application/json");

if(!$request=file_get_contents('php://input'))
{

echo "invalid input";
exit();

}

$payment=json_decode($request);

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
    //echo "Success";
    $resultdesc="Valid Account. Accept payment";
            $response ='{"ResultCode":0, "ResultDesc":"'. $resultdesc.'","ThirdPartyTransID": 0}';
            echo $response;
}
else{
    $resultdesc="Invalid Account. Cancel payment";
            $response ='{"ResultCode":1, "ResultDesc":"'. $resultdesc.'","ThirdPartyTransID": 0}';
            echo $response;
}
  ?>