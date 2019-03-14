<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $fileBackupLocation->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $fileBackupLocation->name !!}</p>
</div>

<!-- Datastore Location Field -->
<div class="form-group">
    {!! Form::label('datastore_location', 'Datastore Location:') !!}
    <p>{!! $fileBackupLocation->datastore_location !!}</p>
</div>

<!-- Path Field -->
<div class="form-group">
    {!! Form::label('path', 'Path:') !!}
    <p>{!! $fileBackupLocation->path !!}</p>
</div>

<!-- Exclusions Field -->
<div class="form-group">
    {!! Form::label('exclusions', 'Exclusions:') !!}
    <p>{!! $fileBackupLocation->exclusions !!}</p>
</div>

<!-- Full Backup Date Field -->
<div class="form-group">
    {!! Form::label('full_backup_date', 'Full Backup Date:') !!}
    <p>{!! $fileBackupLocation->full_backup_date !!}</p>
</div>

<!-- Dyn Id Field -->
<div class="form-group">
    {!! Form::label('dyn_id', 'Dyn Id:') !!}
    <p>{!! $fileBackupLocation->dyn_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $fileBackupLocation->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $fileBackupLocation->updated_at !!}</p>
</div>

