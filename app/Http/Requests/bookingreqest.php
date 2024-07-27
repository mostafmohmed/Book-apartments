<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Illuminate\Foundation\Http\FormRequest;

class bookingreqest extends FormRequest
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
            'email' => ['required', 'email', 'max:255', 'unique:' . Booking::class],
            'phone'=>['required', 'regex:/(01)[0-9]{9}/'],
            'national-id'=>['required', 'digits:10'],
            'user_id'=>['required','exists:users,id'],
            'apartment_id'=>['required','exists:apartments,id'],
        ];
    }
}
