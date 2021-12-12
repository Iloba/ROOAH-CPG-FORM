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
    public function StoreEntry(Request $request)
    {

        //Validate Request
        $request->validate(
            [
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

    // public function UploadPreviousData()
    // {

    //     $scholars =  Http::get('http://127.0.0.1:4000/cpgBackup1.json');
    //     $scholars = json_decode($scholars, true); //Converts to an Array

    //     //    dd($scholars);


    //     foreach ($scholars as $scholar) {

            
    //         foreach ($scholar['axie-scholars'] as $sch) {

              
    //             $db = new ScholarshipEntry;
    //             $db->full_name = $sch['full_name'];
    //             $db->age = $sch['age'];
    //             $db->phone = isset($sch['tel']) ? $sch['tel'] : '';
    //             $db->occupation = $sch['occupation'];
    //             $db->gender = $sch['gender'];
    //             $db->email = $sch['email'];
    //             $db->country = $sch['country'];
    //             $db->social_account = $sch['social'];
    //             $db->discord = $sch['discord'];
    //             $db->axie_played = $sch['axie_exp'];
    //             $db->understand_game_rules = $sch['rules_knowledge'];
    //             $db->english_level = $sch['english_level'];
    //             $db->member = $sch['scholarship_elsewhere'];
    //             $db->experience = $sch['gaming_exp'];
    //             $db->playing_time = $sch['play_time'];
    //             $db->refferal = isset($sch['referral']) ? $sch['referral'] : '';
    //             $db->refferal_detail = '';
    //             $db->instant_messaging_platform = '';
    //             $db->instant_messaging_platform_username = '';
    //             $db->comment = $sch['additional_comments'];
    //             $db->reviewed = False;
    //             $db->status = 'Not Interviewed';
    //             $db->save();
    //         }



            

    //     }
    // }
}
