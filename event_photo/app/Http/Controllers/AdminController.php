<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\EventBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        
        return view('admin.index');
    }

}
