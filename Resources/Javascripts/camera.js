function turn_on_camera()
{
	document.getElementById('varButton').innerHTML = '<button type="button" class="btn btn-outline-warning cam_button" onclick="take_snapshot()"><i class="fa fa-camera" aria-hidden="true"></i>&nbspTake Picture</button>';
	Webcam.set(
	{
 		 width:350,
 		 height:350,
 		 image_format: 'jpeg',
 		 jpeg_quality:90
	})
	Webcam.attach("#camera")
}
function take_snapshot()
{
	document.getElementById('varButton').innerHTML = '<button type="button" class="btn btn-outline-warning cam_button" onclick="reset_camera()"><i class="fa fa-repeat" aria-hidden="true"></i>&nbspRe-Take Picture</button>';
	Webcam.snap(function(data_uri)
	{
		$(".image-tag").val(data_uri);
		document.getElementById('camera').innerHTML='<img src="'+data_uri+'">';
	}) 
	

}
function reset_camera()
{
	document.getElementById('varButton').innerHTML = '<button type="button" class="btn btn-outline-warning cam_button" onclick="take_snapshot()"><i class="fa fa-camera" aria-hidden="true"></i>&nbspTake Picture</button>';
	Webcam.attach("#camera")
}