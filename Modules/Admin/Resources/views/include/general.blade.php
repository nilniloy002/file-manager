@stack('styles')
@if(setting('custom_css')!='')
    <style>
        {!! setting('custom_css') !!}
    </style>
@endif
<script>
(function () {
    "use strict";
    window.CI = {
        version: '1.0.0',
        csrfToken: '{{ csrf_token() }}',
        baseUrl: '{{ url('/') }}',
        langs: {},
    };

    CI.langs['admin::admin.buttons.delete'] = '{{ clean(trans('admin::admin.buttons.delete')) }}';
    CI.langs['admin::admin.delete.confirmation'] = '{{ clean(trans('admin::admin.delete.confirmation')) }}';
    CI.langs['admin::admin.delete.confirmation_message'] = '{{ clean(trans('admin::admin.delete.confirmation_message')) }}';
    CI.langs['admin::admin.delete.btn_delete'] = '{{ clean(trans('admin::admin.delete.btn_delete')) }}';
    CI.langs['admin::admin.delete.btn_cancel'] = '{{ clean(trans('admin::admin.delete.btn_cancel')) }}';
    CI.langs['admin::admin.delete.success_message'] = '{{ clean(trans('admin::admin.delete.success_message')) }}';

     CI.langs['media::medias.success_message'] = '{{ clean(trans('media::medias.success_message')) }}';
    CI.langs['media::medias.media_manager'] = '{{ clean(trans('media::medias.media_manager')) }}';
    CI.langs['media::messages.image_has_been_added'] = '{{ clean(trans('media::messages.image_has_been_added')) }}';
})();
</script>



@stack('general')

@routes
