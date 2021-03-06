
{{ Form::text('first_name', clean(trans('user::attributes.users.first_name')), $errors, $user, ['required' => true]) }}
{{ Form::text('last_name', clean(trans('user::attributes.users.last_name')), $errors, $user, ['required' => true]) }}
{{ Form::email('email', clean(trans('user::attributes.users.email')), $errors, $user, ['required' => true]) }}
{{ Form::select('roles', clean(trans('user::attributes.users.roles')), $errors, $roles, $user, [ 'multiple' => true,'required' => true, 'class' => 'select2']) }}

@include('media::admin.image_picker.single', [
    'title' => clean(trans('user::attributes.users.profile_image')),
    'inputName' => 'media[profile_image]',
    'media' => $user->profile_image,
])

@if (request()->routeIs('admin.users.create'))
    {{ Form::password('password', clean(trans('user::attributes.users.password')), $errors, null, ['required' => true]) }}
    {{ Form::password('password_confirmation', clean(trans('user::attributes.users.password_confirmation')), $errors, null, ['required' => true]) }}
@endif

@if (request()->routeIs('admin.users.edit'))
    {{ Form::checkbox('activated', clean(trans('user::attributes.users.activated')), clean(trans('user::users.form.activated')), $errors, $user, ['disabled' => $user->id === $currentUser->id, 'checked' => old('activated', $user->isActivated())]) }}
@endif
    
