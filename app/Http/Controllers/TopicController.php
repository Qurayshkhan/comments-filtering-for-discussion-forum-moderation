<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function create()
    {
        return view('pages.topics.create-topic');
    }
}
