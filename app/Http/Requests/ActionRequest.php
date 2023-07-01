<?php

namespace App\Http\Requests;

use App\Enums\ActionEnum;
use Illuminate\Foundation\Http\FormRequest;

class ActionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'action' => 'required',
            'action.*.name' => 'required|in:'. implode(',', ActionEnum::values()),
            'action.*.path' => 'required',
            'action.*.value' => 'required',
        ];
    }
}
