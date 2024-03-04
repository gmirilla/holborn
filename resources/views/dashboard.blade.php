<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    {{ __("You are  logged in!") }}
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top:10px;">
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black-900 dark:text-black-100">
                    <div class="grid grid-cols-4 gap-4">
                    <div><a href='/newcert/create' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">NEW CERTIFICATE</a></div>
                    <div><a href='/newcert/approved' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> VIEW CERTIFICATE</a></div>
                    <div><a href='/newcert/approval_list' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">APPROVE CERTICATE</a></div>
                    <div><a href='/newcert/genreport' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> GENERATE REPORTS </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
