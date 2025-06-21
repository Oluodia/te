<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'dateFrom' => 'required|date|date_equals:today',
        ];
    }

    public function messages()
    {
        return [
            'dateFrom.required' => 'Параметр dateFrom обязателен для складов',
            'dateFrom.date' => 'dateFrom должен быть корректной датой',
            'dateFrom.date_equals' => 'Для складов доступна выгрузка только за текущий день',
        ];
    }
}
