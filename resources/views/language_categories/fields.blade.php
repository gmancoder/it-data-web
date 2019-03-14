<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Folder Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('folder_name', 'Folder Name:') !!}
    {!! Form::text('folder_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('languageCategories.index') !!}" class="btn btn-default">Cancel</a>
</div>
