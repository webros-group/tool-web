
 @extends('layouts.app')

@section('content')
<!-- <video width="320" height="240" autoplay controls>
    <source src="%StreamURL%" type="video/mp4">
    <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" /> 
        <param name="flashvars" value='config={"clip": {"url": "%StreamURL%", "autoPlay":true, "autoBuffering":true}}' /> 
        <p><a href="%StreamURL%">view with external app</a></p> 
    </object>
</video> -->

<!-- <iframe src="http://ipcamlive.com/player/player.php?alias=szekesfehervar" width="800px" height="600px"/> -->

<form id="submitXeVao" method="post"  enctype="multipart/form-data" action="{{ route('xeVao') }}">
    @csrf
    <div class="row text-center">
        <h2 style="width: 100%;">
            Xe Vào
        </h2>
        <div class="col-md-6">
            <video id="videoXeVao" width="640" height="480" autoplay></video>
        </div>
        <div class="col-md-6">
            <canvas id="canvasXeVao" width="640" height="480"></canvas>
        </div>
         <div class="offset-md-3 col-md-6">
            <div class="row text-center">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" name="ma" class="form-control {{ $errors->has('ma') ? ' is-invalid' : '' }}" id="inputMaXeVao" autofocus/>
                        @if ($errors->has('ma'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ma') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <input type="hidden" id="base64Image" name="imageBase64" value="{{ old('imageBase64') }}" />
                
            </div>
        </div>
    </div>
</form>

@endsection


