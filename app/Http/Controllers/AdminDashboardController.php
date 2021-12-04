<?php

namespace App\Http\Controllers;

use App\Models\Key;
use Illuminate\Http\Request;
use App\Models\ScholarshipEntry;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'key' => 'required'
        ]);
        
        $keys = Key::all();

        foreach ($keys as $key) {  
            if ($request->key === $key['key'] ){

                //Start Session


                return redirect(route('admin.dashboard'));
            }else{
                return redirect()->back();
            }
        }
    }

    public function dashboard()
    {
        //get all data
        $entries = ScholarshipEntry::latest()->paginate(5);
        return view('admin.dashboard', ['entries' => $entries]);
    }

    public function ReviewEntry($id)
    {

        //Get the entry
        $entry = ScholarshipEntry::where('id', $id)->first();

        //Set interviewed to yes and reviewed to true
        $entry->interviewed = 'yes';
        $entry->reviewed = true;

        $entry->save();


        Session::flash('success', 'Entry Marked as reviwed');
        return redirect()->back();
    }

    public function ReverseReviewEntry($id)
    {
        //Get the entry
        $entry = ScholarshipEntry::where('id', $id)->first();

        //Set interviewed to yes and reviewed to true
        $entry->interviewed = 'no';
        $entry->reviewed = false;

        $entry->save();


        Session::flash('success', 'Reversed Changes');
        return redirect()->back();
    }
}
