var overlayer_quit = $('#overlayer_quit'),
	overlayer = $('#overlayer'),
	cover = $('#cover_preview'),
	cover_loading = $('#cover_loading'),
	cover_preview_message = $('#cover_preview_message'),
	cover_input = $("#article_cover");

let bt_quit = document.getElementById("overlayer_quit");

function show_cover_loading(){
	cover_loading.css({'display':'block'})
}
function hide_cover_loading(){
	cover_loading.css({'display':'none'})
}

$(document).ready(function(){
    $image_crop = $('#cover_demo').croppie({
		viewport:{
			width :300,
			height:300,
			type:'square'
		},
		boundary:{
			width:400,
			height:500
		},
		enforceBoundary: true,
		enableOrientation: true
    });
    
    $('#file_input').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(event){
			$image_crop.croppie('bind',{
				url:event.target.result
			}).then(function(){
				console.log('Jquery bind complete');
			});
		}
		reader.readAsDataURL(this.files[0]);
		document.getElementById("overlayer").style.display = "block";
	});

	$('#cover_save_button').on('click', function(){
		document.querySelector(".modal__container").style.display = "block";

		$image_crop.croppie('result', {
			type:'canvas',
			size:'viewport'
		}).then(function(response){
			let form_data = {'cover': response};
			
			axios.post(base_url + "/products/uploadcover/", form_data).then(response => {
				if(response.status == 200){
					let image_url = response.data["file_name"];

					document.querySelector(".modal__container").style.display = "none";
					document.getElementById("overlayer").style.display = "none";
					document.querySelector("#imagePreview img").src = data_folder + image_url;
					document.querySelector("#imagePreview img").style.display = "block";
					
					AkanaCookie.set("uploading_image", image_url)
				}
				else{
					console.log("image not uploaded.")
				}
			});
		})
	});
})

