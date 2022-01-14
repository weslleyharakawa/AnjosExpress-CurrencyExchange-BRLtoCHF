# AnjosExpress-CurrencyExchange-BRLtoCHF
 Calculator Converter and API to show exchange rates between BRL and CHF
 
 # Customized Currency Calculator

Created by Weslley A. Harakawa to integrate the Anjos Express website via API, to the Remittance Exchange provider.

An exchange calculator to convert BRL (Brazilian Real) to CHF (Swiss Franc) via API, return the result based on the daily quotation.

Author: Weslley A Harakawa

Email: weslleyharakawa@gmail.com

Copyright (c): anjosexpress.ch

## Calculate based on CHF to send:

curl --location --request POST 'https://apps.intradatasolutions.com/AnjosExpress/CmsApi/AmountsAndFees/Calculate' \

--header 'Content-Type: application/json' \

--data-raw '{

    "SendAmount": 200,

    "PayoutCountryCode": "BR",

    "PayoutCurrencyCode": "BRL"

}'

 

## Calculate based on BRL to payout:

curl --location --request POST 'https://apps.intradatasolutions.com/AnjosExpress/CmsApi/AmountsAndFees/Calculate' \

--header 'Content-Type: application/json' \

--data-raw '{

    "PayoutAmount": 5000,

    "PayoutCountryCode": "BR",

    "PayoutCurrencyCode": "BRL"

}'

 

Sample response:

{

    "SendCurrency": "BRL",

    "SendAmount": 877.0,

    "PercentFee": 0.0000,

    "PercentFeeAmount": 0.00,

    "FlatFee": 0.0000,

    "OtherFees": 0.0,

    "TotalFees": 0.0000,

    "TotalAmount": 877.00,

    "XRate": 5.70,

    "PayoutAmount": 5000.0,

    "PayoutCurrency": "CHF"

}


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
