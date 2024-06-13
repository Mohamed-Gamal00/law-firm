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
        $lastMember = Team::select('id','created_at')->orderBy('id', 'desc')->first();
        $memberTimeSinceCreation = $this->handelTimeCreation($lastMember);

        $posts = Post::select('id')->get() ?? new Post;
        $lastPost = Post::orderBy('id', 'desc')->first();
        $postTimeSinceCreation = $this->handelTimeCreation($lastPost);


        $contacts = Contact::select('*')->get() ?? new Contact;
        $lastContacts = Contact::select('*')->orderByDesc('created_at')->take(5)->get() ?? new Contact;

        $lastContact = Contact::orderBy('id', 'desc')->first();
        $timeSinceCreation = $this->handelTimeCreation($lastContact);


        $booking = Booking::select('*')->get() ?? new Booking;
        $lastBooks = Booking::select('*')->orderByDesc('created_at')->take(5)->get() ?? new Booking;

        $lastBook = Booking::orderBy('id', 'desc')->first();
        $bookingTimeSinceCreation = $this->handelTimeCreation($lastBook);

        // dd($mediaCenterContent);
        return view('dashboard.index', compact('posts', 'postTimeSinceCreation', 'teams', 'memberTimeSinceCreation', 'contacts', 'lastContacts', 'timeSinceCreation', 'booking', 'lastBooks', 'bookingTimeSinceCreation'));
    }

    protected function handelTimeCreation($lastMember)
    {
        if ($lastMember) {
            Carbon::setLocale('ar');
            $createdAt = new Carbon($lastMember->created_at);
            $TimeSinceCreation = $createdAt->diffForHumans();
            return $TimeSinceCreation;
        } else {
            echo "No member found.";
        }
    }

}
