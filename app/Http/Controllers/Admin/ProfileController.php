<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfilePasswordRequest;
use App\Http\Requests\Admin\ProfileRequest;
use App\Model\Role;
use App\Traits\RedirectTraits;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use RedirectTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $this->setUrl();
        $item = User::findOrFail($id); 
        return view('profiles.index', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        $userData = $request->only(['first_name', 'last_name', 'email', 'avatar', 'active']);
        
        if ($user->update($userData)) {
            // role
            $user->roles()->sync($request->roles);
            // profile
            $profileData = $request->only('secondary_email', 'address', 'secondary_address', 'job', 'gender', 'about', 'facebook', 'google_plus', 'twitter', 'skype', 'website', 'country_code');
            if (!is_null($request->birthday)) {
                $arBirthday = explode('/', $request->birthday);
                $profileData['birthday'] = Carbon::createFromDate($arBirthday[2], $arBirthday[1], $arBirthday[0]);
            }
            $profileData['phone_number'] = str_replace(' ', '', $request->phone_number);
            $user->profile()->updateOrCreate(['user_id' => $id], $profileData);

            $url = $this->getUrl(route('adprofiles.index'));
            return redirect($url)->with('alert', __('action.success'));
        }
        $url = $this->getUrl(route('adprofiles.index'));
        return redirect($url);
    }

    public function resetPassword(ProfilePasswordRequest $request)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            $alert = __('action.success');
        } else { $alert = __('action.error'); }
        $url = $this->getUrl(route('adprofiles.index'));
        return redirect($url)->with('alert', $alert);
    }
}
