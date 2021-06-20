<?php

namespace Modules\Media\Http\Requests;

use Modules\Base\Http\Requests\Request;

class UploadMediaRequest extends Request
{
    public function rules()
    {
        return ['file' => 'file'];
    }
}
