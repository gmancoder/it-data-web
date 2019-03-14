<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Developed For Field -->
<div class="form-group col-sm-6">
    {!! Form::label('developed_for', 'Developed For:') !!}
    {!! Form::text('developed_for', null, ['class' => 'form-control']) !!}
</div>

<!-- Year Field -->
<div class="form-group col-sm-6">
    {!! Form::label('year', 'Year:') !!}
    {!! Form::number('year', null, ['class' => 'form-control']) !!}
</div>

<!-- Developed Language Field -->
<div class="form-group col-sm-6">
    {!! Form::label('developed_language', 'Developed Language:') !!}
    {!! Form::select('developed_language', ['C#' => 'C#', 'PHP' => 'PHP', 'Python' => 'Python', 'Ruby' => 'Ruby', 'Java' => 'Java', 'Node.JS' => 'Node.JS'], null, ['class' => 'form-control']) !!}
</div>

<!-- Database Platform Field -->
<div class="form-group col-sm-6">
    {!! Form::label('database_platform', 'Database Platform:') !!}
    {!! Form::select('database_platform', ['MongoDB' => 'MongoDB', 'MySQl' => 'MySQl', 'Oracle' => 'Oracle', 'PostgreSQL' => 'PostgreSQL', 'SQLServer' => 'SQLServer'], null, ['class' => 'form-control']) !!}
</div>

<!-- Summary Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('summary', 'Summary:') !!}
    {!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
</div>

<!-- Display Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_order', 'Display Order:') !!}
    {!! Form::number('display_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Private Field -->
<div class="form-group col-sm-6">
    {!! Form::label('private', 'Private:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('private', 0) !!}
        {!! Form::checkbox('private', 'Yes', null) !!} Yes
    </label>
</div>

<!-- Github Repo Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('github_repo_url', 'Github Repo Url:') !!}
    {!! Form::text('github_repo_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Thumbnail Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thumbnail_url', 'Thumbnail Url:') !!}
    {!! Form::text('thumbnail_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('developmentCaseStudies.index') !!}" class="btn btn-default">Cancel</a>
</div>
