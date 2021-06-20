import tinyMCE from 'tinymce';

tinyMCE.baseURL = `${CI.baseUrl}/modules/admin/js/wysiwyg`;

tinyMCE.init({
    selector: '.wysiwyg',
    theme: 'modern',
    mobile: { theme: 'mobile' },
    height: 300,
    branding: false,
    image_advtab: true,
    image_title: true,
    menubar: false,
    relative_urls: false,
    directionality: 'ltr',
    cache_suffix: `?v=${CI.version}`,
    plugins: 'lists, link, table, paste, autosave, autolink, wordcount, code',
    toolbar: 'styleselect bold italic underline | bullist numlist | alignleft aligncenter alignright | outdent indent | link table code',
});
