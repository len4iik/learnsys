<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function showKnowledgeQuiz()
    {
        return view('quizzes/knowledgequiz');
    }

    public function showStylesQuiz()
    {
        return view('quizzes/stylesquiz');
    }

    public function knowledgeQuizResults(Request $request)
    { 
        $user_id = $request->user()->id;
        $profile = Profile::where('user_id', $user_id)->first();
        $profile->html = $request['html'];
        $profile->css = $request['css'];
        $profile->js = $request['js'];
        $profile->php = $request['php'];
        $profile->save();
        return redirect()->route('userMainPage');
    }

    public function stylesQuizResults(Request $request)
    {
        $activist = 0;
        $pragmatist = 0;
        $theorist = 0;
        $reflector = 0;
        $style = '';

        if($request['q1'] == 1) $activist++;
        if($request['q2'] == 1) $reflector++;
        if($request['q3'] == 1) $activist++;
        if($request['q4'] == 1) $pragmatist++;
        if($request['q5'] == 1) $pragmatist++;
        if($request['q6'] == 1) $reflector++;
        if($request['q7'] == 1) $theorist++;
        if($request['q8'] == 1) $activist++;
        if($request['q9'] == 1) $reflector++;
        if($request['q10'] == 1) $theorist++;
        if($request['q11'] == 1) $pragmatist++;
        if($request['q12'] == 1) $theorist++;
        if($request['q13'] == 1) $pragmatist++;
        if($request['q14'] == 1) $reflector++;
        if($request['q15'] == 1) $theorist++;
        if($request['q16'] == 1) $activist++;
        if($request['q17'] == 1) $pragmatist++;
        if($request['q18'] == 1) $reflector++;
        if($request['q19'] == 1) $activist++;
        if($request['q20'] == 1) $theorist++;
        if($request['q21'] == 1) $theorist++;
        if($request['q22'] == 1) $reflector++;
        if($request['q23'] == 1) $activist++;
        if($request['q24'] == 1) $pragmatist++;

        if($activist >= $pragmatist)
        {
            if ($activist >= $theorist)
            {
                if ($activist >= $reflector)
                    $style = 'activist';
                else $style = 'reflector';
            }
            else
            {
                if ($theorist >= $reflector)
                    $style = 'theorist';
                else $style = 'reflector';
            }
        }
        else
        {
            if ($pragmatist >= $theorist)
            {
                if ($pragmatist >= $reflector)
                    $style = 'pragmatist';
                else $style = 'reflector';
            }
            else
            {
                if ($theorist >= $reflector)
                    $style = 'theorist';
                else $style = 'reflector';
            }
        }

        $user_id = $request->user()->id;
        $user = User::where('id', $user_id)->first();
        $user->learning_style = $style;
        $user->save();
        
        //$text = 'Thenks for taking our quiz, you can see the result in your profile';
        return redirect()->route('userMainPage');
    }
}