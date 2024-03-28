<title>CCI CERTIFICATE | {{$cci->cci_id}}</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div style="width:21cm; height:28cm;  overflow: hidden;">
<div style="float:left">
    <img src="/img/holborn_logo.png" alt="Logo" width="60" height="60">
</div>
    <div>
        <div style="float:right">
            {!! QrCode::generate($jsoncci) !!}</div>
        <h3 style="text-align: center" >HOLBORN OIL & GAS LIMITED</h3>

        <h5 style="text-align: center" >CLEAN CERTIFICATE OF INSPECTION <br/>
ACCORDING TO THE EXPORT REQUIREMENTS OF THE FEDERAL REPUBLIC OF NIGERIA</h5>
<h6 style="text-align: center" ><u>http://cic.holbornoil.ng/check/printcert?id={{$cci->id}}</u></h6>

<div style="font-size: 11px; text-align:center; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif"><strong>CCI Number: {{$cci->cci_id}}</strong></div>
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
                <b>DATE:</b> {{$cci->appr_date}}
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
                <b>GOODS TO BE EXPORTED:</b> {{$cci->descriptionofgoods}}<br/>
                <b>UNITS:</b> {{$cci->units}}<br/>
                <b>NOMINATED QUANTITY:</b>{{ $cci->quantity}} <br/>
                <b>UNIT PRICE:</b>{{$cci->unitprice}} <br/>
                <b>BASIS OF SALE:</b> {{$cci->basisofsale}}<br/>
                <br/>
                <b>EXPORTER'S FOB INVOICE VALUE:</b>{{number_format($cci->exporterinvoicevalue,4)}}<br/>
            </td>
            <td>
                <b>EXPORTER INVOICE NO.:</b>{{$cci->exp_invoice}} <br/>
                <b>INVOICE DATE:</b> {{$cci->invoice_date}}<br/>
                <b>CURRENCY: </b>{{$cci->currency}}<br/>
                <b>PAYMENT TERMS:</b> {{$cci->payment_terms}}<br/>
               <br/>
                <b>TOTAL INVOICE VALUE:</b>{{number_format($cci->totalvalue,4)}}<br/>
            </td>
        </tr>
        <tr><td colspan=4 style="text-align: center; background-color: black ; color:white">DECLARED SHIPPING DETAILS</td></tr>
        <tr>
            <td>
                <b>SHIPMENT (B/L) DATE:</b> {{ $cci->shipdate}}<br/>
               
                <b>LOADING PORT: </b> {{$cci->exitport}}<br/>
                <b>DISCHARGE PORT: </b> {{$cci->pointofexit}}<br/>
                <b>LOADING REF NO: </b>{{$cci->loading_no}}<br/>
            </td>
            <td>
                <b>CARRIER/VESSEL: </b>{{$cci->vessel}}<br/>
                <b>SHIPPING AGENT: </b>{{$cci->shipagent}}<br/>
                <b>DESTINATION: </b>{{$cci->destination}}<br/>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; background-color: black ; color:white">PRESHIPMENT INSPECTION FINDINGS</td>
            <td style="text-align: center; background-color: black ; color:white">EXPORTER'S PAYMENT DETAILS</td>
        </tr>    
        <tr>
            <td>
                <b>GOODS TO BE EXPORTED:</b>{{$cci->pif_description}} <br/>
                <b>QUALITY: </b>{{$cci->pif_quality}}<br/>
                <b>INSPECTION DATE: </b>{{ $cci->pif_inspectiondate}}<br/>
                <b>UNITS: </b>{{$cci->pif_units}}<br/>
                <b>(B/L) QUANTITY:</b> {{number_format($cci->pif_quantity,4)}}<br/>
                <b>UNIT PRICE: </b>{{$cci->pif_unitprice}}<br/>
                <b>TOTAL FOB VALUE OF GOODS:</b> {{number_format($cci->pif_valueofgoods,4)}}<br/>
                <b>NESS CHARGES PAYABLE:</b>{{number_format($cci->pif_ness_charge_payable,4)}}<br/>
                
            </td>
            <td>
                <b>RECEIPT NUMBER :</b>{{$cci->pif_receipt_no}}<br/>
                <b>CURRENCY:</b>{{$cci->pif_currency}}<br/>
                <b>EXCHANGE RATE: </b>{{number_format($cci->pif_exchange_rate,4)}}<br/><br/>
                <b>(B/L) QUANTITY:</b> {{number_format($cci->quantity,4)}}<br/>
                <b>UNIT PRICE: </b>{{$cci->pif_unitprice}}<br/>
                <b>TOTAL FOB VALUE OF GOODS:</b> {{number_format($cci->pif_valueofgoods,4)}}<br/> 
                <b>NESS CHARGES PAID: </b>{{number_format($cci->pif_actual_ness_charges,4)}}<br/>


            </td>
        </tr>
        <tr>
            <tr><td colspan=4 style="text-align: center; background-color: black ; color:white"> OUTSTANDING DETAILS</td></tr>
        </tr>
        <tr>
            <td colspan=4>
                FOB VALUE OF GOODS OUTSTANDING: {{number_format(($cci->pif_valueofgoods - $cci->pif_valueofgoods),4)}}  <br/>

                NESS CHARGES OUTSTANDING: {{number_format(($cci->pif_ness_charge_payable) - ($cci->pif_actual_ness_charges),4)}}<br/>

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
