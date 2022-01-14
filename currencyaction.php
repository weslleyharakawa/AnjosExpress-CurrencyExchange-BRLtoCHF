<?php
/* 
Customized Currency Calculator
Developed by Weslley A. Harakawa
weslleyharakawa@gmail.com
Copyright (c) anjosexpress.ch
*/ 

    if(isset($_POST['sendcurr'])){
        
        $sender = $_POST['sendcurr'];
        $getcurr = $_POST['getcurr'];
        $amount = $_POST['amount'];
        
        $data = array(
            "PayoutAmount" => $amount,
            "PayoutCountryCode" => "BR",
            "PayoutCurrencyCode" => $getcurr
        ); 
        $headers = array( 
                'Content-Type: application/json',
            );
            
        $ch = curl_init();
        $url='https://apps.intradatasolutions.com/AnjosExpress/CmsApi/AmountsAndFees/Calculate';
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result=curl_exec($ch);
        //echo $result;
        curl_close ($ch);
        $resp = json_decode($result, true);
        echo "<h3> R$ ".$resp['TotalAmount']."</h3>";
    }
    
?>