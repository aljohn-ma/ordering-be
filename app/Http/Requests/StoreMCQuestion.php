<?php

namespace App\Http\Requests;

use App\Models\QEH;
use Illuminate\Foundation\Http\FormRequest;

class StoreMCQuestion extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $QEH = QEH::where('id', $this->input('qeh_id'))->first();
        if ($QEH->published) {
            return false;
        }
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
            'question' => 'required',
            'answer' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'points' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'a.required' => 'This field is required.',
            'b.required' => 'This field is required.',
            'c.required' => 'This field is required.',

        ];
    }
}
