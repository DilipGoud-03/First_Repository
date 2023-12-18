<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Employers;
use App\Models\User;

// use App\Models\EmployersContactInfo;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function oneToOne()
    {
        $EmployerAndDetails = User::with(['EmployeAndDetails'])->where('id', 4)->get();
        echo '<pre>';
        // print_r($EmployerAndDetails);

        for ($i = 0; $i < count($EmployerAndDetails); $i++) {
            echo ($EmployerAndDetails[$i] . "<br>");
        }
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";

        $EmployerContactInfo = Employers::with(['EmployerContactInfo'])->where('id', 2)->get();

        for ($i = 0; $i < count($EmployerContactInfo); $i++) {

            print_r($EmployerContactInfo[$i] . "<br>");
        }
        // $EmployerContactInfo = Employers::find(1);
        // $EmployerContactInfo = Employers::where('id', 1)->get();
    }
}
