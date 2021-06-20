<?php

namespace Modules\Files\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Base\Http\Requests\Request;

class UpdateFilesRequest extends Request
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        $rules= [
            'filename' => 'required|max:50',
        ];
        
        return $rules;
    }

    
}
