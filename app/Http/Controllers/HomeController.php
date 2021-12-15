<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScholarshipEntry;
use Illuminate\Support\Facades\DB;
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

        $entriesCount = ScholarshipEntry::all()->count();
        $HiredEntriesCount = ScholarshipEntry::where('status', 'Hired')->count();
        $interviewedEntriesCount = ScholarshipEntry::where('status', 'Interviewed')->count();
        $terminatedEntriesCount = ScholarshipEntry::where('status', 'Contract Terminated')->count();
        $reviewedEntriesCount = ScholarshipEntry::where('reviewed', true)->count();
        $entries = ScholarshipEntry::Sortable()->paginate(10);
        $countries = ScholarshipEntry::all(['country']);
        $ages = ScholarshipEntry::all(['age']);
        $englishLevels = ScholarshipEntry::all(['english_level']);
        $playingTImes =  ScholarshipEntry::all(['playing_time']);
        $experiences =   ScholarshipEntry::all(['axie_played']);
        $statuses = ScholarshipEntry::all(['status']);
        $dateRegistereds = ScholarshipEntry::all(['created_at']);



        //Filter by country
        if ($request->has('country')) {
            $entries = ScholarshipEntry::where('country', $request->country)->distinct()->paginate(10);
        }


        //filter by Age
        if ($request->has('age')) {
            $entries = ScholarshipEntry::where('age', $request->age)->paginate(10);
        }

        //Filter by English Level
        if ($request->has('english_level')) {
            $entries = ScholarshipEntry::where('english_level', $request->english_level)->paginate(10);
        }

        //Filter By Playing Time
        if ($request->has('playing_time')) {
            $entries = ScholarshipEntry::where('playing_time', $request->playing_time)->paginate(10);
        }

        //FIlter by Experiences
        if ($request->has('experience')) {
            $entries = ScholarshipEntry::where('axie_played', $request->experience)->paginate(10);
        }

        //Filter By Status
        if ($request->has('status')) {
            $entries = ScholarshipEntry::where('status', $request->status)->paginate(10);
        }

        //Filter by Date Registered
        if ($request->has('created_at')) {
            $entries = ScholarshipEntry::where('created_at', $request->created_at)->paginate(10);
        }

        //Search
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



        return view('home', [
            'entries' => $entries,
            'countries' => $countries,
            'ages' => $ages,
            'englishLevels' =>  $englishLevels,
            'playingTimes' => $playingTImes,
            'experiences' =>  $experiences,
            'statuses' => $statuses,
            'dateRegistereds' => $dateRegistereds,
            'entriesCount' => $entriesCount,
            'HiredEntriesCount' => $HiredEntriesCount,
            'interviewedEntriesCount' => $interviewedEntriesCount,
            'terminatedEntriesCount' => $terminatedEntriesCount,
            'reviewedEntriesCount'  => $reviewedEntriesCount

        ]);
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

    public function ReverseInterviewedEntry($id)
    {

        //Get the entry
        $entry = ScholarshipEntry::where('id', $id)->first();

        //Set interviewed to yes and reviewed to true
        $entry->status = 'Not Interviewed';

        $entry->save();


        Session::flash('success', 'Reversed Changes');
        return redirect()->back();
    }

    public function setStatusToNotQualified($id){
          //Get the entry
          $entry = ScholarshipEntry::where('id', $id)->first();

          //Set interviewed to yes and reviewed to true
          $entry->status = 'Not Qualified';
  
          $entry->save();
  
  
          Session::flash('success', 'Status set to not Qualified');
          return redirect()->back();
    }

    public function StatusNotTerminated($id){

           //Get the entry
           $entry = ScholarshipEntry::where('id', $id)->first();

           //Set interviewed to yes and reviewed to true
           $entry->status = 'Not Interviewed';
   
           $entry->save();
   
   
           Session::flash('success', 'Changes Reversed');
           return redirect()->back();
    }
}
