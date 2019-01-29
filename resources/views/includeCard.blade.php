
 @extends('layouts.app')

@section('content')
<form id="submitI" method="post"  enctype="multipart/form-data" action="{{ route('includeCard') }}">
    @csrf
    <div class="row text-center">
        <h2 style="width: 100%;">
            Nhập thẻ
        </h2>
        <div class="offset-md-3 col-md-6">
            <div class="row text-center">
                <div class="offset-md-3 col-md-6">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="ma" class="form-control {{ $errors->has('ma') ? ' is-invalid' : '' }}"  value="{{ old('ma') }}" autofocus/>
                                @if ($errors->has('ma'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ma') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="bienso" class="form-control {{ $errors->has('bienso') ? ' is-invalid' : '' }}"  value="{{ old('bienso') }}"/>
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
                </div>
            </div>
        </div>
    </div>
</form>

@endsection


