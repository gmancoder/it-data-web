<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Banner Filename Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banner_filename', 'Banner Filename:') !!}
    {!! Form::text('banner_filename', null, ['class' => 'form-control']) !!}
</div>

<!-- Backup Field -->
<div class="form-group col-sm-6">
    {!! Form::label('backup', 'Backup:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('backup', 0) !!}
        {!! Form::checkbox('backup', 'Yes', null) !!} Yes
    </label>
</div>

<!-- Backup Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('backup_location', 'Backup Location:') !!}
    {!! Form::text('backup_location', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('televisionShows.index') !!}" class="btn btn-default">Cancel</a>
</div>
