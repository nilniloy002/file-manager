<div class="row">
    <div class="col-md-8">
        {{ Form::textarea('about', clean(trans('user::attributes.users.about')), $errors, $currentUser) }}
        {{ Form::text('facebook', clean(trans('user::attributes.users.facebook')), $errors, $currentUser) }}
        {{ Form::text('twitter', clean(trans('user::attributes.users.twitter')), $errors, $currentUser) }}
        {{ Form::text('google', clean(trans('user::attributes.users.google')), $errors, $currentUser) }}
        {{ Form::text('instagram', clean(trans('user::attributes.users.instagram')), $errors, $currentUser) }}
        {{ Form::text('linkedin', clean(trans('user::attributes.users.linkedin')), $errors, $currentUser) }}
        {{ Form::text('youtube', clean(trans('user::attributes.users.youtube')), $errors, $currentUser) }}
        

        
    </div>
</div>
