<x-app-layout>
    <div class="card-header text-center font-weight-bold" style="color: #fff">CCI NUMBER: {{$cci->cci_id}} | STATUS: ( {{$cci->status}})</div>
<div class="card-header text-center font-weight-bold" style="color: #fff">DECLARED SHIPPING DETAILS </div>
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
<form action="/newcert/createstep2" method="post">
    {{ csrf_field() }}
    <div class="grid grid-cols-4 gap-4">
    <div class="form-group">
        <label for='shipdate'>SHIPMENT (B/L) DATE</label>
        <input type="date" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknxpform_no"  name="shipdate">
    </div>
    <div class="form-group">
        <label for="shipagent">SHIPPING AGENT</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="tasknepcno"  name="shipagent">
    </div>
    <div class="form-group">
        <label for="vessel">VESSEL</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskhscode"  name="vessel">
    </div>
    <div class="form-group">
        <label for="loadingno">LOADING NO:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskorigin"  name="loadingno">
    </div>
    <div class="form-group">
        <label for="exitport">POINT OF EXPORT</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskimportersname"  name="exitport">
    </div>
    <div class="form-group">
        <label for="pointofexit">POINT OF EXIT</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskpoe"  name="pointofexit">
    </div>
    <div class="form-group">
        <label for="destination">DESTINATION:</label>
        <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskdestination"  name="destination">
    </div>
    <div class="form-group" style="display:none ;">
        <label for="cc_id">ID:</label>
        <input type="text" value={{$cci->id}} class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskid"  name="id" style="visibility': 'hidden'">
    </div>
</div>
<div style="margin-top: 15px;">
    <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> < GO BACK </a>
</div>
<div style="margin-top: 15px;">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">PRESHIPMENT INSPECTION</button>
</div>
</form>

</div>
</x-app-layout>

