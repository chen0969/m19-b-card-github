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
use App\UserCompany;
use App\UserSocialBtn;
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

    public function addCompany(Request $req)
    {
        $req->validate([
            'company_name' => 'string|max:255|nullable',
            'company_description' => 'max:1200|nullable',
        ]);

        $company = new UserCompany(); // 替換為你的模型名稱
        $company->company_name = $req->company_name;
        $company->company_description = $req->company_description;
        $company->user_id = Auth::id(); // 假設你有 user_id 欄位關聯公司與使用者


        if ($company->save()) {
            // Return back with a success message
            return back()->with('success', '資料更新成功。');
        } else {
            // Handle save failure
            return back()->withErrors(['error' => 'Failed to update bg color.']);
        }
    }

    public function updateCompany(Request $req)
    {
        $req->validate([
            'id' => 'required|exists:user_companies,id',
            'company_name' => 'string|max:255|nullable',
            'company_description' => 'string|max:255|nullable',
        ]);

        $User = Auth::user();
        if (!$User) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        $company = UserCompany::where('user_id', $User->id)->where('id', $req->id)->first();

        if (!$company) {
            return back()->withErrors(['error' => 'Company record not found.']);
        }
        // Update the company record
        $company->company_name = $req->company_name;
        $company->company_description = $req->company_description;

        if ($company->save()) {
            return back()->with('success', 'Company record updated successfully.');
        } else {
            return back()->withErrors(['error' => 'Failed to update the company record.']);
        }
    }

    public function updateCompanySocial(Request $req)
    {
        $req->validate([
            'id' => 'required|exists:user_companies,id',
            'facebook' => 'max:1200|nullable',
            'instagram' => 'max:1200|nullable',
            'line' => 'max:1200|nullable',
            'twitter' => 'max:1200|nullable',
            'linkedin' => 'max:1200|nullable',
            'discord' => 'max:1200|nullable',
            'pinterest' => 'max:1200|nullable',
            'threads' => 'max:1200|nullable',
            'tiktok' => 'max:1200|nullable',
            'youtube' => 'max:1200|nullable',
            'wechat' => 'max:1200|nullable',
            'whatsapp' => 'max:1200|nullable',
            'other' => 'max:1200|nullable'
        ]);
    
        $User = Auth::user();
        if (!$User) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        $company = UserCompany::where('user_id', $User->id)->where('id', $req->id)->first();
        if (!$company) {
            return back()->withErrors(['error' => 'Company record not found.']);
        }
    
        $fields = $req->only([
            'facebook', 'instagram', 'line', 'twitter', 'linkedin', 
            'discord', 'pinterest', 'tiktok', 'youtube', 
            'wechat', 'whatsapp', 'other'
        ]);
    
        foreach ($fields as $field => $value) {
            if ($req->has($field) && $req->$field !== null) {
                $company->$field = '<button class="col-3"><a target="_blank" href="' . $req->$field . '"><i class="bi bi-' . $field . ' c-socialSection__icon" data-btn_status="show"></i></a></button>';
            } else {
                $company->$field = null; // Explicitly set to null if input is null
            }
        }


        if ($company->save()) {
            return back()->with('success', 'Company record updated successfully.');
        } else {
            return back()->withErrors(['error' => 'Failed to update the company record.']);
        }
    }



    public function updateSocialBtn(Request $req)
    {
        $req->validate([
            'facebook' => 'max:1200|nullable',
            'instagram' => 'max:1200|nullable',
            'line' => 'max:1200|nullable',
            'twitter' => 'max:1200|nullable',
            'linkedin' => 'max:1200|nullable',
            'discord' => 'max:1200|nullable',
            'pinterest' => 'max:1200|nullable',
            'threads' => 'max:1200|nullable',
            'tiktok' => 'max:1200|nullable',
            'youtube' => 'max:1200|nullable',
            'wechat' => 'max:1200|nullable',
            'whatsapp' => 'max:1200|nullable',
            'other' => 'max:1200|nullable'
        ]);

        $User = Auth::user();

        $fields = [
            'facebook', 'instagram', 'line', 'twitter', 'linkedin', 
            'discord', 'pinterest', 'tiktok', 'youtube', 
            'wechat', 'whatsapp', 'other'
        ];
    
        $btn = UserSocialBtn::where('user_id', $User->id)->first();
    
        for ($i = 0; $i < count($fields); $i++) {
            $field = $fields[$i]; // Get the current field name
            if ($req->has($field) && $req->$field !== null) {
                $btn->$field = '<button class="col-3"><a target="_blank" href="' . $req->$field . '"><i class="bi bi-' . $field . ' c-socialSection__icon text-white" data-btn_status="show"></i></a></button>';
            }else {
                $btn->$field = null; // Explicitly set to null if input is null
            }
        }

        if ($btn->save()) {
            return back()->with('success', 'Company record updated successfully.');
        } else {
            return back()->withErrors(['error' => 'Failed to update the company record.']);
        }
    }
    // end of b-card function
}
