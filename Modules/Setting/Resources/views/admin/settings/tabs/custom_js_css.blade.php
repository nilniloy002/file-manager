{{ Form::textarea('googleanalyticscode', trans('setting::attributes.googleanalyticscode'), $errors, $settings) }}
{{ Form::textarea('custom_js', trans('setting::attributes.custom_js'), $errors, $settings,['help'=>trans('setting::attributes.custom_js_help')]) }}
{{ Form::textarea('custom_css', trans('setting::attributes.custom_css'), $errors, $settings,['help'=>trans('setting::attributes.custom_css_help')]) }}
    
