const form = () => {
    let options = {
        locale: 'da',
        sideBySide: true,
        showClear: true,
        showClose: true,
        allowInputToggle: true,
        stepping: 5,
        format: 'YYYY-MM-DD HH:mm'
    };

    let dateOptions = jQuery.extend({}, options, {
        format: 'YYYY-MM-DD'
    });

    let textArea = 'textarea[name="description"]';
    tinymce.init({
        selector: textArea,
        content_css: '/css/admin/typography.css'
    });

    let starts = $('#starts-at').parent().datetimepicker(options);
    let ends = $('#ends-at').parent().datetimepicker(options);
    let active = $('#active-on').parent().datetimepicker(dateOptions);
    let inactive = $('#inactive-on').parent().datetimepicker(dateOptions);

    $('input[type="submit"]').click(() => {
        $(textArea).html(tinymce.get(textArea).getContent());
    });
};

const admin = {
    event: {
        create: form,
        edit: form,
        show: () => {
            $('button#destroy').click(() => {
                return confirm('Begivenheden vil blive slettet.');
            });
        }
    }
};

$(document).ready(() => new Router(admin).ready());