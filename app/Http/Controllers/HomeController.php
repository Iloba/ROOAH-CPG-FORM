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
    public function index(Request $request)
    {

        $entries = ScholarshipEntry::Sortable()->paginate(10);
        if ($request->has('search')) {
            $entries = ScholarshipEntry::where(
                'full_name',
                'like',
                "%{$request->search}%"
            )->orWhere('full_name', 'like', "%{$request->search}%")
                ->orWhere('country', 'like', "%{$request->search}%")
                ->orWhere('age', 'like', "%{$request->search}%")
                ->paginate(10);
        }
        return view('home', ['entries' => $entries]);
    }

    public function ReviewEntry($id)
    {

        //Get the entry
        $entry = ScholarshipEntry::where('id', $id)->first();

        //Set Reviewed to True
        $entry->reviewed = true;

        $entry->save();


        Session::flash('success', 'Entry Marked as reviwed');
        return redirect()->back();
    }

    public function ReverseReviewEntry($id)
    {
        //Get the entry
        $entry = ScholarshipEntry::where('id', $id)->first();

        //Set Reviewed to False
        $entry->reviewed = false;

        $entry->save();


        Session::flash('success', 'Reversed Changes');
        return redirect()->back();
    }

    public function StatusInterviewed($id)
    {

        //Get the entry
        $entry = ScholarshipEntry::where('id', $id)->first();

        //Set interviewed to yes and reviewed to true
        $entry->status = 'Interviewed';

        $entry->save();


        Session::flash('success', 'Status set to Interviewed');
        return redirect()->back();
    }

    public function StatusHired($id)
    {

        //Get the entry
        $entry = ScholarshipEntry::where('id', $id)->first();

        //Set interviewed to yes and reviewed to true
        $entry->status = 'Hired';

        $entry->save();


        Session::flash('success', 'Status set to Hired');
        return redirect()->back();
    }

    public function StatusTerminated($id)
    {

        //Get the entry
        $entry = ScholarshipEntry::where('id', $id)->first();

        //Set interviewed to yes and reviewed to true
        $entry->status = 'Contract Terminated';

        $entry->save();


        Session::flash('success', 'Status set to Terminated');
        return redirect()->back();
    }
}
