var photoUpload = {
	upload: function (base64img) {

		var userId = 1;
		// var userId = $('.personId').attr("id");
		var pictureUploadRoute = $('canvas').attr('data-pictureuploadroute');

		$.ajax({
		    type: "POST",
		    url: pictureUploadRoute,
		    data: {base64img: base64img, userId: userId},
		    contentType: "application/x-www-form-urlencoded;charset=UTF-8",
		    success: function(data){

		    }
		});
	}
}