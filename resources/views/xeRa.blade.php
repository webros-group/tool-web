
 @extends('layouts.app')

@section('content')

<form id="submitXeRa" method="post"  enctype="multipart/form-data" action="{{ route('xeRa') }}">
    @csrf
    <div class="row text-center">
        <h2 style="width: 100%;">
            Xe Ra
        </h2>
        <div class="col-md-6">
            <video id="videoXeRa" width="640" height="480" autoplay></video>
        </div>
        <div class="col-md-6">
            <div id="canvasXeVaoXeRa" width="640" height="480"></div>
        </div>
        <input type="hidden" id="checkFirst" value="0" />
         <div class="offset-md-3 col-md-6">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="ma" class="form-control {{ $errors->has('ma') ? ' is-invalid' : '' }}" id="inputMaXeRa" autofocus/>
                        @if ($errors->has('ma'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ma') }}</strong>
                            </span>
                        @endif
                        <div class="is-invalid">
                            <strong id="errorAjax" class="text-danger"></strong>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="base64Image" name="imageBase64"  value="{{ old('imageBase64') }}"/>
            </div>
            <div class="row">
                <a class="btn btn-danger" href="{{ route('xeRa') }}">Huỷ</a>
            </div>
        </div>
    </div>
</form>

@endsection


