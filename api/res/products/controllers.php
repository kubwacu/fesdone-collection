<?php
    namespace products\Controllers;

    require API_ROOT.'/res/products/models.php';
    require API_ROOT.'/res/products/serializers.php';

    use Akana\Response;
    use Akana\Utils;
    use products\Models\Product;
    use products\Serializers\ProductSerializer;

    class ProductsController{
        static function post(){
            $product = new Product();
            $product->save();
            $serializer = ProductSerializer::serialize($product);
            return new Response($serializer['data']);
        }
        static function get(){
            $data = Product::get_all();
            $serializer = ProductSerializer::serialize($data);

            return new Response($serializer['data'], STATUS_200_OK);
        }
    }
    class ProductController{
        static function get($id){
            $data = Product::get($id);
            $serializer = ProductSerializer::serialize($data);

            return new Response($serializer['data'], STATUS_200_OK); 
        }
        static function delete($id){
            $data = Product::get($id);
            $data->delete();

            return new Response(["message"=> "product deleted"], STATUS_200_OK); 
        }
        static function put($id){
            $data = Product::get($id);

            $data->update([
                "name" => Utils::PUT("name"),
                "size" => Utils::PUT("size"),
                "price" => Utils::PUT("price"),
                "description" => Utils::PUT("description"),
                "image" => Utils::PUT("image"),
            ]);
            $serializer = ProductSerializer::serialize($data);
            return new Response($serializer['data'], STATUS_200_OK); 
        }
    }

    class ProductCoverController{
        static function post(){
            
            $binary_data = REQUEST["data"]["cover"];
            list($type, $image) = explode(';',$binary_data);
			list(, $image) = explode(',',$image);
			$image = base64_decode($image);
			$image_name = time().'.png';
			$image_rep = "../src/data/".$image_name;
            file_put_contents($image_rep, $image);

            return new Response(["file_name" => $image_rep]);
                
            // $cover = imagecreatefrompng($image_rep); 
			// $mini_cover = imagecreatetruecolor(120, 120);
			// $width_cover = imagesx($cover);
			// $height_cover = imagesy($cover);
			// $width_miniCover = imagesx($mini_cover);
			// $height_miniCover = imagesy($mini_cover);
			// imagecopyresampled($mini_cover,$cover,0,0,0,0,$width_miniCover,$height_miniCover,$width_cover,$height_cover);
            // imagepng($mini_cover, 'article/cover/miniature/'.$image_name);
        }
    }