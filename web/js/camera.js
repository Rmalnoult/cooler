function hasGetUserMedia() {
  return !!(navigator.getUserMedia || navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia || navigator.msGetUserMedia);
}

if (hasGetUserMedia()) {
	console.log("hasgetusermedia");
  // Good to go!
} else {
  alert('getUserMedia() is not supported in your browser');
}

var errorCallback = function(e) {
  console.log('Reeeejected!', e);
};

var video = document.querySelector('video');
var canvas = document.querySelector('canvas');
var ctx = canvas.getContext('2d');
var localMediaStream = null;

function snapshot() {
	if (localMediaStream) {
	  	console.log('say cheeese');
	  	ctx.scale(1, 1);
    ctx.drawImage(video, 0, 0, 350, 280);
    // "image/webp" works in Chrome.
    // Other browsers will fall back to image/png.
    document.querySelector('img').src = canvas.toDataURL('image/webp');
    photoUpload.upload(document.querySelector('img').src);
  }
}

video.addEventListener('click', snapshot, false);


navigator.getUserMedia  = navigator.getUserMedia ||
                          navigator.webkitGetUserMedia ||
                          navigator.mozGetUserMedia ||
                          navigator.msGetUserMedia;


if (navigator.getUserMedia) {
  navigator.getUserMedia({video: true}, function(stream) {
    video.src = window.URL.createObjectURL(stream);
    localMediaStream = stream;
  }, errorCallback);
} else {
  video.src = 'somevideo.webm'; // fallback.
}

