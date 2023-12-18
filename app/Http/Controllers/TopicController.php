<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Keyword;
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
        $title = $request->name;
        $content = $request->content;

        $keywords = Keyword::pluck('name')->toArray();

        foreach ($keywords as $word) {
            if (stripos($title, $word) !== false) {
                $title = str_ireplace($word, '***', $title);
            }
            if (stripos($content, $word) !== false) {
                $content = str_ireplace($word, '***', $content);
            }
        }
        $topic->title = $title;
        $topic->content = $content;

        $topic->save();

        return redirect()->back()->with('status', 'Topic created successfully');
    }

    public function details($topic)
    {
        $topic = Topic::where('id', $topic)->with('comments')->first();
        return view('pages.topics.open-topic', compact('topic'));
    }

    public function storeComment(Request $request)
    {
        $comments = $request->comment;
        $keywords = Keyword::pluck('name')->toArray();

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->topic_id =  $request->topic_id;

        foreach ($keywords as $word) {
            if (stripos($comments, $word) !== false) {
                $comments = str_ireplace($word, '***', $comments);
            }
        }
        $comment->comment = $comments;
        $comment->save();
        return redirect()->back()->with('status', 'Comment added successfully');
    }
}
