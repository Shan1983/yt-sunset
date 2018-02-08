jQuery(document).ready(function ($) {
    const updateCss = function () {
        $('#sunset_css').val(editor.getSession().getValue());
    }

    $('#sunset-save-custom-css-form').submit(updateCss);
});
const editor = ace.edit('customCss');
editor.setTheme('ace/theme/monokai');
editor.getSession().setMode('ace/mode/css');