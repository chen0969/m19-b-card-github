<?php

namespace App\Http\Controllers;

use App\Experience;
use App\University;
use App\UserPostCategoryRelation;
use App\UserReference;
use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\UserSkillRelation;
use App\Invite;
use App\CollectUser;
use App\PostCategory;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile()
    {
        $uid = Auth::user()->id;
        $skills = Skill::all();
        $user_skill_relation = UserSkillRelation::where('user_id', $uid)->get();
        $userSkills = [];
        foreach ($user_skill_relation as $ele) {
            array_push($userSkills, $ele->skill_id);
        }

        $Data = [
            'skills' => $skills,
            'universities' => University::all()->transform(function ($item, $key) {
                return [
                    'value' => $item->id,
                    'label' => $item->chinese_name . $item->english_name
                ];
            }),
            'categories' => PostCategory::all(),
            'user_categories' => auth()->user()->postCategory->pluck('post_category_id')->toArray(),
            'user_skills' => $userSkills,
            'user' => Auth::user(),
        ];
        return view('user.profile')->with('Data', $Data);
    }

    public function getAll()
    {
        $User = User::all();
        return json_encode($User, JSON_UNESCAPED_UNICODE);
    }

    // m19 business card functions
    public function updateName(Request $req)
    {
        // Validate input data
        $req->validate([
            'name' => 'required|string|max:255',
        ]);

        // Get the currently logged-in user
        $User = Auth::user();

        // Check if the user exists
        if (!$User) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        // Update user fields
        $User->name = $req->name;

        // Save changes
        if ($User->save()) {
            // Return back with a success message
            return back()->with('success', '資料更新成功。');
        } else {
            // Handle save failure
            return back()->withErrors(['error' => 'Failed to update name.']);
        }
    }

    public function updateDescription(Request $req)
    {
        // Validate input data
        $req->validate([
            'description' => 'max:1200|nullable',
        ]);

        // Get the currently logged-in user
        $User = Auth::user();

        // Check if the user exists
        if (!$User) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        // Update user fields
        $User->description = $req->description;

        // Save changes
        if ($User->save()) {
            // Return back with a success message
            return back()->with('success', '資料更新成功。');
        } else {
            // Handle save failure
            return back()->withErrors(['error' => 'Failed to update name.']);
        }
    }

    public function updateContact(Request $req)
    {
        $req->validate([
            'phone' => 'string|max:255|nullable',
            'email' => 'string|max:255|nullable',
        ]);

        $User = Auth::user();
        if (!$User) {
            return back()->withErrors(['error' => 'User phone & email info not found.']);
        }
        if ($req->has('phone')) {
            $User->phone = isset($req->phone) ? $req->phone : '';
        }
        if ($req->has('email')) {
            $User->email = isset($req->email) ? $req->email : '';
        }

        if ($User->save()) {
            // Return back with a success message
            return back()->with('success', '資料更新成功。');
        } else {
            // Handle save failure
            return back()->withErrors(['error' => 'Failed to update name.']);
        }
    }

    public function updateBgColor(Request $req)
    {
        // Validate input data
        $req->validate([
            'bg_color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ]);

        // Get the currently logged-in user
        $User = Auth::user();

        // Check if the user exists
        if (!$User) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        // Update user fields
        $User->bg_color = $req->bg_color;

        // Save changes
        if ($User->save()) {
            // Return back with a success message
            return back()->with('success', '資料更新成功。');
        } else {
            // Handle save failure
            return back()->withErrors(['error' => 'Failed to update bg color.']);
        }
    }


    // end of b-card function
}
