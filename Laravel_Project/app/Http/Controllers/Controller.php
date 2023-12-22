<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Employers;
use App\Models\User;
use App\Models\EmployersContactInfo;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function oneToOne()
    {
        $EmployerAndDetails = User::with(['EmployeAndDetails'])->where('id', 1)->get();
        $EmployerContactInfo = Employers::with(['EmployerContactInfo'])->where('id', 1)->get();
        echo '<pre>';
        echo ($EmployerAndDetails);
        echo "<br>";
        echo ($EmployerContactInfo);
    }
}
