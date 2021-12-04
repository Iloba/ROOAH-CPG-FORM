<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScholarshipEntry;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $entries = ScholarshipEntry::latest()->paginate(5);
        return view('home', ['entries' => $entries]);
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
