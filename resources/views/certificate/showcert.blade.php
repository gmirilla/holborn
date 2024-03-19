<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<x-app-layout>
    <div class="card-header text-center font-weight-bold" style="color: #fff">CCI NUMBER: {{$cci->cci_id}} | STATUS: ( {{$cci->status}})</div>
    <div class="card-header text-center font-weight-bold" style="color: #fff">DECLARED EXPORT DETAILS </div>
    <div class="card-body py-12 bg-white" style="margin: 15px; padding:10px;">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="/newcert/edit" method="post">
            {{ csrf_field() }}
    <div class="form-group" style="display:none ;">
        <label for="cci_id">CCI ID:</label>
        <input type="text" value={{$cci->cci_id}} class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="taskncci_id"  name="cci_id">
    </div>
    @php
        if ($cci->status!='DRAFT') {
            echo '<fieldset readonly>';
                $ro='readonly';
        }
        else{
            $ro='';
        }
    @endphp
    <div class="grid grid-cols-6 gap-2">
    <div class="form-group">
        <label for="nxpform_no" class="block text-sm font-medium leading-6 text-gray-900">N.X.P FORM NO:</label>
        <input type="text" value='{{$cci->nxpform_no}} 'class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknxpform_no" required  name="nxpform_no" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="nepcno">N.E.P.C NO:</label>
        <input type="text" value='{{$cci->nepc_no}} ' class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknepcno" required   name="nepcno" {{$ro}}>
    </div>
    <div class="form-group" style="display: none">
        <label for="year">YEAR:</label>
        <input type="text" required  class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value={{$cci->year}} data-input name="year" {{$ro}}>
  
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" required  class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value={{$cci->date}} data-input name="date" readonly>
  
    </div>
    <div class="form-group">
        <label for="hscode">H.S. CODE:</label>
        <input type="text"  value="{{$cci->hscode}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskhscode"   required name="hscode" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="origin">ORIGIN:</label>
        <input type="text" value="{{$cci->origin}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskorigin" required  name="origin" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="importersname">IMPORTER'S NAME</label>
        <input type="text" value="{{$cci->importersname}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimportersname" required  name="importersname" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="importersaddress">IMPORTER'S ADDRESS:</label>
        <input type="text" value="{{$cci->importersaddress}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimportersaddress" required  name="importersaddress" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="importersbank">IMPORTER'S BANK:</label>
        <input type="text" value="{{$cci->importerbank}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimportersbank" required  name="importersbank" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="importerbank_ref">IMPORTER BANK REF:</label>
        <input type="text" value="{{$cci->importerbank_ref}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimporterbank_ref" required  name="importerbank_ref" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="exportersname">EXPORTER'S NAME:</label>
        <input type="text" value="{{$cci->exportersname}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexportersname" required  name="exportersname" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="exportersaddress">EXPORTER'S ADDRESS:</label>
        <input type="text" value="{{$cci->exportersaddress}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexportersaddress" required  name="exportersaddress" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="exportersbank">EXPORTER'S BANK:</label>
        <input type="text" value="{{$cci->exporterbank}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexportersbank" required  name="exportersbank" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="rc_no">EXPORTER'S RC NO:</label>
        <input type="text" value="{{$cci->rc_no}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskrc_no" required  name="rc_no" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="exporterbank_ref">EXPORTER'S BANK REF:</label>
        <input type="text" value="{{$cci->exporterbank_ref}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexporterbank_ref" required  name="exporterbank_ref" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="descriptionofgoods">DESCRIPTION OF GOODS:</label>
        <input type="text" value="{{$cci->descriptionofgoods}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskdescriptionofgoods" required  name="descriptionofgoods" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="basisofsale">BASIS OF SALE:</label>
        <input type="text" value="{{$cci->basisofsale}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskbasisofsale" required  name="basisofsale" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="units">UNITS:</label>
        <input type="text" value="{{$cci->units}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskunits" required  name="units" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="quantity">NOMINATED QUANTITY:</label>
        <input type="text" value="{{$cci->quantity}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskquantity" required  name="quantity" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="unitprice">UNITPRICE:</label>
        <input type="text" value="{{$cci->unitprice}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskunitprice" required  name="unitprice" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="exp_invoice">EXPORTER'S INVOICE NO:</label>
        <input type="text" value="{{$cci->exp_invoice}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskep_invoice" required  name="exp_invoice" {{$ro}}>
    </div> 
    <div class="form-group">
        <label for="invoice_date">INVOICE DATE:</label>
        <input type="date" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value={{$cci->invoice_date}} data-input  required name="invoice_date" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="payment_terms">PAYMENT TERMS:</label>
        <input type="text" value="{{$cci->payment_terms}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpaymentterms"  required name="payment_terms" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="currency">CURRENCY:</label>
        
        <select id="currency" name="currency" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            @foreach ($curr as $currs )
            @php
            if ($currs->abbr==$cci->currency) {
               echo "<option value='{$currs->abbr}' selected >  $currs->name </option>"; 
            }
            else {
               echo "<option value='{$currs->abbr}'> $currs->name </option>";


                }
        @endphp

            @endforeach
        </select>
    </div>
    <div class="form-group" style="display: none">
        <label for="exporterinvoicevalue">EXPORTER INVOICE VALUE:</label>
        <input type="text" value="{{$cci->exporterinvoicevalue}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexporterinvoicevalue"  name="exporterinvoicevalue" {{$ro}}>
    </div>
    <div class="form-group" style="display: none">
        <label for="freightcharges"  >FREIGHT CHARGES:</label>
        <input type="number" step="any" value="{{$cci->freightcharges}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskfreightcharges"  name="freightcharges" {{$ro}}>
    </div>
    <div class="form-group"  style="display: none;">
        <label for="insurance">INSURANCE:</label>
        <input type="number" step="any" value="{{$cci->insurance}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskinsurance"  name="insurance" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="totalvalue">TOTAL VALUE:</label>
        <input type="text" value="{{$cci->totalvalue}} " class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasktotalvalue" required  name="totalvalue" readonly>
    </div>
