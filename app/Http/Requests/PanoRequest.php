<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PanoRequest extends FormRequest
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
            'pbaslik'=>'required|min:2|max:12',
            'paciklama'=>'nullable|min:2|max:12',
        ];
    }

    public function attributes()
    {
        return [
            'pbaslik'=>'Pano Başlığı',
            'paciklama'=>'Pano Açıklaması',
        ];
    }
}
