<!-- Tool Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tool_name', 'Tool Name:') !!}
    {!! Form::text('tool_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Tool Alias Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tool_alias', 'Tool Alias:') !!}
    {!! Form::text('tool_alias', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Run Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_run_date', 'Last Run Date:') !!}
    {!! Form::text('last_run_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('lastRuns.index') !!}" class="btn btn-default">Cancel</a>
</div>
