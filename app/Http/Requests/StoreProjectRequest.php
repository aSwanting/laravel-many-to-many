<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Models\Project;

class StoreProjectRequest extends FormRequest
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
        return [
            'title' => 'required|max:255|min:3',
            'slug' => 'unique:projects',
            'description' => 'max:300',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id'
        ];
    }

    protected function prepareForValidation()
    {
        $slug =  Str::slug($this->title);
        $i = 1;

        while (Project::where('slug', $slug)->exists()) {
            $slug = Str::slug($this->title) . '-' . $i++;
        }

        $this->merge(['slug' => $slug]);
    }
}
