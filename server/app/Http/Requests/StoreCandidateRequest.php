<?php

namespace App\Http\Requests;

use App\Domain\Gender;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $gender
 * @property string $birth_place
 * @property string $citizenship
 * @property int $relocation_ready
 * @property int $salary
 * @property string $email
 * @property string $phone
 * @property int $rating
 * @property int $primary_connections
 * @property int $builder_kr_substations
 * @property int $builder_kr_lines
 * @property int $mounting_parts
 * @property int $rza
 * @property int $asuptp
 * @property int $askue
 * @property int $tm
 * @property int $ss
 * @property int $ktsb
 * @property string $experience_110kv
 * @property int $ready_to_work
 */
class StoreCandidateRequest extends FormRequest
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
            'first_name' => 'required|string|max:250',
            'middle_name' => 'nullable|string|max:250',
            'last_name' => 'required|string|max:250',
            'gender' => 'required|in:' . implode(',', Gender::getValue()), // Убедитесь, что метод getValues() существует и возвращает массив значений перечисления
            'birth_place' => 'required|string|max:250',
            'citizenship' => 'required|string|max:250',
            'relocation_ready' => 'nullable|boolean',

            'salary' => 'required|numeric|min:0',
            'email' => 'required|email|max:250',
            'phone' => 'required|string|max:250',
            'rating' => 'required|integer|between:0,10',

            'primary_connections' => 'nullable|boolean',
            'builder_kr_substations' => 'nullable|boolean',
            'builder_kr_lines' => 'nullable|boolean',
            'mounting_parts' => 'nullable|boolean',
            'rza' => 'nullable|boolean',
            'asuptp' => 'nullable|boolean',
            'askue' => 'nullable|boolean',
            'tm' => 'nullable|boolean',
            'ss' => 'nullable|boolean',
            'ktsb' => 'nullable|boolean',

            'experience_110kv' => 'nullable|string|max:250',
            'ready_to_work' => 'required|boolean',

            'desired_positions' => 'nullable|array',
            'desired_positions.*' => 'integer|exists:desired_positions,id',

            'specializations' => 'nullable|array',
            'specializations.*' => 'integer|exists:specializations,id',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        $messages['first_name.required'] = 'First name is required.';
        $messages['last_name.required'] = 'Last name is required.';
        $messages['birth_place.required'] = 'Birth place is required.';
        $messages['citizenship.required'] = 'Citizenship is required.';
        $messages['salary.required'] = 'Salary is required.';
        $messages['email.required'] = 'Email is required.';
        $messages['phone.required'] = 'Phone is required.';
        $messages['rating.required'] = 'Rating is required.';

        return $messages;
    }


}
