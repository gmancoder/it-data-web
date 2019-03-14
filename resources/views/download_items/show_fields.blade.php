<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $downloadItem->id !!}</p>
</div>

<!-- Keyword Field -->
<div class="form-group">
    {!! Form::label('keyword', 'Keyword:') !!}
    <p>{!! $downloadItem->keyword !!}</p>
</div>

<!-- Work Path Field -->
<div class="form-group">
    {!! Form::label('work_path', 'Work Path:') !!}
    <p>{!! $downloadItem->work_path !!}</p>
</div>

<!-- Exclusions Field -->
<div class="form-group">
    {!! Form::label('exclusions', 'Exclusions:') !!}
    <p>{!! $downloadItem->exclusions !!}</p>
</div>

<!-- Dyn Id Field -->
<div class="form-group">
    {!! Form::label('dyn_id', 'Dyn Id:') !!}
    <p>{!! $downloadItem->dyn_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $downloadItem->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $downloadItem->updated_at !!}</p>
</div>

