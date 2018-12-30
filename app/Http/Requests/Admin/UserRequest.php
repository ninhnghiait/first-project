<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserRequest extends FormRequest
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
            'password' => __('user.password'),
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
        $id = $request->segment(3);
        $minPassword = !is_null($request->get('password')) ? '|min:6' : ''; 
        $secondaryEmail = !is_null($request->get('secondary_email')) ? '|email' : ''; 
        // $required = strpos($route->getName(), "store") ? "|required" : "";
        // $uniqueName = strpos($route->getName(), "store") ? "|unique:users" : "|unique:users,name,".$id;
        // $uniqueEmail = strpos($route->getName(), "store") ? "|unique:users" : "|unique:users,email,".$id;
        if (strpos($route->getName(), "store")) {
            return [
                'name' => 'required|string|min:6|max:100|unique:users|regex:/^[a-zA-Z0-9]+$/',
                'email' => 'required|email|min:6|max:100|unique:users',
                'first_name' => 'string|max:100',
                'last_name' => 'string|max:100',
                'password' => 'max:100|min:6|required|confirmed',
            ];
        } else {
            return [
                'name' => 'required|string|min:6|max:100|regex:/^[a-zA-Z0-9]+$/|unique:users,name,'.$id,
                'email' => 'required|email|min:6|max:100|unique:users,email,'.$id,
                'first_name' => 'string|max:100',
                'last_name' => 'string|max:100',
                'password' => 'max:100|confirmed'.$minPassword,
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

}
