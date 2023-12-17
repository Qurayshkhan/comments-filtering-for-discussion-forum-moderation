<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    public function create()
    {
        return view('pages.topics.create-topic');
    }

    public function storeTopic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $topic = new Topic();
        $topic->user_id = auth()->user()->id;
        $topic->title = $request->name;
        $topic->content = $request->content;
        $topic->save();

        return redirect()->back()->with('status', 'Topic create successfully');
    }

    public function details($topic)
    {
        $topic = Topic::where('id', $topic)->with('comments')->first();
        return view('pages.topics.open-topic', compact('topic'));
    }

    public function storeComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->topic_id =  $request->topic_id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back()->with('status', 'Comment added successfully');
    }
}
