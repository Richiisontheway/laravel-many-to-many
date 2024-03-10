<?php

namespace App\Http\Requests\FormRequest\Project;

use Illuminate\Foundation\Http\FormRequest;
//helpers
use Illuminate\Support\Facades\Auth;
class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|Max:255',
            'description' => 'required|Max:4064', 
            'image' => 'nullable|Max:1024|url', 
            'date' => 'nullable|Max:64|', 
            // 'slug' => 'required', 
            'type_id' => 'required|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id' 
        ];
    }
}
