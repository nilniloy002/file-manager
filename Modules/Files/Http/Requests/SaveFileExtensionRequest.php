<?php

namespace Modules\Files\Http\Requests;

use Modules\Base\Http\Requests\Request;

class SaveFileExtensionRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|alpha_dash|max:10|unique:file_extensions',
        ];
    }
}
