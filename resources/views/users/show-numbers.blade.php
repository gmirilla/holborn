
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Currency') }}
        </h2>
    </x-slot>
    <div class="py-12" style='font-family: "Trebuchet MS", Tahoma, sans-serif;'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                       
            <form action="/usermgmt/addnumbers" method="POST">
                @csrf
                <div class="form-group" style="display: none">
                    <label for="number_id">ID:</label>
                    <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                    text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="number_id"  name="number_id">
                </div>
            <div class="grid grid-cols-5 gap-5" style="margin: 15px; padding:10px;">
                <div class="form-group">
                    <label for="min">MIN:</label>
                    <input type="number" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                    text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" default=0
                    id="min" placeholder="Minimum"  
                    name="min">
                </div>
                <div class="form-group">
                    <label for="max">MAX:</label>
                    <input type="number" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                    text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                    id="max" placeholder="Max Value"  
                    name="max">
                </div>
                <div class="form-group">
                    <label for="Padding">Padding:</label>
                    <input type="checkbox" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                    text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                    name="padding">
                </div>
                
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Numbering</button>
        </div>
            </form>

        </div>
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top:10px;">
            <div class="bg-white dark:bg-white-800 overflow:auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                  
                    <table class="table-auto table table-bordered border border-slate-500 border-separate data-table" 
                    id="laravel_datatable" style="color:black; border: 1px solid; width:100%">
                        <thead class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left" style="background-color: blue"> 
                            <th style="width:20% border: 1px solid;">Minimum</th>
                            <th style="width: 20% border: 1px solid;">Maximum</th>
                            <th style="width: 10% border: 1px solid;">Padding</th>
                            <th style="width: 20% border: 1px solid;">Last</th>
                            <th style="width: 10% border: 1px solid;">Step</th>
                            <th style="width: 20% border: 1px solid;">Edit</th>
                        </thead>
                        @forelse ($allnumber as $number )
                        <tr>
                            <form action="/usermgmt/editnumbering" method="POST">
                                @csrf>
                            <td><input type="text" value="{{$number->id}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" style="display:none"
                                id="ecurr_id"   
                                name="ecurr_id">
                                <input type="number" value="{{$number->min}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                id="min"   
                                name="min">
                            </td>
                            <td><input type="number" value="{{$number->max}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                id="max" 
                                name="max">
                            </td>
                            <td><input type="checkbox" value={{$number->padding}} class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                id="padding" 
                                name="padding">
                            </td>
                            <td><input type="number" value="{{$number->last}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                id="last" 
                                name="last">
                            </td>
                            <td><input type="number" value="{{$number->step}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                id="last" 
                                name="last">
                            </td>
                            <td>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            </td>

                            </form>


                        </tr>
                            @empty
                                <tr>
                                     <td colspan="4" style="text-align: center">NUMBERING NOT  CONFIGURED</td>
                                    </tr>
                            
                        @endforelse
                    </table>


                    <div class="row" style="padding:5px;">
                        <div class="col-md-12">

                        </div>

    
    </div>

</x-app-layout>