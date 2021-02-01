<?php

namespace App\Http\Requests;

use App\Models\Icon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
//            'name' => ['required', 'unique:categories,name,NULL,id,type,' . request('type')],
            'name' => ['required', Rule::unique('categories')->where('type', request('type'))],
            'type' => ['required',Rule::in('income', 'expense', 'debt')],
            'icon' => ['required', Rule::in($files)]
        ];
    }
}
