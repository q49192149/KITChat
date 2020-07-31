<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MessageRepository;

class MessageController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @param  MessageRepository  $messageRepository
     * @return void
     */
    public function __construct(MessageRepository $messageRepository)
    {
        $this->repo = $messageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the messages
        $messages = $this->repo->all();

        // Load the view and pass the question types
        return view('home.index', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Set the require fields
        $request->validate([
            'content'=>'required',
            'tags'=>'required',
            'sender'=>'required',
        ]);

        // Create the tag object
        $data = array(
            'content' => $request->get('content'),
            'tags' => $request->get('tags'),
            'sender' => $request->get('sender')
        );
        
        $message = $this->repo->create($data);
        $messages = $this->repo->all();
        $tags = config('kitchat_tags.clubs');

        return redirect('/home')->with(['tags' => $tags, 'messages' => $messages]);
    }
}
