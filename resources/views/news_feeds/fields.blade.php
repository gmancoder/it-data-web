<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Last Downloaded Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_downloaded', 'Last Downloaded:') !!}
    {!! Form::text('last_downloaded', null, ['class' => 'form-control']) !!}
</div>

<!-- Articles Read Field -->
<div class="form-group col-sm-6">
    {!! Form::label('articles_read', 'Articles Read:') !!}
    {!! Form::number('articles_read', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('newsFeeds.index') !!}" class="btn btn-default">Cancel</a>
</div>
