<?php

namespace App\Http\Controllers;

use DB;
use App\Profile;
use App\Chapter;
use App\ChapterComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function displayTheory($field, $nr)
    {
        $chapterSearch = DB::table('chapters')->where([['field',$field],['chapter_nr',$nr]])->first();
        if($chapterSearch == null)
            return redirect()->back()->with('message', 'Chapter you are looking for currently doesnt exist');
        $chapter_id = $chapterSearch->id;
        $chapter = Chapter::where('id', $chapter_id)->first();
        $comments = $chapter->comments()->get();
        $next = $nr + 1;
        $prev = $nr - 1;
        return view('chapter/theory')->with('chapter', $chapter)->with('comments', $comments)->with('next', $next)->with('prev', $prev);
    }

    public function displayPractice($field, $nr)
    {
        $chapterSearch = DB::table('chapters')->where('field',$field)->where('chapter_nr',$nr)->first();
        if($chapterSearch == null)
            return redirect()->back()->with('message', 'Chapter you are looking for currently doesnt exist');
        $chapter_id = $chapterSearch->id;
        $chapter = Chapter::where('id', $chapter_id)->first();
        $next = $nr + 1;
        $prev = $nr - 1;
        if($chapter->field == 'HTML')
            return view('chapter/htmlpractice')->with('chapter', $chapter)->with('next', $next)->with('prev', $prev);
        elseif($chapter->field == 'CSS')
            return view('chapter/csspractice')->with('chapter', $chapter)->with('next', $next)->with('prev', $prev);
        elseif($chapter->field == 'JS')
            return view('chapter/jspractice')->with('chapter', $chapter)->with('next', $next)->with('prev', $prev);
    }

    public function displayNextTheory($field, $nr)
    {
        $user_profile = Profile::where('user_id', Auth::user()->id)->first();
        if($field == 'HTML')
            $user_profile->html = $user_profile->html + 5;
        else if($field == 'CSS')
            $user_profile->css = $user_profile->css + 5;
        else if($field == 'JS')
            $user_profile->js = $user_profile->js + 5;
        else $user_profile->php = $user_profile->php + 5;
        $user_profile->update();
        return redirect()->route('chapterTheory', ['field' => $field, 'nr' => $nr]);
    }
    
    public function displayNextPractice($field, $nr)
    {
        $user_profile = Profile::where('user_id', Auth::user()->id)->first();
        if($field == 'HTML')
            $user_profile->html = $user_profile->html + 5;
        else if($field == 'CSS')
            $user_profile->css = $user_profile->css + 5;
        else if($field == 'JS')
            $user_profile->js = $user_profile->js + 5;
        else $user_profile->php = $user_profile->php + 5;
        $user_profile->update();
        return redirect()->route('chapterPractice', ['field' => $field, 'nr' => $nr]);
    }

    public function createComment(Request $request, $id)
    {
        $this->validate($request, array(
            'comment' => 'required|max:10000'
        ));

        $chapter = Chapter::where('id', $id)->first();
        $comment = new ChapterComment;
        $comment->chapter_id = $id;
        $comment->comment = $request['comment'];
        $request->user()->comments()->save($comment);
        return redirect()->route('chapterTheory', ['field' => $chapter->field, 'nr' => $chapter->chapter_nr]);
    }
}