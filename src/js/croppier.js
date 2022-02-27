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
		$image_crop.croppie('result', {
			type:'canvas',
			size:'viewport'
		}).then(function(response){
			hide_overlayer();
			show_cover_loading();
			// $.ajax({
			// 	url: '/admin/save_cover',
			// 	type: 'POST',
			// 	data: {'cover': response},
			// 	success: function(image_name){
			// 		hide_cover_loading();
			// 		cover.css({
			// 			'background':'rgba(0,160,230,0.4)',
			// 			'color':'#212121'
			// 		});
			// 		cover_preview_message.html("La couverture de l'article a été ajoutée");
			// 		cover_input.val(image_name);
			// 	}
			// })
		})
	});
})

