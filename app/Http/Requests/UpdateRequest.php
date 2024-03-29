<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'icon' => 'image|max:1024|nullable',
            'name' => ['required', 'min:1', 'max:10', Rule::unique('coins', 'name')->where('user_id', Auth::id())->ignore($this->id)],
            'number' => 'required|numeric|min:1',
        ];
    }
}
