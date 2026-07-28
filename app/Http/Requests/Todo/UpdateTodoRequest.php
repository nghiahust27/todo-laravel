<?php

namespace App\Http\Requests\Todo;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
        'title' => 'sometimes|string|max:255',
        'description' => 'sometimes|nullable|string',
        'status' => 'sometimes|in:todo,doing,done',
        'due_date' => 'sometimes|nullable|date',
    ];
   
    }
}
