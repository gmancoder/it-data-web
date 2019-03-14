<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer', 'Customer:') !!}
    {!! Form::text('customer', null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ip_address', 'Ip Address:') !!}
    {!! Form::text('ip_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpanel Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpanel_url', 'Cpanel Url:') !!}
    {!! Form::text('cpanel_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpanel Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpanel_username', 'Cpanel Username:') !!}
    {!! Form::text('cpanel_username', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpanel Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpanel_password', 'Cpanel Password:') !!}
    {!! Form::password('cpanel_password', ['class' => 'form-control']) !!}
</div>

<!-- Rdp Port Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rdp_port', 'Rdp Port:') !!}
    {!! Form::text('rdp_port', null, ['class' => 'form-control']) !!}
</div>

<!-- Rdp User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rdp_user', 'Rdp User:') !!}
    {!! Form::text('rdp_user', null, ['class' => 'form-control']) !!}
</div>

<!-- Rdp Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rdp_password', 'Rdp Password:') !!}
    {!! Form::password('rdp_password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('servers.index') !!}" class="btn btn-default">Cancel</a>
</div>
