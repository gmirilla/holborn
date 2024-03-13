<title>CCI CERTIFICATE | {{$cci->cci_id}}</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div style="width:21cm; height:28cm;  overflow: hidden;">
<div style="float:left">
    <img src="/img/neroli-logo.jpeg" alt="Logo" width="60" height="60">
</div>
    <div>
        <div style="float:right">
            {!! QrCode::generate($jsoncci) !!}</div>
        <h3 style="text-align: center" >NEROLI TECHNOLOGIES LIMITED RC: 998330</h3>

        <h5 style="text-align: center" >CLEAN CERTIFICATE OF INSPECTION <br/>
ACCORDING TO THE EXPORT REQUIREMENTS OF THE FEDERAL REPUBLIC OF NIGERIA</h5>
<h6 style="text-align: center" ><u>http://24.199.119.118/check/printcert?id={{$cci->id}}</u></h6>

<div style="font-size: 11px; text-align:center;"><strong>CCI Number: {{$cci->cci_id}}</strong></div>
    </div>
    <div style="padding:10px">
    <table style=" border:2px; font-size:10px" class="table table-bordered table-sm table-striped">
        <tr><td colspan=4 style="text-align: center; background-color: black ; color:white"> EXPORTER'S DECLARATION</td></tr>
        <tr>
            <td>
                <b>N.X.P FORM NO:</b> {{$cci->nxpform_no}}
            </td>
            <td >
                <b>NEPC NO:</b> {{$cci->nepc_no}}
            </td>        
        </tr>
        <tr>
            <td>
                <b>HS CODE:</b> {{$cci->hscode}}
            </td>
            <td>
                <b>ORIGIN:</b>{{$cci->origin}}
            </td>   
      
        </tr>
        <tr>
            <td>
                <b>YEAR:</b> {{$cci->year}}
            </td> 
            <td>
                <b>DATE:</b> {{$cci->date}}
            </td>  

        </tr>
        <tr>
            <td><b>EXPORTER'S NAME & ADDRESS:</b>
                {{$cci->exportersname}},
                <br/>
                <i>{{$cci->exportersaddress}}<br/></i>
                <b>RC NO:</b> {{$cci->rc_no}}
            </td>
            <td><b>EXPORTER'S BANK & ADDRESS:</b>
                {{$cci->exportersbank}},
                <br/>
                <i>{{$cci->exportersaddress}}<br/></i>
                <b>BANK REF_NO:</b> {{$cci->exporterbank_ref}}
            </td>
        </tr>
        <tr>
            <td><b>IMPORTER'S NAME & ADDRESS:</b>
                {{$cci->importersname}},
                <br/>
                <i>{{$cci->importersaddress}}<br/></i>
                <b>RC NO:</b> {{$cci->rc_no}}
            </td>
            <td><b>IMPORTER'S BANK & ADDRESS:</b>
                {{$cci->importerbank}},
                <br/>
                <i>{{$cci->importersaddress}}<br/></i>
                <b>BANK REF_NO:</b> {{$cci->importerbank_ref}}
            </td>
        </tr>
        <tr>
            <td>
                GOODS TO BE EXPORTED: {{$cci->descriptionofgoods}}<br/>
                UNITS: {{$cci->units}}<br/>
                NOMINATED QUANTITY:{{ $cci->quantity}} <br/>
                UNIT PRICE:{{$cci->unitprice}} <br/>
                BASIS OF SALE: {{$cci->basisofsale}}<br/>
                <br/>
                EXPORTER'S FOB INVOICE VALUE:{{number_format($cci->exporterinvoicevalue,2)}}<br/>
            </td>
            <td>
                EXPORTER INVOICE NO.:{{$cci->exp_invoice}} <br/>
                INVOICE DATE: {{$cci->invoice_date}}<br/>
                CURRENCY: {{$cci->currency}}<br/>
                PAYMENT TERMS: {{$cci->payment_terms}}<br/>
               <br/>
                TOTAL INVOICE VALUE:{{number_format($cci->totalvalue,2)}}<br/>
            </td>
        </tr>
        <tr><td colspan=4 style="text-align: center; background-color: black ; color:white">DECLARED SHIPPING DETAILS</td></tr>
        <tr>
            <td>
                SHIPMENT (B/L) DATE: {{$cci->shipdate}}<br/>
               
                POINT OF EXPORT:  {{$cci->exitport}}<br/>
                POINT OF EXIT:  {{$cci->pointofexit}}<br/>
                LOADING REF NO: {{$cci->loading_no}}<br/>
            </td>
            <td>
                CARRIER/VESSEL: {{$cci->vessel}}<br/>
                SHIPPING AGENT: {{$cci->shipagent}}<br/>
                DESTINATION: {{$cci->destination}}<br/>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; background-color: black ; color:white">PRESHIPMENT INSPECTION FINDINGS</td>
            <td style="text-align: center; background-color: black ; color:white">EXPORTER'S PAYMENT DETAILS</td>
        </tr>    
        <tr>
            <td>
                GOODS TO BE EXPORTED:{{$cci->pif_description}} <br/>
                QUALITY: {{$cci->pif_quality}}<br/>
                INSPECTION DATE: {{$cci->pif_inspectiondate}}<br/>
                UNITS: {{$cci->pif_units}}<br/>
                (B/L) QUANTITY: {{$cci->pif_quantity}}<br/>
                UNIT PRICE: {{$cci->pif_unitprice}}<br/>
                TOTAL FOB VALUE OF GOODS: {{number_format($cci->pif_valueofgoods,2)}}<br/>
                NESS CHARGES PAYABLE:{{number_format($cci->pif_ness_charge_payable,2)}}<br/>
                
            </td>
            <td>
                RECEIPT NUMBER :{{$cci->pif_receipt_no}}<br/>
                CURRENCY:{{$cci->pif_currency}}<br/>
                EXCHANGE RATE: {{$cci->pif_exchange_rate}}<br/><br/>
                (B/L) QUANTITY: {{$cci->quantity}}<br/>
                UNIT PRICE: {{$cci->pif_unitprice}}<br/>
                TOTAL FOB VALUE OF GOODS: {{number_format($cci->pif_valueofgoods,2)}}<br/> 
                NESS CHARGES PAID: {{number_format($cci->pif_actual_ness_charges,2)}}<br/>


            </td>
        </tr>
        <tr>
            <tr><td colspan=4 style="text-align: center; background-color: black ; color:white"> OUTSTANDING DETAILS</td></tr>
        </tr>
        <tr>
            <td colspan=4>
                FOB VALUE OF GOODS OUTSTANDING: {{number_format(($cci->pif_valueofgoods - $cci->pif_valueofgoods),2)}}  <br/>

                NESS CHARGES OUTSTANDING: {{number_format(($cci->pif_ness_charge_payable) - ($cci->pif_actual_ness_charges),2)}}<br/>

            </td>
        </tr>
        <tr>
            <td>
                <div><img src="/img/smoh-sign.png" alt="signature of authorized approver" ></div>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td style="text-align: center">
                REPRESENTATIVE:
            </td>
            <td style="text-align: center">
                
            </td>
        </tr>

    </table>
    <div style="color: red"><i>Special Note: NESS Fees are being calculated as 0.12% of the Total FOB Values </i></div>
    </div>
</div>     
