<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class IndexTeamRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
 "search" => ["string","nullable","max:255"],
 "per_page" => ["integer","nullable"],
 "page" => ["integer","nullable","min:1"],
 "sort" => ["string","nullable","min:2","max:255"],
 "dir" => ["string","nullable","min:3","max:4"],
 "id" => ["integer","nullable","min:1"],
 "name" => ["string","nullable","max:255"],
 "guard_name" => ["string","nullable","max:255"]
];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
