{{ Form::text('translatable[site_name]', clean(trans('setting::attributes.translatable.site_name')), $errors, $settings, ['required' => true]) }}

@include('media::admin.image_picker.single', [
    'title' => clean(trans('setting::attributes.site_logo')),
    'inputName' => 'site_logo',
    'media' => $siteLogo,
    'help' => clean(trans('setting::settings.form.recommend_image_size')),
])

{{ Form::text('site_email', clean(trans('setting::attributes.site_email')), $errors, $settings, ['required' => true]) }}

