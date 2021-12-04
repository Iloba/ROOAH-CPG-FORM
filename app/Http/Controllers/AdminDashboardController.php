<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipEntry;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function login(Request $request){
        dd('hello');
    }

    public function dashboard(){
        //get all data
        $entries = ScholarshipEntry::all();
        return view('admin.dashboard', ['entries' => $entries]);
    }

    public function ReviewUser($id){
        dd($id);
    }

    
}
