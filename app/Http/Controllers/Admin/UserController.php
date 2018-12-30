<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Model\Role;
use App\Traits\RedirectTraits;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    use RedirectTraits;
    public function __construct()
    {
       //$this->middleware('can:user.view')->only('index');
       //$this->middleware('can:user.update')->only(['edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::paginate(50);
        $this->setUrl();
        return view('users.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->only(['first_name', 'last_name', 'name', 'email']);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!is_null($user)) {
            $user->roles()->attach($request->roles);
            if ($request->save == 'save') {
                $url = $this->getUrl(route('adusers.index'));
                return redirect($url)->with('msg', __('action.success'));
            } else {
                return redirect()->route('adusers.edit', $user->id)->with('alert', __('action.success'));
            }
        } else {
            return redirect()->route('adusers.create')->with('alert', __('action.error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id); 
        $roles = Role::all();
        return view('users.edit', compact('item', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $userData = $request->only(['first_name', 'last_name', 'name', 'email', 'avatar', 'active']);
        if (!is_null($request->password)) $userData['password'] = Hash::make($request->password);
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
            if ($request->save == 'save') {
                $url = $this->getUrl(route('adusers.index'));
                return redirect($url)->with('alert', __('action.success'));
            } else {
                return redirect()->route('adusers.edit', $id)->with('alert', __('action.success'));
            }
        }
        $url = $this->getUrl(route('adusers.index'));
        return redirect($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $msg = $user->delete() ? __('action.success') : __('action.error');
        $url = $this->getUrl(route('adusers.index'));
        return redirect($url)->with('alert', $msg);
    }

    /**
     * Activity Log
     *
     * @return \Illuminate\Http\Response
     */
    public function activity()
    {
        // $user = User::find(2);
        $role = Role::find(2);
        activity()->performedOn($role)->log('hello');
        echo 'done</hr>';
        $lastActivity = Activity::all()->last();
        return $lastActivity->subject;
    }

    public function allActivity()
    {
        $items = Activity::all()->latest();
        return view('users.activity', compact('items'));
    }

}
