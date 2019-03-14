<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Rank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_rank', 'Display Rank:') !!}
    {!! Form::number('display_rank', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('websiteCategories.index') !!}" class="btn btn-default">Cancel</a>
</div>
