<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Season Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('season_number', 'Season Number:') !!}
    {!! Form::text('season_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Episode Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('episode_number', 'Episode Number:') !!}
    {!! Form::text('episode_number', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('televisionShowEpisodes.index') !!}" class="btn btn-default">Cancel</a>
</div>
