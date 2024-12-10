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
            'profile_video' => Auth::user()->profile_video,
            'profile_voice' => Auth::user()->profile_voice,
            'universities' => University::all()->transform(function ($item, $key) {
                return [
                    'value' => $item->id,
                    'label' => $item->chinese_name . $item->english_name
                ];
            }),
            'categories' => PostCategory::all(),
            'user_categories' => auth()->user()->postCategory->pluck('post_category_id')->toArray(),
            'user_skills' => $userSkills,
            'user' => Auth::user()
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

    // end of b-card function
}
