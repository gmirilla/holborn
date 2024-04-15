
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Currency') }}
        </h2>
    </x-slot>
    <div class="py-12" style='font-family: "Trebuchet MS", Tahoma, sans-serif;'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                       
            <form action="/usermgmt/addcurrency" method="POST">
                @csrf
                <div class="form-group" style="display: none">
                    <label for="curr_id">ID:</label>
                    <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                    text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="curr_id"  name="curr_id">
                </div>
            <div class="grid grid-cols-5 gap-5" style="margin: 15px; padding:10px;">
                <div class="form-group">
                    <label for="curr_name">CURRENCY NAME:</label>
                    <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                    text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                    id="curr_name" placeholder="Currency name e.g. NAIRA"  
                    name="curr_name">
                </div>
                <div class="form-group">
                    <label for="curr_abbr">CURRENCY ABBR:</label>
                    <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                    text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="curr_abbr"  
                    name="curr_abbr"
                    placeholder="Currency abbrevation e.g. NGN">
                </div>
                <div class="form-group">
                    <label for="curr_abbr">CURRENCY SYMBOL:</label>
                    <input type="text" value="" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                    text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="curr_symbol"  
                    placeholder="Currency symbol e.g. ₦"
                    name="curr_symbol">
                </div>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Currency</button>
        </div>
            </form>

        </div>
        </div>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top:10px;">
            <div class="bg-white dark:bg-white-800 overflow:auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                  
                    <table class="table-auto table table-bordered border border-slate-500 border-separate data-table" 
                    id="laravel_datatable" style="color:black; border: 1px solid;">
                        <thead class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left" style="background-color: blue"> 
                            <th style="width: 30%; border: 1px solid;">Currency Name</th>
                            <th style="width: 30%; border: 1px solid;">Abbr </th>
                            <th style="width: 20%; border: 1px solid;">Symbol</th>
                            <th style="width: 10%;border: 1px solid;">Edit</th>
                            <th style="width: 10%;border: 1px solid;">Archive</th>
                        </thead>
                        @forelse ($allcurr as $curr )
                        <tr>
                            <form action="/usermgmt/editcurrency" method="POST">
                                @csrf>
                            <td><input type="text" value="{{$curr->id}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" style="display:none"
                                id="ecurr_id"   
                                name="ecurr_id">
                                <input type="text" value="{{$curr->name}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                id="ecurr_name" placeholder="Currency name e.g. NAIRA"  
                                name="ecurr_name">
                            </td>
                            <td><input type="text" value="{{$curr->abbr}}" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                id="ecurr_abbr" placeholder="Currency name e.g. NGN"  
                                name="ecurr_abbr">
                            </td>
                            <td><input type="text" value={{$curr->symbol}} class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                                text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" 
                                id="ecurr_symbol" placeholder="Currency name e.g. $"  
                                name="ecurr_symbol">
                            </td>
                            <td>
                                <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            </td>
                            <td>
                                <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @disabled(true)>Archive</button>
                            </td>
                            </form>


                        </tr>
                            @empty
                                <tr>
                                     <td colspan="4" style="text-align: center">NO CURRERNCY CONFIGURED</td>
                                    </tr>
                            
                        @endforelse
                    </table>


                    <div class="row" style="padding:5px;">
                        <div class="col-md-12">

                        </div>

    
    </div>

</x-app-layout>