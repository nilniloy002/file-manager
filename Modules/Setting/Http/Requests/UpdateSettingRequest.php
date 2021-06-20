<?php

namespace Modules\Setting\Http\Requests;

use Modules\Base\Helpers\Locale;
use Modules\Base\Helpers\TimeZone;
use Illuminate\Validation\Rule;
use Modules\Base\Http\Requests\Request;

class UpdateSettingRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'setting::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'translatable.site_name' => 'required',
            'site_email' => 'required|email',

            'default_file_size' => 'required|numeric|min:1|not_in:0',

            'email_from_address' => 'nullable|email',
            'email_encryption' => ['nullable', Rule::in($this->emailEncryptionProtocols())],

        ];
    }

    /**
     * Returns email encryption protocols.
     *
     * @return array
     */
    private function emailEncryptionProtocols()
    {
        return array_keys(trans('setting::settings.form.email_encryption_protocols'));
    }
}
