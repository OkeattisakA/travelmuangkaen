<div class="form-group">
    {!! Form::label('setting_systemname_th','ชื่อระบบภาษาไทย : ') !!}
    {!! Form::text('setting_systemname_th',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('setting_systemname_eng','ชื่อระบบภาษาอังกฤษ : ') !!}
    {!! Form::text('setting_systemname_eng',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('setting_linetoken','Line Token : ') !!}
    {!! Form::text('setting_linetoken',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('setting_start_lat','พิกัดละติจูด : ') !!}
    {!! Form::text('setting_start_lat',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('setting_start_lng','พิกัดลองจิจูด : ') !!}
    {!! Form::text('setting_start_lng',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText,['class'=>'btn btn-primary']) !!}
</div>
