<?php
	if(isset($_POST['image']) AND isset($_POST['id_article'])){
		include('../main/includes/main_includes/db.php');
		function chargeClass($class){require '../main/class/'.$class.'.class.php';}
		spl_autoload_register('chargeClass');
		$article_i = new ArticleManager($db);

		$image = $_POST['image'];
		$id= $_POST['id_article'];

		list($type, $image) = explode(';',$image);
		list(, $image) = explode(',',$image);

		$image = base64_decode($image);
		$image_name = '../main/illustration/cover/'.sha1($id).'.png';
		file_put_contents($image_name, $image);
		$article_i->adCover($id);

		$cover = imagecreatefrompng('../main/illustration/cover/'.sha1($id).'.png'); 
		$mini_cover = imagecreatetruecolor(120, 70);
		$width_cover = imagesx($cover);
		$height_cover = imagesy($cover);
		$width_miniCover = imagesx($mini_cover);
		$height_miniCover = imagesy($mini_cover);
		imagecopyresampled($mini_cover,$cover,0,0,0,0,$width_miniCover,$height_miniCover,$width_cover,$height_cover);
		imagepng($mini_cover, '../main/illustration/cover/mini_cover/'.sha1($id).'.png');
	}
	else{
		echo "erreur";
	}
?>