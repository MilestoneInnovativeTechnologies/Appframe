<?php

namespace Milestone\Appframe\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Milestone\Appframe\Model\User;
use Milestone\Appframe\Model\Group;

class SetupUser extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function store_setupuser(){
        $user = User::create($this->only(['name','email','password']));
        $user->Groups()->attach(Group::withoutGlobalScopes()->where('name','setup_user')->first());
    }
}
