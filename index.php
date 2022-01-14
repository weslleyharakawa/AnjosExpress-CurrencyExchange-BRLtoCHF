<?php
/* 
Customized Currency Calculator
Developed by Weslley A. Harakawa
weslleyharakawa@gmail.com
Copyright (c) anjosexpress.ch
*/ 
                
    $data = array(
        "Amount" => ,
        "PayoutCountryCode" => "BR",
        "PayoutCurrencyCode" => "BRL"
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
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Exchange Currency</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    </head>
    <style>
        #conversion{ cursor: pointer;}
    </style>
    <script>
        $(document).ready(function(){
          $("#conversion1").click(function(){
              var sendcurr = $("#sendcurrency").val();
              var getcurr = $("#getcurrency").val();
              var amount = $("#amount").val();
              $.ajax({
                url: "currencyaction.php",
                type: "post",
                data: {sendcurr:sendcurr, getcurr:getcurr, amount:amount} ,
                success: function (response) {
                   $("#resultdiv").html(response);
                }
            });
            
          });
        });
    </script>
    <body>
        <div class="container">
            <div class="row m-0 d-flex justify-content-center">
                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-header py-2"><h6>Currency Converter</h6></div>
                        <div class="card-body">
                            <form>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">CHF</span></div>
                                    <input type="text" class="form-control" id="amount" value="100">
                                    <div class="input-group-append" id="conversion">
                                        <span class="input-group-text" id="conversion1"><i class="fa fa-exchange" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="sendcurrency" id="sendcurrency" class="form-control">
                                        <option value="CHF">CHF - Swiss France</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="getcurrency" id="getcurrency" class="form-control">
                                        <option value="BRL">BRL - Brazilian Real</option>
                                    </select>
                                </div>
                                
                                <div class="input-group mb-3" id="resultdiv">
                                    <h3><?php echo 'R$ '.$resp['TotalAmount']; ?></h3>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