</div>
</div>


    <div class="card-header text-center font-weight-bold" style="color: #fff">DECLARED SHIPPING DETAILS </div>
<div class="card-body py-12 bg-white" style="margin: 15px; padding:10px;">
    <div class="grid grid-cols-6 gap-2">
    <div class="form-group">
        <label for='shipdate'>SHIPMENT (B/L) DATE</label>
        <input type="date" value="{{$cci->shipdate}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknxpform_no" required  name="shipdate" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="shipagent">SHIPPING AGENT</label>
        <input type="text" value="{{$cci->shipagent}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknepcno" required  name="shipagent" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="vessel">VESSEL</label>
        <input type="text" value="{{$cci->vessel}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskhscode" required  name="vessel" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="loadingno">LOADING NO:</label>
        <input type="text" value="{{$cci->loadingno}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskorigin" required  name="loadingno" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="exitport">EXIT PORT</label>
        <input type="text" value="{{$cci->exitport}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimportersname" required  name="exitport" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pointofexit">POINT OF EXIT</label>
        <input type="text" value="{{$cci->pointofexit}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpoe" required  name="pointofexit" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="destination">DESTINATION:</label>
        <input type="text" value="{{$cci->destination}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskdestination" required  name="destination" {{$ro}}>
    </div>
</div>
</div>
<div class="card-header text-center font-weight-bold" style="color: #fff">PRE-SHIPMENT INSPECTION FINDINGS</div>
<div class="card-body py-12 bg-white" style="margin: 15px; padding:10px;">
    <div class="grid grid-cols-6 gap-2">
    <div class="form-group" style="display: none">
        <label for="pif_hscode">H.S. CODE:</label>
        <input type="text" value="{{$cci->pif_hscode}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_hscode"  name="pif_hscode">
    </div>
    <div class="form-group">
        <label for="pif_description">DESCRIPTION:</label>
        <input type="text" value="{{$cci->pif_description}}"  class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknepcno" required  name="pif_description" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="units">UNITS:</label>
        <input type="text" value="{{$cci->pif_units}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpifunits" required  name="pif_units" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_inspectiondate">INSPECTION DATE:</label>
        <input type="date" value="{{$cci->pif_inspectiondate}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskorigin" required  name="pif_inspectiondate" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_quantity">QUANTITY (B/L)</label>
        <input type="number" step="any" value="{{$cci->pif_quantity}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpifquantity" required  name="pif_quantity" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_quantity">QUALITY</label>
        <input type="text" value="{{$cci->pif_quality}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpifquantity" required  name="pif_quality" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_unitprice">UNIT PRICE:</label>
        <input type="number" step="any" value="{{$cci->pif_unitprice}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpifunitprice" required  name="pif_unitprice" {{$ro}}>
    </div>
    <div class="form-group" style="display: none">
        <label for="pif_pakaging">PACKAGING:</label>
        <input type="text" value="{{$cci->pif_pakaging}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_pakaging"  name="pif_pakaging" {{$ro}}>
    </div>
    <div class="form-group" style="display: none">
        <label for="pif_gweight">GROSS WEIGHT:</label>
        <input type="text" value="{{$cci->pif_gweight}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_gweight"  name="pif_gweight" {{$ro}}>
    </div>
    <div class="form-group" style="display: none">
        <label for="pif_nweight" >NET WEIGHT:</label>
        <input type="text" value="{{$cci->pif_nweight}}"class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_nweight"  name="pif_nweight" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_valueofgoods">VALUE OF GOODS:</label>
        <input type="number" step="any" value="{{$cci->pif_valueofgoods}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_valueofgoods" required  name="pif_valueofgoods" readonly>
    </div>
    <div class="form-group"  style="display: none;">
        <label for="pif_freightcharges">FREIGHT CHARGES:</label>
        <input type="number" step="any" value="{{$cci->pif_freightcharges}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_freightcharges"  name="pif_freightcharges" {{$ro}}>
    </div>
    <div class="form-group" style="display: none;">
        <label for="pif_insurance">INSURANCE:</label>
        <input type="number" step="any" value="{{$cci->pif_insurance}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_insurance"  name="pif_insurance" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_bos">BASIS OF SALE:</label>
        <input type="text" value="{{$cci->pif_bos}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_bos" required  name="pif_bos" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_forexproc">FOREX PROCEEDS:</label>
        <input type="text" value="{{$cci->pif_forexproc}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_forexproc" required  name="pif_forexproc" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_exchangedate">EXCHANGE DATE:</label>
        <input type="date" value="{{$cci->pif_exchange_date}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskunits" required  name="pif_exchange_date" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_currency">CURRENCY:</label>
        <select id="pif_currency" name="pif_currency" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            @foreach ($curr as $currs )
             @php
                 if ($currs->abbr==$cci->pif_currency) {
                    echo "<option value='{{$currs->abbr}}' selected >  $currs->name </option>"; 
                 }
                 else {
                    echo "<option value='{{$currs->abbr}}'> $currs->name </option>";


                     }
             @endphp

            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="pif_exchange_rate">EXCHANGE RATE:</label>
        <input type="number" step="any" value="{{$cci->pif_exchange_rate}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_exchangerate"   required name="pif_exchange_rate" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_ness_charge_payable">NESS CHARGES PAYABLE:</label>
        <input type="number" step="any" value="{{$cci->pif_ness_charge_payable}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskepif_ness_charge_payable" required  name="pif_ness_charge_payable" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_receipt_no">RECEIPT NUMBER:</label>
        <input type="text" value="{{$cci->pif_receipt_no}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskinvoicedate" required  name="pif_receipt_no" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_actual_ness_charges">ACTUAL NESS CHARGE:</label>
        <input type="number" step="any" value="{{$cci->pif_actual_ness_charges}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_actual_ness_charges" required   name="pif_actual_ness_charges" {{$ro}}>
    </div>
    <div class="form-group">
        <label for="pif_balance_paid">BALANCE PAID:</label>
        <input type="number" step="any" value="{{$cci->pif_balance_paid}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_balance_paid" required  name="pif_balance_paid" {{$ro}}>
    </div>
    <div class="form-group" style="display:none">
        <label for="pif_receopt_no2">RECEIPT NUMBER #2:</label>
        <input type="text" value="{{$cci->pif_receipt_no2}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_receopt_no2"  name="pif_receopt_no2">
    </div>
    </div>

    @php
    if ($cci->status!='DRAFT') {
        echo '</fieldset>';
    }
