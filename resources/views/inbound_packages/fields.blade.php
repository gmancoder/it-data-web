<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Carrier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('carrier', 'Carrier:') !!}
    {!! Form::select('carrier', ['' => '', 'USPS' => 'USPS', 'UPS' => 'UPS', 'FedEx' => 'FedEx'], null, ['class' => 'form-control']) !!}
</div>

<!-- Tracking Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tracking_number', 'Tracking Number:') !!}
    {!! Form::text('tracking_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inboundPackages.index') !!}" class="btn btn-default">Cancel</a>
</div>
