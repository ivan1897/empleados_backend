<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_departamento') }}
            {{ Form::text('nombre_departamento', $direccione->nombre_departamento, ['class' => 'form-control' . ($errors->has('nombre_departamento') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Departamento']) }}
            {!! $errors->first('nombre_departamento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_municipio') }}
            {{ Form::text('nombre_municipio', $direccione->nombre_municipio, ['class' => 'form-control' . ($errors->has('nombre_municipio') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Municipio']) }}
            {!! $errors->first('nombre_municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ubicacion') }}
            {{ Form::text('ubicacion', $direccione->ubicacion, ['class' => 'form-control' . ($errors->has('ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
            {!! $errors->first('ubicacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>