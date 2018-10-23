var video = document.getElementById('video');
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var canvas2 = document.getElementById('canvas2');
var context2 = canvas2.getContext('2d');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
}
var img2 = new Image();
img2.src = 'http://chittagongit.com//images/photo-booth-icon-png/photo-booth-icon-png-12.jpg';

setInterval(() => {
	context.drawImage(video, 0, 0, 640, 480);
	context.drawImage(img2,0,0,640,480);
}, 16);

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context2.drawImage(video, 0, 0, 640, 480);
	context2.drawImage(img2,0,0,640,480);
});