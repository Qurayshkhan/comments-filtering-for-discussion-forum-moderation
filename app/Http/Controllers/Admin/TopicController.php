<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    public function topics()
    {
        $topics = Topic::all();
        return view('pages.admin.topics.topics', compact('topics'));
    }
    public function topicKeywords()
    {
        $keywords = Keyword::all();
        return view('pages.admin.topics.keywords.keyword', compact('keywords'));
    }

    public function addKeyWords(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $keyword = new Keyword();
        $keyword->name = $request->name;
        $keyword->save();
        return redirect()->back()->with('status', 'keyword add successfully');
    }
    public function updateKeyWords(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $keyword = Keyword::find($request->keyword_id);
        $keyword->name = $request->name;
        $keyword->update();
        return redirect()->back()->with('status', 'keyword update successfully');
    }

    public function deleteTopic($topicId)
    {
        $topic = Topic::find($topicId);
        $topic->delete();
        return redirect()->back()->with('status', 'topic delete successfully');
    }

    public function deleteKeyWord($keywordId)
    {
        $keyword = Keyword::find($keywordId);
        $keyword->delete();
        return redirect()->back()->with('status', 'keyword delete successfully');
    }
}
