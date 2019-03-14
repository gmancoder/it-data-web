<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Datastore Location Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datastore_location', 'Datastore Location:') !!}
    {!! Form::select('datastore_location', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7'], null, ['class' => 'form-control']) !!}
</div>

<!-- Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('path', 'Path:') !!}
    {!! Form::text('path', null, ['class' => 'form-control']) !!}
</div>

<!-- Exclusions Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('exclusions', 'Exclusions:') !!}
    {!! Form::textarea('exclusions', null, ['class' => 'form-control']) !!}
</div>

<!-- Full Backup Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('full_backup_date', 'Full Backup Date:') !!}
    {!! Form::select('full_backup_date', ['0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fileBackupLocations.index') !!}" class="btn btn-default">Cancel</a>
</div>
