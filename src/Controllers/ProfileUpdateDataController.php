<?php

namespace Milestone\Appframe\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Milestone\Appframe\Model\User;

class ProfileUpdateDataController extends Controller
{

    public function index(){
        if($this->bag->req('form')){
            $Validator = Validator::make($this->bag->req('data'),$this->rules());
            $status = !$Validator->fails(); $errors = $Validator->errors();
            $this->bag->store('Validation','profile',compact('status','errors'));
            if($status) {
                $User = User::find($this->bag->req('record'));
                $update = ['name' => $this->bag->req('data')['name'],'email' => $this->bag->req('data')['email']];
                if($this->bag->req('data')['password']) $update['password'] = $this->bag->req('data')['password'];
                $User->update($update);
                $this->bag->store('FormSubmitData','profile',$User->refresh());
            }
            $this->bag->store('FormSubmit','profile',$status);
        } else if($this->bag->req('data')) $this->bag->store('Data','profile',User::find($this->bag->r('user_id')));
        else {
            $this->bag->store('Form','profile',self::$form);
            $this->bag->store('Data','profile',$this->bag->r('user_details'));
        }
    }

    public static $form = [
        'id' => 'profile',
        'name' => 'profile_update_form',
        'resource' => 'user',
        'title' => 'Update Profile',
        'action_text' => 'Update Profile',
        'fields' => [
            ['id' => 'profile1', 'name' => 'name', 'type' => 'text', 'label' => 'Name',
                'attributes' => [
                    ['name' => 'inline', 'value' => '4'],
                ]
            ],
            ['id' => 'profile2', 'name' => 'email', 'type' => 'text', 'label' => 'Email',
                'attributes' => [
                    ['name' => 'inline', 'value' => '4'],
                ]
            ],
            ['id' => 'profile3', 'name' => 'password', 'type' => 'password', 'label' => 'Password',
                'attributes' => [
                    ['name' => 'placeholder', 'value' => '(leave blank for unchanged)'],
                    ['name' => 'inline', 'value' => '4'],
                ]
            ]
        ]
    ];

    public function rules(){
        return [
            'name' => ['required'],
            'email' => ['required','unique:users,email,' . Auth::id()],
        ];
    }
}