<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Currency') }}
        </h2>
    </x-slot>
    <div class="py-12" style='font-family: "Trebuchet MS", Tahoma, sans-serif;'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top:10px;">
            <div class="bg-white dark:bg-white-800 overflow:auto shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <table class="table-auto table table-bordered border border-slate-500 border-separate data-table" 
                    id="laravel_datatable" style="color:black; border: 1px solid;">
                        <thead class="border border-slate-300 dark:border-slate-600 font-semibold p-4 text-slate-900 dark:text-slate-200 text-left" style="background-color: blue"> 
                            <th style="width: 30%; border: 1px solid;">Currency Name</th>
                            <th style="width: 30%; border: 1px solid;">Abbr </th>
                            <th style="width: 30%; border: 1px solid;">Symbol</th>
                            <th style="width: 10%;border: 1px solid;">View</th>
                        </thead>
                        @foreach ($allcurr as $curr )
                            <tr>
                                <td>{{$curr->name}}</td>
                                <td>{{$curr->abbr}}</td>
                                <td>{{$curr->symbol}}</td>
                                <td><a href='usermgmt/getcurr?id={{$curr->id}}' class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"> VIEW </td>
                            </tr>
                        @endforeach
                    </table>

                    <div class="row" style="padding:5px;">
                        <div class="col-md-12">

                        </div>

    
    </div>

</x-app-layout>