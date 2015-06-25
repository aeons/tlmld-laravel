function dateTimePickers() {
    let options = {
        locale: 'da',
        sideBySide: true,
        showClear: true,
        showClose: true,
        allowInputToggle: true,
        stepping: 5,
        format: 'YYYY-MM-DD HH:mm',
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-chevron-up',
            down: 'fa fa-chevron-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-arrows',
            clear: 'fa fa-trash',
            close: 'fa fa-times'
        }
    };

    let dateOptions = jQuery.extend({}, options, {
        format: 'YYYY-MM-DD'
    });

    let starts = $('#starts-at').parent().datetimepicker(options);
    let ends = $('#ends-at').parent().datetimepicker(options);
    let active = $('#active-on').parent().datetimepicker(dateOptions);
    let inactive = $('#inactive-on').parent().datetimepicker(dateOptions);
}

function textEditor() {
    let textArea = 'textarea[name="description"]';
    tinymce.init({
        selector: textArea,
        height: 300,
        content_css: '/css/admin/typography.css',
        setup: (editor) => {
            editor.on('init', () => {
                $('div#spinner').fadeOut(300, () => {
                    $('div#loader').slideDown(300);
                });
            });
        }
    });
    $('input[type="submit"]').click(() => {
        $(textArea).html(tinymce.get(textArea).getContent());
    });
}

function form() {
    textEditor();
    dateTimePickers();
}

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