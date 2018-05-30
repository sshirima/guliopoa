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
     * @param $imageName
     * @return bool
     */
    public function deleteImage($imageName){
        //Remove image name from DB
        $status = $this->deleteProductImage($imageName);
        //Remove image from Storage
        return $this->deleteImageFromDisk($imageName);
    }

    /**
     * Store image file to the storage
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
     * @param $imageName
     * @return bool
     */
    private function deleteImageFromDisk($imageName){
        return $status = \Storage::delete($imageName);
    }

    /**
     * Save image name to the database
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
     * @param $imageName
     * @return mixed
     */
    private function deleteProductImage($imageName){
        $image = ProductImage::where([ProductImage::COLUMN_IMAGE_NAME=>$imageName])->first();
        return $image->delete();
    }

    /**
     * @param $image
     * @param $width
     * @param $length
     * @return mixed
     */
    private function resizeImage($image, $width, $length){
        return $this->createImage($image)->resize($width, $length);
    }

    /**
     * @param $image
     * @return mixed
     */
    private function createImage($image){
        return  Image::make($image);
    }

}