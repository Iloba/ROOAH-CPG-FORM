<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\SpamProtection;
use App\Models\ScholarshipEntry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\PseudoTypes\False_;

class ScholarshipEntryController extends Controller
{
    public function StoreEntry(Request $request){
       
        //Validate Request
        $request->validate([
            'full_name' => 'required|string',
            'age' => 'required',
            'phone' => 'required|min:11',
            'occupation' => 'required|string',
            'gender' => 'required|string|in:Male,Female,Other',
            'email' => 'required|email',
            'country' => 'required|string',
            'english_level' => 'required|in:Basic,Intermediate,Advanced,Native',
            'social_account' => 'required|string',
            'discord' => 'required|string',
            'axie_played' => 'required|string',
            'understand_game_rules' => 'required|string',
            'member' => 'required',
            'experience' => 'required|string|max:255',
            'playing_time' => 'required|string|between:1,2',
            // 'comment' => 'String|max:255',
            'refferal' => 'in:Discord,Reddit,Twitter,NaijaFM,Google,Friend,CPG Employee,Other',
            'spam' => [
                'required',
                new SpamProtection(),
            ]
        ],
        [
            'gender.in' => 'Please Select Gender',
            'refferal.in' => 'Please Select Refferal',
            'english_level.in' => 'Please Select English Level',
            'axie_played.required' => 'Please Select an Option',
            'member.required' => 'Please Select an Option',
            'understand_game_rules.required' => 'Please Select an Option',
            
        ]
        );

        //Store Entry
        $entry = new ScholarshipEntry;
        $entry->full_name = $request->full_name;
        $entry->age = $request->age;
        $entry->phone = $request->phone;
        $entry->occupation = $request->occupation;
        $entry->gender = $request->gender;
        $entry->email = $request->email;
        $entry->country = $request->country;
        $entry->social_account = $request->social_account;
        $entry->discord = $request->discord;
        $entry->axie_played = $request->axie_played;
        $entry->understand_game_rules = $request->understand_game_rules;
        $entry->english_level = $request->english_level;
        $entry->member = $request->member;
        $entry->experience = $request->experience;
        $entry->playing_time = $request->playing_time;
        $entry->refferal = $request->refferal;
        $entry->refferal_detail = $request->refferal_detail;
        $entry->instant_messaging_platform = $request->im_platform;
        $entry->instant_messaging_platform_username = $request->im_username;
        $entry->comment = $request->comment;
        $entry->reviewed = False;
        $entry->status = 'Not Interviewed';

        $entry->save();

        Session::flash('success', 'Thank you for submitting your Entry. We will reach out to you');
        return redirect()->back();



    }

    public function UploadPreviousData(){

       $scholars =  Http::get('http://127.0.0.1:4000/cpgBackup1.json');
       $scholars = json_decode($scholars, true); //Converts to an Array

    //    dd($scholars);
    

       foreach($scholars as $scholar){

            $db = new ScholarshipEntry;
            $db->full_name = $scholar['axie-scholars']['#1870']['full_name'];
            $db->age = $scholar['axie-scholars']['#1870']['age'];
            $db->phone = $scholar['axie-scholars']['#1870']['tel'];
            $db->occupation = $scholar['axie-scholars']['#1870']['occupation'];
            $db->gender = $scholar['axie-scholars']['#1870']['gender'];
            $db->email = $scholar['axie-scholars']['#1870']['email'];
            $db->country = $scholar['axie-scholars']['#1870']['country'];
            $db->social_account = $scholar['axie-scholars']['#1870']['social'];
            $db->discord = $scholar['axie-scholars']['#1870']['discord'];
            $db->axie_played = $scholar['axie-scholars']['#1870']['axie_exp'];
            $db->understand_game_rules = $scholar['axie-scholars']['#1870']['rules_knowledge'];
            $db->english_level = $scholar['axie-scholars']['#1870']['english_level'];
            $db->member = $scholar['axie-scholars']['#1870']['scholarship_elsewhere'];
            $db->experience = $scholar['axie-scholars']['#1870']['gaming_exp'];
            $db->playing_time = $scholar['axie-scholars']['#1870']['play_time'];
            $db->refferal = $scholar['axie-scholars']['#1870']['referral'];
            $db->refferal_detail = '';
            $db->instant_messaging_platform = '';
            $db->instant_messaging_platform_username = '';
            $db->comment = $scholar['axie-scholars']['#1870']['additional_comments'];
            $db->reviewed = False;
            $db->status = 'Not Interviewed';
           
            // $db->save();

       }

    }

   
}
