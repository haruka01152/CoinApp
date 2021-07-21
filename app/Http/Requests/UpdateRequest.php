<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Coin;
use Illuminate\Http\Request;

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
        $coin = Coin::findOrFail($request->id);

        return [
            'icon' => 'image|max:1024|nullable',
            'name' => 'required|min:1|max:10|unique:coins,name,' . $coin->id,
            'number' => 'required|numeric|min:1',
        ];
    }
}
