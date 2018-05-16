<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 5/15/2018
 * Time: 9:47 PM
 */

namespace App\Services\Merchants;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use \Intervention\Image\Facades\Image;

class ImageManager
{
    const IMAGE_PATH = 'images/products/';


    public function handleUploadedImages(Request $request,$key)
    {
        $images = $request->file($key);

        if (!is_null($images)) {
            $imageNames = array();
            $i = 1;
            foreach ($images as $image){
                $imageName = $this->storeImage($image, $i);

                //Save image to the database
                $this->saveProductImage($request, $imageName);
                $imageNames[] = $imageName;
                $i++;
            }
            return $imageNames;
        } else{
            return false;
        }
    }

    /**
     * @param $image
     * @param $index
     * @return string
     */
    private function storeImage($image, $index){
        $imageName = time() . $index . '.' . $image->getClientOriginalExtension();

        $imagePath = public_path(self::IMAGE_PATH . $imageName);

        $this->resizeImage($image,900,600)->save($imagePath);

        return $imageName;
    }

    /**
     * @param Request $request
     * @param $imageName
     * @return mixed
     */
    private function saveProductImage(Request $request, $imageName){
        return ProductImage::create([
            ProductImage::COLUMN_IMAGE_NAME=>$imageName,
            ProductImage::COLUMN_PRODUCT_ID=>$request[ProductImage::COLUMN_PRODUCT_ID],
        ]);
    }

    /**
     * @param $image
     * @param $width
     * @param $length
     * @return mixed
     */
    private function resizeImage($image, $width, $length){
        return Image::make($image)->resize($width, $length);
    }

}