var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var canvas2 = document.getElementById('canvas2');
var context2 = canvas2.getContext('2d');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
{
   navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
   {
       video.srcObject = stream;
   });
}

var image = new Image();
image.src = '../stickers/wall.png';
setInterval(() => {
	context.drawImage(video, 0, 0, 640, 480);
    context.drawImage(image,0,0,640,480);
}, 16);

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context2.drawImage(video, 0, 0, 640, 480);
     context2.drawImage(image,0,0,640,480);
    document.getElementById("img").value = canvas2.toDataURL();
});

