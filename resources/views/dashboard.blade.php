
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" style='font-family: "Trebuchet MS", Tahoma, sans-serif;'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    {{ __("You are  logged in!") }}
                    

                    <div class='form-group'>
                        
                        <form action="/dashboard" method="post">
                            @csrf

                        <label style="display:none">Search by CCI Id </label>
                        <div class="flex">
                        <input type="text" value="" placeholder="Search by CCI Id" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
                        text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="taskcci_id"  name="searchcci_id">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">GO</button>
                        </div>
                        
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top:10px;">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100"> 
                    <div class="grid grid-cols-4 gap-4">
                        @php
                            if (str_contains($roles,'ADMINISTRATOR')) 
                            {
                             $adminshow="<div><a href='/usermgmt' class='bg-red-500 hover:bg-green-700 text-white 
                                font-bold py-2 px-4 rounded'>ADMINISTRATION 
                                </a></div>";
                                echo $adminshow;
                            }
                        @endphp


                    
                    <div><a href='/newcert/create' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">NEW CERTIFICATE</a></div>
                    <div><a href='/newcert/validate' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">VALIDATE CERTICATE</a></div>
                    <div><a href='/newcert/approval_list' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> APPROVE CERTIFICATE</a></div>
                    <div><a href='/newcert/genreport' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> GENERATE REPORTS </a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top:10px;">
            <div class="bg-white dark:bg-white-800 overflow:auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <table class="table-auto table table-bordered border border-slate-500 border-separate data-table" 
                    id="laravel_datatable" style="color:black; border: 1px solid;">
                        <thead class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left" style="background-color: blue"> 
                            <th style="width: 10%; border: 1px solid;">CCI No</th>
                            <th style="width: 15%; border: 1px solid;">EXPORTER</th>
                            <th style="width: 15%;border: 1px solid;">IMPORTER</th>
                            <th style="width: 25%;border: 1px solid;">GOODS TO EXPORT</th>
                            <th style="width: 10%;border: 1px solid;">VALUE OF GOODS</th>
                            <th style="width: 10%;border: 1px solid;">STATUS</th>
                            <th style="width: 15%;border: 1px solid;"></th>
                        </thead>
                        @forelse ( $ccilist as $cic)
                        <tr >
                            <td style="border: 1px solid;">{{$cic->cci_id}}</td>
                            <td style="border: 1px solid;">{{$cic->exportersname}}</td>
                            <td style="border: 1px solid;">{{$cic->importersname}}</td>
                            <td style="border: 1px solid;">{{$cic->pif_description}}</td>
                            <td style="border: 1px solid;">{{number_format($cic->pif_valueofgoods,2)}}</td>
                            <td style="border: 1px solid;">{{$cic->status}}</td>
                            <td style="border: 1px solid;padding:8px;"><a href='newcert/getcert?id={{$cic->id}}' class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"> VIEW </td>
                        </tr>  
                        @empty
                            <td colspan="7">NO CERTIFICATES TO SHOW</td>
                        @endforelse

                            

                    </table>  
                    <div class="row" style="padding:5px;">
                        <div class="col-md-12">
                           {{ $ccilist->links('pagination::tailwind') }}
                        </div>

                </div>
    </div>
</x-app-layout>