@endphp

    <!--  fieldset end -->
    <div class="form-group" style="display:none ;">
        <label for="id">ID:</label>
        <input type="text" value='{{$cci->id}}' class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="id" style="visibility': 'hidden'">
    </div>
    @php
        if ($cci->status=='DRAFT') {
            echo '<div class="form-group" style= display:none ">
        <label for="action">ACTION:</label>
        <input type="text" value="SUBMIT FOR VALIDATION" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="action">
    </div>';
            echo '<div style="margin-top: 15px;">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">SUBMIT FOR VALIDATION</button>
    </div>
    <div style="margin-top: 15px;">
   <a href="/newcert/edit?id='.$cci->id.'&action=CANCEL" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"> CANCEL DRAFT</a>
   </div>';
        
        }
        elseif ($cci->status=='SUBMITTED') {
           
            echo '<div class="form-group" style= display:none ">
        <label for="action">ACTION</label>
        <input type="text" value="SUBMIT FOR APPROVAL" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="action">
    </div>';
            echo '<div style="margin-top: 15px;">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> VALIDATE CERTIFICATE</button>
    </div>
    <div style="margin-top: 15px;">
   <a href="/newcert/edit?id='.$cci->id.'&action=RESET" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"> RESET TO DRAFT</a>
   </div>';
        }
        elseif ($cci->status=='VALIDATED') {
           
           echo '
          
           <div class="form-group" style= display:none ">
       <label for="action">ACTION</label>
       <input type="text" value=" APPROVAL" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
       text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="action">
   </div>';
           echo '<div style="margin-top: 15px;">
   <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> APPROVE CERTIFICATE</button>
   </div>
   <div style="margin-top: 15px;">
   <a href="/newcert/edit?id='.$cci->id.'&action=RESET" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"> REVERSE VALIDATION</a>
   </div>';
       }
       elseif ($cci->status=='APPROVED') {
           
           echo '<div class="form-group" style= display:none ">
       <label for="action">ACTION:</label>
       <input type="text" value=" PRINT" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
       text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="action">
   </div>';
           echo '<div style="margin-top: 15px;">
   <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> PRINT CERTIFICATE</button>
   </div>
   <div style="margin-top: 15px;">
   <a href="/newcert/edit?id='.$cci->id.'&action=RESET" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"> REVERSE APPROVAL</a>
   </div>';
       }
    @endphp

    
