<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreJobRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'schedule' => 'required|string|max:255|in:Full-time,Part-time,Contract,Internship',
            'url' => 'required|url|max:255',
            'tags' => 'nullable|string|max:255',
        ];
    }
}
