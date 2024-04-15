<?php


/**
 * Write code on Method
 *
 * use App\Models\User;
use Illuminate\Support\Facades\Auth;
 * @return response()
 *         if (str_contains($user->role, 'ADMINISTRATOR')){
            $arole="YES";
            
        }
        else {
            $arole="NO";
        };
 */
if (! function_exists('userisAdmin')) {
    function userisAdmin()
    {
        $user = "TEST";


        return $user;
    }
}