</div>
    </form>
</div>

</x-app-layout>
<script>
document.getElementById("taskpif_valueofgoods").onchange = function() {myFunction()};
document.getElementById("taskquantity").onchange = function() {myFunction2()};
document.getElementById("taskunitprice").onchange = function() {myFunction2()};
document.getElementById("taskpifquantity").onchange=function(){myFunction3()};
document.getElementById("taskpifunitprice").onchange=function(){myFunction3()};

function myFunction() {
  var x = document.getElementById("taskepif_ness_charge_payable");

  var y=document.getElementById("taskpif_valueofgoods");
  var ness=y.value *0.0012;
  x.value =ness.toFixed(2); 
}


    
    function myFunction2() {
      var x = document.getElementById("taskquantity");
      var y=document.getElementById("taskunitprice");
      var z=document.getElementById("tasktotalvalue");
    
      tvalue=y.value *x.value;
      z.value =tvalue.toFixed(4); 
    }

    function myFunction3() {
      var a = document.getElementById("taskpifquantity");
      var b = document.getElementById("taskpifunitprice");
      var c=document.getElementById("taskpif_valueofgoods");
      var x = document.getElementById("taskepif_ness_charge_payable");

      var tvalue=a.value*b.value;
      var ness=tvalue *0.0012;
      x.value =ness.toFixed(4); 
      c.value =tvalue.toFixed(4); 
    }
    



    </script>
