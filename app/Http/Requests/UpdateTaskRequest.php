<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'taskname' => [
                'required',
                'string',
                'max:255'
            ],
            'select_date' => [
                'date',
                'after_or_equal:today'
            ],
            'note' => 'max:500'
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        session()->flash('modal_id', 'taskModal' . $this->input('task_id'));
        parent::failedValidation($validator);
    }
}
