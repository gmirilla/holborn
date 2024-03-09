<title>CCI CERTIFICATE | {{$cci->cci_id}}</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 

<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div style="width:21cm; height:28cm;  overflow: hidden;">
    <div style="height:40px; width:40px"> LOGO </div>
    <div>
        <div style="float:right">
            {!! QrCode::generate($jsoncci) !!}</div>
        <h3 style="text-align: center" >NEROLI TECHNOLOGIES LIMITED RC: 998330</h3>

        <h5 style="text-align: center" >CLEAN CERTIFICATE OF INSPECTION <br/>
ACCORDING TO THE EXPORT REQUIREMENTS OF THE FEDERAL REPUBLIC OF NIGERIA</h5>
<h6 style="text-align: center" ><u>http://APP_HOST/newcert/print?id={{$cci->id}}</u></h6>

<div style="font-size: 11px; text-align:center;"><strong>CCI Number: {{$cci->cci_id}}</strong></div>
    </div>
    <div style="padding:10px">
    <table style=" border:2px; font-size:10px" class="table table-bordered table-sm table-striped">
        <tr><td colspan=4 style="text-align: center; background-color: black ; color:white"> EXPORTER'S DECLARATION</td></tr>
        <tr>
            <td>
                N.X.P FORM NO: {{$cci->nxpform_no}}
            </td>
            <td >
                NEPC NO: {{$cci->nepc_no}}
            </td>        
        </tr>
        <tr>
            <td>
                HS CODE: {{$cci->hscode}}
            </td>
            <td>
                ORIGIN:{{$cci->origin}}
            </td>   
      
        </tr>
        <tr>
            <td>
                YEAR: {{$cci->year}}
            </td> 
            <td>
                DATE: {{$cci->date}}
            </td>  

        </tr>
        <tr>
            <td>EXPORTER'S NAME & ADDRESS:
                <strong>{{$cci->exportersname}},</strong>
                <br/>
                <i>{{$cci->exportersaddress}}<br/></i>
                RC NO: {{$cci->rc_no}}
            </td>
            <td>EXPORTER'S BANK & ADDRESS:
                <strong>{{$cci->exportersbank}},</strong>
                <br/>
                <i>{{$cci->exportersaddress}}<br/></i>
                BANK REF_NO: {{$cci->exporterbank_ref}}
            </td>
        </tr>
        <tr>
            <td>IMPORTER'S NAME & ADDRESS:
                <strong>{{$cci->importersname}},</strong>
                <br/>
                <i>{{$cci->importersaddress}}<br/></i>
                RC NO: {{$cci->rc_no}}
            </td>
            <td>IMPORTER'S BANK & ADDRESS:
                <strong>{{$cci->importerbank}},</strong>
                <br/>
                <i>{{$cci->importersaddress}}<br/></i>
                BANK REF_NO: {{$cci->importerbank_ref}}
            </td>
        </tr>
        <tr>
            <td>
                GOODS TO BE EXPORTED: {{$cci->descriptionofgoods}}<br/>
                UNITS: {{$cci->units}}<br/>
                QUANTITY:{{ $cci->quantity}} <br/>
                UNIT PRICE:{{$cci->unitprice}} <br/>
                EXPORTER INVOICE NO.:{{$cci->exp_invoice}} <br/>
                INVOICE DATE: {{$cci->invoice_date}}
            </td>
            <td>
                BASIS OF SALE: {{$cci->basisofsale}}<br/>
                PAYMENT TERMS: {{$cci->payment_terms}}<br/>
                CURRENCY: {{$cci->currency}}<br/>
                EXPORTER'S FOB INVOICE VALUE:{{number_format($cci->exporterinvoicevalue,2)}}<br/>
                FREIGHT CHARGES:{{number_format($cci->freightcharges,2)}}<br/>
                INSURANCE CHARGES:{{number_format($cci->insurance,2)}}<br/>
                TOTAL INVOICE VALUE:{{number_format($cci->totalvalue,2)}}<br/>
            </td>
        </tr>
        <tr><td colspan=4 style="text-align: center; background-color: black ; color:white">DECLARED SHIPPING DETAILS</td></tr>
        <tr>
            <td>
                SHIPMENT DATE: {{$cci->shipdate}}<br/>
                CARRIER/VESSEL: {{$cci->vessel}}<br/>
                EXIT POINT:  {{$cci->exitport}}<br/>
            </td>
            <td>
                SHIPPING AGENT: {{$cci->shipagent}}<<br/>
                LOADING REF NO: {{$cci->loading_no}}<br/>
                DESTINATION: {{$cci->destination}}<br/>
            </td>
        </tr>
        <tr>
            <td colspan=4 style="text-align: center; background-color: black ; color:white">PRESHIPMENT INSPECTION FINDINGS</td>
        </tr>    
        <tr>
            <td>
                HS CODE: {{$cci->pif_hscode}} <br/>
                GOODS TO BE EXPORTED:{{$cci->pif_description}} <br/>
                UNITS: {{$cci->pif_units}}<br/>
                QUANTITY: {{$cci->pif_quantity}}<br/>
                UNIT PRICE: {{$cci->pif_unitprice}}<br/>
                PACKAGING DETAILS: {{$cci->pif_packaging}}<br/>
                QUALITY: {{$cci->pif_quality}}<br/>

                FOREX PROCEEDS DUE TO TRANSACTION: {{number_format($cci->pif_forexproc,2).$cci->pif_currency}}<br/>
                EXCHANGE DATE: {{$cci->pif_exchange_date}}<br/>
                RATE OF EXCHANGE: ₦{{$cci->pif_exchange_rate}}<br/>
                NESS CHARGES PAYABLE:₦{{number_format($cci->pif_ness_charge_payable,2)}}<br/>
                ACTUAL NESS CHARGES: ₦{{number_format($cci->pif_actual_ness_charges,2)}}<br/>
                BALANCE PAID: ₦{{number_format($cci->pif_balance_paid,2)}}<br/>
            </td>
            <td>
                TOTAL FOB VALUE OF GOODS: {{$cci->pif_valueofgoods}}<br/>
                TOTAL FREIGHT CHARGES: {{$cci->pif_freightcharges}}<br/>
                TOTAL INSURANCE CHARGES:{{$cci->pif_insurance}},<br/>
                BASIS OF SALE: {{$cci->pif_bos}}<br/>
                INSPECTION DATE: {{$cci->pif_inspectiondate}}<br/>
                GROSS WEIGHT:{{$cci->pif_gweight}}<br/>
                NET WEIGHT:{{$cci->pif_nweight}}<br/>
                CURRENCY:{{$cci->pif_currency}}<br/>
                RECEIPT NUMBER :{{$cci->pif_receipt_no}}<br/>
                RECEIPT NUMBER :{{$cci->pif_receipt_no2}}<br/>

            </td>
        </tr>
        <tr>
            <td colspan=4>
                REPRESENTATIVE:
            </td>
        </tr>

    </table>
    </div>
</div>     


