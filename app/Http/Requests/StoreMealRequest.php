<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Meal;
use App\Models\MealTranslation;
use App\Models\Language;

class StoreMealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     
    public function rules(): array
    {
        $lang = '';
        foreach(Language::all() as $language){
            $lang .= $language->lang . ',';
        }

        
        return [
            'per_page' => 'sometimes|required|integer|min:1',
            'tags' => 'sometimes|required|regex:/^\d+(,\d+)*$/',
            'lang' => "required|in:$lang",
            'with' => 'sometimes|required|string',
            'diff_time' => 'sometimes|required|integer|min:1',
            'category' => 'sometimes|nullable'
        ];
    }
}
