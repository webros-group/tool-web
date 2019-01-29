$(document).ready(function() {
	// Elements for taking the snapshot
	if ($('#canvasXeVao').length > 0) {
		var canvas = document.getElementById('canvasXeVao');
		var context = canvas.getContext('2d');
		var video = document.getElementById('videoXeVao');

		// Get access to the camera!
		if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
		    // Not adding `{ audio: true }` since we only 	 video now
		    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
		        //video.src = window.URL.createObjectURL(stream);
		        video.srcObject = stream;
		        video.play();
		    });
		}
	}

	// Elements for taking the snapshot
	if ($('#canvasXeVaoXeRa').length > 0) {
		var video = document.getElementById('videoXeRa');

		// Get access to the camera!
		if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
		    // Not adding `{ audio: true }` since we only 	 video now
		    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
		        //video.src = window.URL.createObjectURL(stream);
		        video.srcObject = stream;
		        video.play();
		    });
		}
	}
	

	


	

	// Trigger photo take
	// document.getElementById("snapXeVaoXeVao").addEventListener("click", function() {
	//     context.drawImage(video, 0, 0, 640, 480);
	//     debugger;
	//     var image = new Image();
	//     image.id = "pic"
	//     image.src = canvas.toDataURL();
	//     $('#base64Image').val(canvas.toDataURL());
	//     var formdata = new FormData();
	//     formdata.append("myNewFileName", image);
	//     setTimeout(function() {
	//     	// event.preventDefault();
 //            document.getElementById('submitXeVao').submit();
 //        }, 2000);
	    
	// });
	function inputXeVao()
	{
		var canvas = document.getElementById('canvasXeVao');
		var context = canvas.getContext('2d');
		var video = document.getElementById('videoXeVao');

		context.drawImage(video, 0, 0, 640, 480);
	    debugger;
	    var image = new Image();
	    image.id = "pic"
	    image.src = canvas.toDataURL();
	    $('#base64Image').val(canvas.toDataURL());
	    var formdata = new FormData();
	    formdata.append("myNewFileName", image);
	    setTimeout(function() {
	    	// event.preventDefault();
            document.getElementById('submitXeVao').submit();
        }, 2000);
	}
	$('#inputMaXeVao').keydown(function(e){
		var code = e.which;
		debugger;
		if(code==13){
			$(this).attr('readonly', 'readonly');
            inputXeVao();
        }
	});

	$('#inputMaXeRa').keydown(function(e){
		var code = e.which;
		console.log(code);
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		if(code==13){
			if ($('#checkFirst').val() == 0) {
            	var valMa = $('#inputMaXeRa').val();
            	$('#errorAjax').html('');
            	$.ajax({
	                method: "POST",
	                url: "/ajax-check-image",
	                data: { _token: CSRF_TOKEN,
	                        ma: valMa
	                },
	                success: function(result){
	                    if (result.status == 200) {
	                    	$('#inputMaXeRa').attr('readonly', 'readonly');
	                    	$('#checkFirst').val('1');
	                        $('#canvasXeVaoXeRa').html("<img src='" + result.data.urlImage + "' style='width: 90%'/>");
	                    } else {
	                    	$('#inputMaXeRa').val('');
	                        $('#errorAjax').html(result.message);
	                    }
	                }
	            });
				
			} else {
				if ($('#errorAjax').html() == "") {
					document.getElementById('submitXeRa').submit();
				}
			}
			return false;
        }

	});

	function inputXeRa()
	{
		var canvas = document.getElementById('canvasXeRa');
		var context = canvas.getContext('2d');
		var video = document.getElementById('videoXeRa');

		context.drawImage(video, 0, 0, 640, 480);
	    debugger;
	    var image = new Image();
	    image.id = "pic"
	    image.src = canvas.toDataURL();
	    $('#base64Image').val(canvas.toDataURL());
	    var formdata = new FormData();
	    formdata.append("myNewFileName", image);
	    setTimeout(function() {
	    	// event.preventDefault();
            document.getElementById('submitXeRa').submit();
        }, 2000);
	}
});