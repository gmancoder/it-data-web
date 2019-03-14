<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $newsFeed->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $newsFeed->name !!}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{!! $newsFeed->url !!}</p>
</div>

<!-- Last Downloaded Field -->
<div class="form-group">
    {!! Form::label('last_downloaded', 'Last Downloaded:') !!}
    <p>{!! $newsFeed->last_downloaded !!}</p>
</div>

<!-- Articles Read Field -->
<div class="form-group">
    {!! Form::label('articles_read', 'Articles Read:') !!}
    <p>{!! $newsFeed->articles_read !!}</p>
</div>

<!-- Dyn Id Field -->
<div class="form-group">
    {!! Form::label('dyn_id', 'Dyn Id:') !!}
    <p>{!! $newsFeed->dyn_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $newsFeed->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $newsFeed->updated_at !!}</p>
</div>

