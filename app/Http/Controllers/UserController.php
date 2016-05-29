<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use App\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //new user registration
    public function createUser(Request $request)
    {
        //input data validation
        $this->validate($request, array(
            'name' => 'required|min:4|max:100',
            'surname' => 'required|min:4|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:30',
            'password_confirmation' => 'required|same:password'
        ));

        //assign POST data to variable for later use
        $name = $request['name'];
        $surname = $request['surname'];
        $email = $request['email'];
        $password = bcrypt($request['password']);

        //create new user using User model
        $user = new User;
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->password = $password;

        //if user is saved to the database successfully
        if($user->save())
        {
            //create a new profile record connected to this user
            $profile = new Profile;
            $profile->user_id = $user->id;
            $profile->save();

            //login with newly created user data
            Auth::login($user);
            //and redirect to user's main page
            return redirect()->route('userMainPage')->with('success', 'Successful registration');
        }
        //if database connection fails, show error message
        else
        {
            return redirect()->route('createUser')->with('fail', 'An error occurred');
        }
        
    }
    public function mainPage()
    {
        $chapters = Chapter::all();
        return view('usermainpage', ['user' => Auth::user(), 'chapters' => $chapters]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main');
    }

    public function loginUser(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']]))
        {
            /*if(Auth::user()->isBlocked()) return View::make('auth.authdenied');
            else*/ return redirect()->route('userMainPage');
        }
        //authentification failed
        return redirect()->back()->with('fail', 'Your email/password combination was incorrect.')->withInput();
    }

    public function getProfile($id)
    {
        $user = User::where('id', $id)->first();
        return view('profile', ['user' => $user]);
    }

    public function compareProfiles($id)
    {
        $user = User::where('id', $id)->first();
        return view('compareprofiles', ['user' => $user]);
    }

    public function editProfile()
    {
        return view('editprofile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        //input data validation
        $this->validate($request, array(
            'name' => 'required|min:4|max:100',
            'surname' => 'required|min:4|max:100',
            'learning_style' => 'required'
        ));

        $user = Auth::user();
        $user->name = $request['name'];
        $user->surname = $request['surname'];
        $user->birth_date = $request['birth_date'];
        $user->learning_style = $request['learning_style'];
        $user->update();

        return redirect()->route('getProfile', ['id' => $user->id]);
    }
}