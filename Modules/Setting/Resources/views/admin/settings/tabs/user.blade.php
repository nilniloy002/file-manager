{{ Form::select('user_role', clean(trans('setting::attributes.new_user_role')), $errors, $roles, $settings, ['required' => true]) }}
{{ Form::checkbox('allow_registrations', clean(trans('setting::attributes.enable_registrations')), clean(trans('setting::settings.form.allow_new_user_registrations')), $errors, $settings) }}
{{ Form::checkbox('auto_approve_user', clean(trans('setting::attributes.auto_approve_new_members')), clean(trans('setting::settings.form.automatically_approve_new_members_after_registration')), $errors, $settings) }}
{{ Form::checkbox('welcome_email', clean(trans('setting::attributes.welcome_email')), clean(trans('setting::settings.form.send_welcome_email_after_registration')), $errors, $settings) }}
{{ Form::checkbox('auto_assign_folder_files', clean(trans('setting::attributes.auto_assign_folder_files')), clean(trans('setting::settings.form.user_can_view_all_files_inside_assign_folder')), $errors, $settings) }}
{{ Form::checkbox('delete_assign_folder_files', clean(trans('setting::attributes.delete_assign_folder_files')), clean(trans('setting::settings.form.user_can_delete_files_of_another_user_inside_assign_folder')), $errors, $settings) }}
<?php /* {{ Form::checkbox('require_login_download', trans('setting::attributes.require_login_download'), trans('setting::settings.form.for_download_files_user_need_to_login'), $errors, $settings) }} */?>
    