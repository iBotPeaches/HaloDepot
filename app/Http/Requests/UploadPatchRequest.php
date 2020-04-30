<?php
declare(strict_types = 1);

namespace App\Http\Requests;

use App\Rules\ValidPatchRule;
use Illuminate\Foundation\Http\FormRequest;

class UploadPatchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'patch' => [
                'required',
                'file',
                new ValidPatchRule()
            ]
        ];
    }
}
