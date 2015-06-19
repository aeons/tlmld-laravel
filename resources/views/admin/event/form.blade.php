@section('styles')
    @parent
    {!! Html::style('//cdn.quilljs.com/0.19.14/quill.snow.css') !!}
    {!! Html::style('//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/css/bootstrap-datetimepicker.min.css') !!}
@endsection

@section('scripts')
    @parent
    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/tinymce/4.1.10/tinymce.min.js') !!}
    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js') !!}
    {!! Html::script('//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('js/admin/da.js') !!}
@endsection

{!! BootstrapForm::horizontal([
    'model' => $event,
    'store' => 'admin::events::store',
    'update' => 'admin::events::update'
]) !!}
{!! BootstrapForm::text('title', 'Navn') !!}
{!! BootstrapForm::textarea('description', 'Beskrivelse') !!}
{!! BootstrapForm::textWithAppend('starts_at', 'calendar', 'Starttidspunkt', null, ['id' => 'starts-at']) !!}
{!! BootstrapForm::textWithAppend('ends_at', 'calendar', 'Sluttidspunkt (valgfri)', null, ['id' => 'ends-at']) !!}
{!! BootstrapForm::textWithAppend('active_at', 'calendar', 'Tilmeldingsstart', null, ['id' => 'active-at']) !!}
{!! BootstrapForm::textWithAppend('inactive_at', 'calendar', 'Tilmeldingsfrist (valgfri)', null, ['id' => 'inactive-at']) !!}
{!! BootstrapForm::checkbox('payment_needed', 'Kræver betaling') !!}
{!! BootstrapForm::submit('Gem') !!}
{!! BootstrapForm::close() !!}