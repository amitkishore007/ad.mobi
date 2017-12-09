<center>
 
 
<?php 
include('Crypto.php');
     
    $merchant_data='aaaaaaaaa';
    $working_key='xxxxxxxxxxxx';//Shared by CCAVENUES
    $access_code='xxxxxxxxx';//Shared by CCAVENUES
     
    foreach ($_POST as $key => $value){
        $merchant_data.=$key.'='.urlencode($value).'&';
    }
 
    $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
 
?>
<form method="post" name="redirect" action="http://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>