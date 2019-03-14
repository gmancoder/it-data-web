<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $websiteCategory->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $websiteCategory->name !!}</p>
</div>

<!-- Display Rank Field -->
<div class="form-group">
    {!! Form::label('display_rank', 'Display Rank:') !!}
    <p>{!! $websiteCategory->display_rank !!}</p>
</div>

<!-- Dyn Id Field -->
<div class="form-group">
    {!! Form::label('dyn_id', 'Dyn Id:') !!}
    <p>{!! $websiteCategory->dyn_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $websiteCategory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $websiteCategory->updated_at !!}</p>
</div>

