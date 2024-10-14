<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:200',
            'description' => 'nullable|string',
            'project_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => ['nullable', Rule::exists('categories', 'id')],
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Il nome del progetto è obbligatorio",
            "name.max" => "Il nome del progetto non può superare i 200 caratteri",
            "project_image" => "image troppo grande",
            "category_id.exists" => "La categoria selezionata non esiste"
        ];
    }
}
