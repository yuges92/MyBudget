<?php

namespace App\Http\Requests;

use App\Models\Icon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DebtUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $files = Icon::getIconsAsFileList();

        return [
            'name' => ['required', Rule::unique('debts')->ignore(request('id'))],
            'amount' => ['required','numeric'],
            'icon' => ['required', Rule::in($files)]

        ];
    }
}
