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

<div id="loader" class="collapse">
    {!! BootstrapForm::horizontal([
        'model' => $event,
        'store' => 'admin.event.store',
        'update' => 'admin.event.update',
    ]) !!}
    {!! BootstrapForm::text('title', 'Navn') !!}
    {!! BootstrapForm::textarea('description', 'Beskrivelse') !!}
    {!! BootstrapForm::textWithAppend('starts_at', 'calendar', 'Starttidspunkt', null, ['id' => 'starts-at']) !!}
    {!! BootstrapForm::textWithAppend('ends_at', 'calendar', 'Sluttidspunkt (valgfri)', null, ['id' => 'ends-at']) !!}
    {!! BootstrapForm::textWithAppend('active_on', 'calendar', 'Tilmeldingsstart', null, ['id' => 'active-on']) !!}
    {!! BootstrapForm::textWithAppend('inactive_on', 'calendar', 'Tilmeldingsfrist (valgfri)', null, ['id' => 'inactive-on']) !!}
    {!! BootstrapForm::checkbox('payment_needed', 'Kræver betaling') !!}
    {!! BootstrapForm::submitWithCancel('Gem') !!}
    {!! BootstrapForm::close() !!}
</div>
<div id="spinner" class="text-center">
    <i class="fa fa-circle-o-notch fa-spin fa-5x"></i>
</div>