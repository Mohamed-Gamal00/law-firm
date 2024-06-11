<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Team::select('id')->get() ?? new Team();
        $lastMember = Team::orderBy('id', 'desc')->first();
        if ($lastMember) {
            Carbon::setLocale('ar');
            $createdAt = new Carbon($lastMember->created_at);
            $memberTimeSinceCreation = $createdAt->diffForHumans();
        } else {
            echo "No member found.";
        }

        $posts = Post::select('id')->get() ?? new Post;
        $lastPost = Post::orderBy('id', 'desc')->first();
        if ($lastPost) {
            Carbon::setLocale('ar');
            $createdAt = new Carbon($lastPost->created_at);
            $postTimeSinceCreation = $createdAt->diffForHumans();
        } else {
            echo "No posts found.";
        }


        $contacts = Contact::select('id')->get() ?? new Contact;
        $lastContact = Contact::orderBy('id', 'desc')->first();
        if ($lastContact) {
            Carbon::setLocale('ar');
            $createdAt = new Carbon($lastContact->created_at);
            $timeSinceCreation = $createdAt->diffForHumans();
        } else {
            echo "No contacts found.";
        }


        $booking = Booking::select('id')->get() ?? new Booking;
        $lastBook = Booking::orderBy('id', 'desc')->first();
        if ($lastBook) {
            Carbon::setLocale('ar');
            $createdAt = new Carbon($lastBook->created_at);
            $bookingTimeSinceCreation = $createdAt->diffForHumans();
        } else {
            echo "No booking found.";
        }
        // dd($mediaCenterContent);
        return view('dashboard.index', compact('posts', 'postTimeSinceCreation', 'teams', 'memberTimeSinceCreation', 'contacts', 'timeSinceCreation', 'booking', 'bookingTimeSinceCreation'));
    }
}
