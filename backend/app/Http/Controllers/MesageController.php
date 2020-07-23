<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MessageRepository;

class MesageController extends Controller
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
}
