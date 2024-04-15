<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administration') }}
        </h2>
    </x-slot>

    <div class="py-12" style='font-family: "Trebuchet MS", Tahoma, sans-serif;'>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                   

                    <div class='form-group'>
                        
                        <form action="/dashboard" method="post">
                            @csrf

                        <label style="display:none">Search by User name</label>
                        <div class="flex">
                        <input type="text" value="" placeholder="Search by Username" class="form-control block flex-1 border-1 bg-transparent py-1.5 pl-1 
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

                    <div><a href='#' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">NEW USER</a></div>
                    <div><a href='/usermgmt/currency' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">CURRENCY</a></div>
                    <div><a href='/usermgmt/numbering' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> MODIFY NUMBERING</a></div>
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
                            <th style="width: 30%; border: 1px solid;">User Name</th>
                            <th style="width: 30%; border: 1px solid;">User Email</th>
                            <th style="width: 30%; border: 1px solid;">User Roles</th>
                            <th style="width: 10%;border: 1px solid;">View</th>
                        </thead>
                        @foreach ($allusers as $user )
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td><a href='usermgmt/getuser?id={{$user->id}}' class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"> VIEW </td>
                            </tr>
                        @endforeach

                    <div class="row" style="padding:5px;">
                        <div class="col-md-12">

                        </div>

                </div>
    </div>

</x-app-layout>