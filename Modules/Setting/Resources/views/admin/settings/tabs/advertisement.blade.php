{{ Form::checkbox('enable_ad1', trans('setting::attributes.enable'), trans('setting::attributes.enable_ad1'), $errors, $settings) }}
{{ Form::textarea('ad_block_1', trans('setting::attributes.ad_block_1'), $errors, $settings,['rows' => 5]) }}
{{ Form::checkbox('enable_ad2', trans('setting::attributes.enable'), trans('setting::attributes.enable_ad2'), $errors, $settings) }}
{{ Form::textarea('ad_block_2', trans('setting::attributes.ad_block_2'), $errors, $settings,['rows' => 5]) }}

