<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<!-- Notetext Field -->
<div class="form-group col-sm-6">
    {!! Form::label('notetext', 'Notetext:') !!}
    {!! Form::text('notetext', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('inboundPackageLogs.index') !!}" class="btn btn-default">Cancel</a>
</div>
