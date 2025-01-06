<?php

namespace App\Http\Controllers;

use App\Models\EventBooking;
use App\Models\GuestUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Intervention\Image\Laravel\Facades\Image;

class EventBookingController extends Controller
{
    // public function eventManager(Request $request)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'phone' => 'required',
    //         'event_type' => 'required',
    //         'event_date' => 'required|date',
    //     ]);

    //     // Check if the phone number already exists
    //     $existingEvent = EventBooking::where('phone', $request->phone)->first();

    //     if ($existingEvent) {
    //         // Option 1: Update existing record
    //         $existingEvent->name = $request->name;
    //         $existingEvent->email = $request->email;
    //         $existingEvent->event_type = $request->event_type;
    //         $existingEvent->event_date = $request->event_date;
    //         $existingEvent->save();

    //         $storedEvent = $existingEvent;
    //     } else {
    //         // Option 2: Create a new record
    //         $events = new EventBooking();
    //         $events->name = $request->name;
    //         $events->email = $request->email;
    //         $events->phone = $request->phone;
    //         $events->event_type = $request->event_type;
    //         $events->event_date = $request->event_date;
    //         $events->save();

    //         $storedEvent = $events;
    //     }

    //     // Redirect to the event booking page after successful booking
    //     return view('event-booking', compact('storedEvent'));
    // }
    public function eventManager(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'event_type' => 'required',
            'event_date' => 'required|date',
        ]);

        // Check if the phone number already exists
        $existingEvent = EventBooking::where('phone', $request->phone)->first();

        if ($existingEvent) {
            // Option 1: Update existing record
            $existingEvent->name = $request->name;
            $existingEvent->email = $request->email;
            $existingEvent->event_type = $request->event_type;
            $existingEvent->event_date = $request->event_date;
            $existingEvent->save();

            $storedEvent = $existingEvent;
        } else {
            // Option 2: Create a new record
            $events = new EventBooking();
            $events->name = $request->name;
            $events->email = $request->email;
            $events->phone = $request->phone;
            $events->event_type = $request->event_type;
            $events->event_date = $request->event_date;
            $events->save();

            $storedEvent = $events;
        }

        // Create a folder with the user's name inside the public directory
        $folderPath = public_path('users/' . $storedEvent->name.'-'.$storedEvent->id);

        // Check if the folder doesn't already exist, and create it
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0755, true); // 0755 is for read/write/execute permissions
        }

        // Redirect to the event booking page after successful booking
        return view('event-booking', compact('storedEvent'));
    }

    public function terms_condition(Request $request){
        $userId = $request->query('user_id');
        $storedEvent = EventBooking::find($userId);
        return view('terms', compact('storedEvent'));
    }

    public function guest_redirect(Request $request)
    {
        $userId = $request->query('user_id');
        $storedEvent = EventBooking::find($userId);
        return view('guest-landing', compact('storedEvent'));
    }

    public function photo_store(Request $request){
        // dd($request->id);
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'user_name'=>'required',
            // 'image' => 'required|mimes:png,jpg,jpeg,svg|max:2048',
        ]);


        $guest = new GuestUploads();
        $guest->user_id = $request->id;
        $guest->contributor = $request->name;
        $current_timestamp = Carbon::now()->timestamp;
        $gallery_arr = array();
        $gallery_images = "";
        $counter = 1;

        if($request->hasFile('images'))
        {
            $allowedfileExtension = ['jpg','png','jpeg','svg'];
            $files = $request->file('images');
            $userId = $request->id;
            $user_name = $request->user_name;
            foreach($files as $file){
                $gextension = $file->getClientOriginalExtension();
                $gcheck = in_array($gextension,$allowedfileExtension);
                if($gcheck){
                    $gfileName = $current_timestamp."-".$counter.'.'.$gextension;
                    $this->GenerateClickedImage($file, $gfileName, $userId, $user_name);
                    array_push($gallery_arr,$gfileName);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',',$gallery_arr);
        }
        $guest->images = $gallery_images;
        $guest->save();

        return redirect()->back()->with('status','Images has been sent successfully');
    }

    public function GenerateClickedImage($image, $imageName, $userId, $user_name){
        // dd($user_name);
        $destinationPath = public_path('users/'. $user_name.'-'.$userId);
        $img = Image::read($image->path()); 

        // $img->cover(540,689,"top"); //height, width, position
        // $img->resize(540,689,function($constraint){
        //     $constraint->aspectRatio();
        // })->save($destinationPath.'/'.$imageName);
        $img->save($destinationPath.'/'.$imageName);

    }

}




