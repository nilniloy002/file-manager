@php
$filename = $files->filename;
$without_extension = pathinfo($filename, PATHINFO_FILENAME);
$files->filename=$without_extension;
@endphp 
{{ Form::text('filename', clean(trans('files::files.form.name')), $errors, $files, ['required' => true]) }}
{{ Form::textarea('description', trans('files::files.form.description'), $errors, $files, ['rows' => 10]) }}



