<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<x-app-layout>
    <div style='font-family: "Trebuchet MS", Tahoma, sans-serif;'>
    <div class="card-header text-center font-weight-bold" style="color: #fff">CCI NUMBER: {{$cci->cci_id}} | STATUS: ( {{$cci->status}})</div>
<div class="card-header text-center font-weight-bold" style="color: #fff">EXPORTER'S DECLARATION </div>
<div class="card-body py-12 bg-white" style="margin: 15px; padding:10px;">
    @if ($errors->any())
    <div class="alert alert-danger" style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="/newcert/createstep1" method="post">
    {{ csrf_field() }}
    <div class="form-group" style="display:none ;">
        <label for="cci_id">CCI ID:</label>
        <input type="text" value={{$cci->cci_id}} class="form-control shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="taskncci_id"  name="cci_id">
    </div>
    <div class="grid grid-cols-5 gap-3">
    <div class="form-group">
        <label for="nxpform_no" class="block text-sm font-medium leading-6 text-gray-900">N.X.P FORM NO:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknxpform_no" required  name="nxpform_no">
    </div>
    <div class="form-group">
        <label for="nepcno">N.E.P.C NO:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknepcno" required  name="nepcno">
    </div>
    <div class="form-group" style="display:none">
        <label for="year">YEAR:</label>
        <input type="text" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value={{$cci->year}} data-input required name="year">
  
    </div>
    <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value={{date('Y-m-d')}} data-input required name="date" readonly>
  
    </div>
    <div class="form-group">
        <label for="hscode">H.S. CODE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskhscode" required  name="hscode">
    </div>
    <div class="form-group">
        <label for="origin">ORIGIN:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskorigin" required  name="origin">
    </div>
    <div class="form-group">
        <label for="importersname">IMPORTER'S NAME</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimportersname" required  name="importersname">
    </div>
    <div class="form-group">
        <label for="importersaddress">IMPORTER'S ADDRESS:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimportersaddress" required  name="importersaddress">
    </div>
    <div class="form-group">
        <label for="importersbank">IMPORTER'S BANK:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimportersbank"   required name="importersbank">
    </div>
    <div class="form-group">
        <label for="importerbank_ref">IMPORTER BANK REF:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimporterbank_ref" required  name="importerbank_ref">
    </div>
    <div class="form-group">
        <label for="exportersname">EXPORTER'S NAME:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexportersname" required   name="exportersname">
    </div>
    <div class="form-group">
        <label for="exportersaddress">EXPORTER'S ADDRESS:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexportersaddress" required  name="exportersaddress">
    </div>
    <div class="form-group">
        <label for="exportersbank">EXPORTER'S BANK:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexportersbank" required  name="exportersbank">
    </div>
    <div class="form-group">
        <label for="rc_no">EXPORTER'S RC NO:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskrc_no" required  name="rc_no">
    </div>
    <div class="form-group">
        <label for="exporterbank_ref">EXPORTER'S BANK REF:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexporterbank_ref"  required name="exporterbank_ref">
    </div>
    <div class="form-group">
        <label for="descriptionofgoods">DESCRIPTION OF GOODS:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskdescriptionofgoods" required  name="descriptionofgoods">
    </div>
    <div class="form-group">
        <label for="basisofsale">BASIS OF SALE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskbasisofsale" required  name="basisofsale">
    </div>
    <div class="form-group">
        <label for="units">UNITS:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskunits" required  name="units">
    </div>
    <div class="form-group">
        <label for="quantity">QUANTITY:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskquantity" required   name="quantity">
    </div>
    <div class="form-group">
        <label for="unitprice">UNITPRICE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskunitprice" required name="unitprice">
    </div>
    <div class="form-group">
        <label for="exp_invoice">EXPORTER'S INVOICE NO:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskep_invoice" required  name="exp_invoice">
    </div>
    <div class="form-group">
        <label for="invoice_date">INVOICE DATE:</label>
        <input type="date" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskinvoicedate" required   name="invoice_date">
    </div>
    <div class="form-group">
        <label for="payment_terms">PAYMENT TERMS:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpaymentterms"  required  name="payment_terms">
    </div>
    <div class="form-group">
        <label for="currency">CURRENCY:</label>
        <select id="currency" name="currency" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            @foreach ($curr as $currs )
            <option value='{{$currs->abbr}}'> {{$currs->name}} </option>
            @endforeach
        </select>
    </div>
    <!--form element hidden at user request-->
    <div class="form-group" style="display: none">
        <label for="exporterinvoicevalue">EXPORTER INVOICE VALUE:</label>
        <input type="text" value="0" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskexporterinvoicevalue"  name="exporterinvoicevalue">
    </div>
    <div class="form-group" style="display: none;">
        <label for="freightcharges">FREIGHT CHARGES:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskfreightcharges"  name="freightcharges">
    </div>
    <div class="form-group" style="display: none;">
        <label for="insurance">INSURANCE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskinsurance"  name="insurance">
    </div>
    <div class="form-group">
        <label for="totalvalue">TOTAL VALUE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasktotalvalue" required readonly name="totalvalue">
    </div>
    <div class="form-group" style="display:none ;">
        <label for="cc_id">ID:</label>
        <input type="text" value={{$cci->id}} class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="id" style="visibility': 'hidden'">
    </div>
    <div class="form-group" style="display:none ;">
        <label for="status">ID:</label>
        <input type="text" value='{{$cci->status}}' class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="status" style="visibility': 'hidden'">
    </div>
</div>
<div style="margin-top: 15px;">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">SHIPPING DETAILS</button>
</div>
</form>
</div>
</div>
</x-app-layout>

<script>
    document.getElementById("taskquantity").onchange = function() {myFunction()};
    document.getElementById("taskunitprice").onchange = function() {myFunction()};
    
    function myFunction() {
      var x = document.getElementById("taskquantity");
      var y=document.getElementById("taskunitprice");
      var z=document.getElementById("tasktotalvalue");
    
      tvalue=y.value *x.value;
      z.value =tvalue.toFixed(4); 
    }
        </script>



 