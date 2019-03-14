<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $lastRun->id !!}</p>
</div>

<!-- Tool Name Field -->
<div class="form-group">
    {!! Form::label('tool_name', 'Tool Name:') !!}
    <p>{!! $lastRun->tool_name !!}</p>
</div>

<!-- Tool Alias Field -->
<div class="form-group">
    {!! Form::label('tool_alias', 'Tool Alias:') !!}
    <p>{!! $lastRun->tool_alias !!}</p>
</div>

<!-- Last Run Date Field -->
<div class="form-group">
    {!! Form::label('last_run_date', 'Last Run Date:') !!}
    <p>{!! $lastRun->last_run_date !!}</p>
</div>

<!-- Dyn Id Field -->
<div class="form-group">
    {!! Form::label('dyn_id', 'Dyn Id:') !!}
    <p>{!! $lastRun->dyn_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $lastRun->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $lastRun->updated_at !!}</p>
</div>

