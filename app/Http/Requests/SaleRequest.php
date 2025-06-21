<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date|after_or_equal:dateFrom'
        ];
    }

    public function messages() {
        return [
            'dateFrom.required' => 'Параметр dateFrom обязателен для продаж',
            'dateTo.required' => 'Параметр dateTo обязателен для продаж',
            'dateFrom.date' => 'dateFrom должен быть корректной датой',
            'dateTo.date' => 'dateTo должен быть корректной датой',
            'dateTo.after_or_equal' => 'dateTo должен быть равен или позже dateFrom'
        ];
    }
}
