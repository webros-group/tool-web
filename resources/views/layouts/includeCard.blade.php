
 @extends('layouts.app')

@section('content')
<form id="submitXeVao" method="post"  enctype="multipart/form-data" action="{{ route('includeCard') }}">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" name="ma" class="form-control {{ $errors->has('ma') ? ' is-invalid' : '' }}"/>
                @if ($errors->has('ma'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('ma') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" name="bienso" class="form-control {{ $errors->has('bienso') ? ' is-invalid' : '' }}"/>
                @if ($errors->has('bienso'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('bienso') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="col-md-12">
            <input type="submit"/>
        </div>
    </div>
</form>

@endsection


