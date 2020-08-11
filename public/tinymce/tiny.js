tinymce.init({
    selector: 'textarea#tiny_post, textarea#tiny_post_content',
    language: 'fr_FR',
    menubar: 'file edit view',
    toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | spellchecker | blockquote | wordcount | help',
    toolbar_sticky: true,
    plugins: 'advlist core autolink link charmap print preview hr anchor pagebreak help spellchecker wordcount',
    toolbar_mode: 'floating wrap',
    mobile: {
        menubar: true
    }
});