<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2|unique:users,name,'.($this->user ?? 0),
            'email'=>'required|unique:users,email,'.($this->user ?? 0),
            'password'=>'min:8|required',
            'role_id'=>'required',
            'status'=>'required',
            'fileToUpload'=>'file|image|max:1999',
        ];
    }
}
