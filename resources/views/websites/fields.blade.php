<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Owning Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owning_account', 'Owning Account:') !!}
    {!! Form::text('owning_account', null, ['class' => 'form-control']) !!}
</div>

<!-- Display In Portal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('display_in_portal', 'Display In Portal:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('display_in_portal', 0) !!}
        {!! Form::checkbox('display_in_portal', 'Yes', null) !!} Yes
    </label>
</div>

<!-- Internal Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('internal_url', 'Internal Url:') !!}
    {!! Form::text('internal_url', null, ['class' => 'form-control']) !!}
</div>

<!-- External Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('external_url', 'External Url:') !!}
    {!! Form::text('external_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Admin Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_url', 'Admin Url:') !!}
    {!! Form::text('admin_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Admin Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_username', 'Admin Username:') !!}
    {!! Form::text('admin_username', null, ['class' => 'form-control']) !!}
</div>

<!-- Admin Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin_password', 'Admin Password:') !!}
    {!! Form::text('admin_password', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('websites.index') !!}" class="btn btn-default">Cancel</a>
</div>
