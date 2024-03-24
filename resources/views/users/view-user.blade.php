<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>
    @php
    $logincheck=null;
    $btranscheck=null;
    $validcheck=null;
    $approvecheck=null;
    $supercheck=null;
    $admincheck=null;


       if (str_contains($showuser->role, '0')){
        $logincheck="checked='checked'";

       };

        if(str_contains($showuser->role, '777')){
            $btranscheck="checked='checked'";

        };
           
       if(str_contains($showuser->role, 'VALIDATOR')){
        $validcheck="checked='checked'";

       }
           
        if( str_contains($showuser->role, 'APPROVER')){
            $approvecheck="checked='checked'";
        };
           
        if (str_contains($showuser->role, 'SUPERUSER'))
        {
            $supercheck="checked='checked'";
        };
        if(str_contains($showuser->role, 'ADMINISTRATOR'))
            {$admincheck="checked='checked'";};

    

    
    @endphp

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                UPDATE USER PROFILE
                <div class="max-w-xl">
                    <form action="/usermgmt/edit_user_profile" method="post">
                        @csrf
                   
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $showuser->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $showuser->email)" required autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        <input type="text" name='id' value={{$showuser->id}} hidden>
                        <x-primary-button>{{ __('Save') }}</x-primary-button>

                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    UPDATE USER PASSWORD
                    New Password
                    Save
                   
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    UPDATE USER ROLE(S)
                    <form action="/usermgmt/edit_user" method="post">
                        {{ csrf_field() }}
                <div class="grid grid-cols-3 gap-3"> 
                    
                    <label class="container">Login
                        <input type="checkbox" name='login' {{$logincheck}}
                        class="before:content[''] peer relative h-5 w-5 cursor-pointer 
                        appearance-none rounded-md border border-blue-gray-200 transition-all 
                        before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 
                        before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full 
                        before:bg-blue-gray-500 before:opacity-0 before:transition-opacity 
                        checked:border-gray-900 checked:bg-blue-900 checked:before:bg-gray-900 hover:before:opacity-10">
                        <span></span>
                      </label>
                      
                      <label class="container">Begin Transaction
                        <input type="checkbox" name='begintrans' {{$btranscheck}}
                        class="before:content[''] peer relative h-5 w-5 cursor-pointer 
                        appearance-none rounded-md border border-blue-gray-200 transition-all 
                        before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 
                        before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full 
                        before:bg-blue-gray-500 before:opacity-0 before:transition-opacity 
                        checked:border-gray-900 checked:bg-blue-900 checked:before:bg-gray-900 hover:before:opacity-10">
                        <span></span>
                      </label>
                      
                      <label class="container">Validator
                        <input type="checkbox" name="validator" {{$validcheck}}
                        class="before:content[''] peer relative h-5 w-5 cursor-pointer 
                        appearance-none rounded-md border border-blue-gray-200 transition-all 
                        before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 
                        before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full 
                        before:bg-blue-gray-500 before:opacity-0 before:transition-opacity 
                        checked:border-gray-900 checked:bg-blue-900 checked:before:bg-gray-900 hover:before:opacity-10">
                        <span></span>
                      </label>
                      
                      <label class="container">Approver
                        <input type="checkbox" name='approver' {{$approvecheck}}
                        class="before:content[''] peer relative h-5 w-5 cursor-pointer 
                        appearance-none rounded-md border border-blue-gray-200 transition-all 
                        before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 
                        before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full 
                        before:bg-blue-gray-500 before:opacity-0 before:transition-opacity 
                        checked:border-gray-900 checked:bg-blue-900 checked:before:bg-gray-900 hover:before:opacity-10">
                        <span></span>
                      </label>
                      <label class="container">Super User
                        <input type="checkbox" name='suser' {{$supercheck}}
                        class="before:content[''] peer relative h-5 w-5 cursor-pointer 
                        appearance-none rounded-md border border-blue-gray-200 transition-all 
                        before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 
                        before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full 
                        before:bg-blue-gray-500 before:opacity-0 before:transition-opacity 
                        checked:border-gray-900 checked:bg-blue-900 checked:before:bg-gray-900 hover:before:opacity-10">
                        <span ></span>
                      </label>
                      <label class="container">Administrator
                        <input type="checkbox" name='admin' {{$admincheck}}
                        class="before:content[''] peer relative h-5 w-5 cursor-pointer 
                        appearance-none rounded-md border border-blue-gray-200 transition-all 
                        before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 
                        before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full 
                        before:bg-blue-gray-500 before:opacity-0 before:transition-opacity 
                        checked:border-gray-900 checked:bg-blue-900 checked:before:bg-gray-900 hover:before:opacity-10"
                        >
                        <span ></span>
                      </label>

                      
                        <input type="text" name='id' value={{$showuser->id}} hidden>
                    
                      
                </div>
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </form>
                    
                </div> 
                   
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    DELETE USER ACCOUNT
                    Once the account is deleted, all of its resources and data will be permanently deleted. 
                
                    <form action="/usermgmt/del_user" method="post">
                        {{ csrf_field() }}
                <div>
                    <input type="text" name='id' value={{$showuser->id}} hidden>
                </div>
                <x-danger-button>{{ __('Delete') }}</x-danger-button>
            </form>  
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
