<!-- Keyword Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keyword', 'Keyword:') !!}
    {!! Form::text('keyword', null, ['class' => 'form-control']) !!}
</div>

<!-- Work Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('work_path', 'Work Path:') !!}
    {!! Form::text('work_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Exclusions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('exclusions', 'Exclusions:') !!}
    {!! Form::textarea('exclusions', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('downloadItems.index') !!}" class="btn btn-default">Cancel</a>
</div>
