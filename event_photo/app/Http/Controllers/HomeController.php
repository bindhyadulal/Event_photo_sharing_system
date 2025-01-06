<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\EventBooking;
use App\Models\GuestUploads;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $events_booked = EventBooking::count();
        $photo_contributor = GuestUploads::count();
        return view('index',compact('events_booked','photo_contributor'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required', 'parent_id' => 'nullable|exists:folders,id']);
        Folder::create($request->only('name', 'parent_id'));

        return back()->with('success', 'Folder created successfully!');
    }

    public function destroy(Folder $folder)
    {
        $folder->delete();
        return back()->with('success', 'Folder deleted successfully!');
    }
}
