<x-app-layout>
<div style="background: white;" style='font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;'>
    ERROR PAGE!!
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h4 style="text-align: center; color:red"> INSUFFICIENT RIGHTS TO CARRY OUT THE REQUESTED OPERATION <br/>
        PLEASE CONTACT THE SYSTEM ADMINISTRATOR TO REQUEST FOR ELEVATED PRIVILIGES</h4>
    </div>
</x-app-layout>
