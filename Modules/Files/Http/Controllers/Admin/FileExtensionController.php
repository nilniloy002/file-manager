<?php

namespace Modules\Files\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasDefaultActions;
use Modules\Files\Http\Requests\SaveFileExtensionRequest;
use Modules\Files\Entities\FileExtension;

class FileExtensionController extends Controller
{
    use HasDefaultActions;

    protected $model = FileExtension::class;

    protected $label = 'files::files.files_extension';

    protected $viewPath = 'files::admin.files_extension';
    
    protected $routePrefix = 'admin.files-extension';

    protected $validation = SaveFileExtensionRequest::class;
}
