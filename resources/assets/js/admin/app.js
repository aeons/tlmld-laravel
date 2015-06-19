const form = function () {
    let options = {
        locale: 'da',
        sideBySide: true,
        showClear: true,
        showClose: true,
        allowInputToggle: true,
        stepping: 5
    };

    let textArea = 'textarea[name="description"]';
    tinymce.init({
        selector: textArea
    });

    let starts = $('#starts-at').parent().datetimepicker(options);
    let ends = $('#ends-at').parent().datetimepicker(options);
    let active = $('#active-at').parent().datetimepicker(options);
    let inactive = $('#inactive-at').parent().datetimepicker(options);

    $('input[type="submit"]').click(() => {
        $(textArea).html(tinymce.get(textArea).getContent());
    });
};

const admin = {
    event: {
        create: form,
        edit: form
    }
};

$(document).ready(() => new Util(admin).ready());