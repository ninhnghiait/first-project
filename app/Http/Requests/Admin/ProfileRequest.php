<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name' => __('user.username'),
            'first_name' => __('user.first_name'),
            'last_name' => __('user.last_name'),
            'email' => 'Email',
            'secondary_email' => __('user.secondary_email'),
            'address' => __('user.address'),
            'job' => __('user.job'),
            'about' => __('user.about'),
            'facebook' =>  __('user.facebook'),
            'google_plus' =>  __('user.google_plus'),
            'twitter' =>  __('user.twitter'),
            'skype' =>  __('user.skype'),
            'website' =>  __('user.website'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Route $route, Request $request)
    {
        $id = Auth::id();
        $minPassword = !is_null($request->get('password')) ? '|min:6' : ''; 
        $secondaryEmail = !is_null($request->get('secondary_email')) ? '|email' : ''; 
        
        return [
            'email' => 'required|email|min:6|max:100|unique:users,email,'.$id,
            'first_name' => 'string|max:100',
            'last_name' => 'string|max:100',
            'secondary_email' => 'max:100'.$secondaryEmail,
            'address' => 'max:100',
            'secondary_address' => 'max:100',
            'job' => 'max:100',
            'about' => 'max:250',
            'facebook' => 'max:100',
            'google_plus' => 'max:100',
            'twitter' => 'max:100',
            'skype' => 'max:100',
            'website' => 'max:100',
        ];
        
    }

}
