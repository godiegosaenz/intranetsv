<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Cache;


class StoreUserRoleRequest extends FormRequest
{
    protected $errorBag = 'erolesusers';
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
            'role' => 'bail|required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $numPermissionUser = User::CountPermissionsDirects($this->route('user'));
            if($numPermissionUser > 0){
                //Cache::put('tabusuario', 2);
                $validator->errors()->add('role', 'Para cambiar de rol debe eliminar los permisos especiales!');
            }

        });
    }
    protected function prepareForValidation()
    {
        //Cache::put('tabusuario', 2);
    }

}
