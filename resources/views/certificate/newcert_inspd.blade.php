<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<x-app-layout>
    <div style='font-family: "Trebuchet MS", Tahoma, sans-serif'>
<div class="card-header text-center font-weight-bold" style="color: #fff">CCI NUMBER: {{$cci->cci_id}} | STATUS: ( {{$cci->status}})</div>
<div class="card-header text-center font-weight-bold" style="color: #fff">PRE-SHIPMENT INSPECTION FINDINGS</div>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card-body py-12 bg-white" style="margin: 15px; padding:10px;">
<form action="/newcert/createstep3" method="post">
    {{ csrf_field() }}
    <div class="grid grid-cols-4 gap-4">
        <!-- element hidden at client request -->
    <div class="form-group" style="display: none">
        <label for="pif_hscode">H.S. CODE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_hscode"  name="pif_hscode">
    </div>
    <div class="form-group">
        <label for="pif_description">DESCRIPTION:</label>
        <input type="text" value=""  class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknepcno"  required name="pif_description">
    </div>
    <div class="form-group">
        <label for="units">UNITS:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpifunits"  required name="pif_units">
    </div>
    <div class="form-group">
        <label for="pif_inspectiondate">INSPECTION DATE:</label>
        <input type="date" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskorigin" required  name="pif_inspectiondate">
    </div>
    <div class="form-group">
        <label for="pif_quality">QUALITY</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpifquality"  required name="pif_quality">
    </div>
    <div class="form-group">
        <label for="pif_quantity">QUANTITY (B/L)</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpifquantity"  required name="pif_quantity">
    </div>
    <div class="form-group">
        <label for="pif_unitprice">UNIT PRICE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpifunitprice" required  name="pif_unitprice">
    </div>
    <div class="form-group" style="display:none">
        <label for="pif_pakaging" >PACKAGING:</label>
        <input type="text" value="oil" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_pakaging"  name="pif_pakaging">
    </div>
    <div class="form-group" style="display: none;">
        <label for="pif_gweight">GROSS WEIGHT:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_gweight"  name="pif_gweight">
    </div>
    <div class="form-group" style="display: none;">
        <label for="pif_nweight">NET WEIGHT:</label>
        <input type="text" value=""class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_nweight"  name="pif_nweight">
    </div>
    <div class="form-group">
        <label for="pif_valueofgoods">VALUE OF GOODS:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_valueofgoods"  required  readonly name="pif_valueofgoods">
    </div>
    <div class="form-group" style="display: none;">
        <label for="pif_freightcharges">FREIGHT CHARGES:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_freightcharges"  name="pif_freightcharges">
    </div>
    <div class="form-group" style="display: none;">
        <label for="pif_insurance">INSURANCE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_insurance"  name="pif_insurance">
    </div>
    <div class="form-group">
        <label for="pif_bos">BASIS OF SALE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_bos"  required name="pif_bos">
    </div>
    <div class="form-group">
        <label for="pif_forexproc">FOREIGN EXCHANGE PROCEEDS:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_forexproc"  required name="pif_forexproc">
    </div>
    <div class="form-group">
        <label for="pif_exchangedate">EXCHAGE DATE:</label>
        <input type="date" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskunits"  required name="pif_exchange_date">
    </div>
    <div class="form-group">
        <label for="pif_currency">CURRENCY:</label>
        <select id="pif_currency" required  name="pif_currency" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            @foreach ($curr as $currs )
            <option value='{{$currs->abbr}}'> {{$currs->name}} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="pif_exchange_rate">EXCHANGE RATE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_exchangerate"   required name="pif_exchange_rate">
    </div>
    <div class="form-group">
        <label for="pif_ness_charge_payable">NESS CHARGES PAYABLE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskepif_ness_charge_payable" required  name="pif_ness_charge_payable">
    </div>
    <div class="form-group">
        <label for="pif_receipt_no">RECEIPT NUMBER:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskinvoicedate" required  name="pif_receipt_no">
    </div>
    <div class="form-group">
        <label for="pif_actual_ness_charges">ACTUAL NESS CHARGE:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_actual_ness_charges" required  name="pif_actual_ness_charges">
    </div>
    <div class="form-group">
        <label for="pif_balance_paid">BALANCE PAID:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_balance_paid" required  name="pif_balance_paid">
    </div>
    <div class="form-group" style="display: none">
        <label for="pif_receopt_no2">RECEIPT NUMBER#2:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpif_receopt_no2"  name="pif_receopt_no2">
    </div>
    <div class="form-group" style="display:none ;">
        <label for="id">ID:</label>
        <input type="text" value='{{$cci->id}}' class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="id" style="visibility': 'hidden'">
    </div>
    </div>
    <div style="margin-top: 15px;">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">SUBMIT FOR APPROVAL</button>
    </div>
</form>
</div>
</div>
</x-app-layout>
<script>
    document.getElementById("taskpif_valueofgoods").onchange = function() {myFunction()};
    document.getElementById("taskpifquantity").onchange=function(){myFunction2()};
    document.getElementById("taskpifunitprice").onchange=function(){myFunction2()};
    
    
    function myFunction() {
      var x = document.getElementById("taskepif_ness_charge_payable");

      var y=document.getElementById("taskpif_valueofgoods");
      var ness=y.value *0.0012;
      x.value =ness.toFixed(2); 
    }

    function myFunction2() {
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
    
