<?php

namespace Civix\CoreBundle\Service;

/**
 * Image crop class
 *
 * @author Valentin Shevko <valentin.shevko@intellectsoft.org>
 */
class CropImage
{
    private $allowedTypes = array('jpeg', 'jpg', 'png', 'gif', 'bmp');
    /**
     * @param string $destPath Destination image path
     * @param string $srcPath  Source image path
     * @param int    $destX    Destination image X
     * @param int    $destY    Destination image Y
     * @param int    $srcX     Source image X
     * @param int    $srcY     Source image Y
     * @param int    $destW    Destination image width
     * @param int    $destH    Destination image height
     * @param int    $srcW     Source image width
     * @param int    $srcH     Source image height
     */
    public function crop($destPath, $srcPath, $destX, $destY, $srcX, $srcY, $destW, $destH, $srcW, $srcH)
    {
        $srcImageResource = $this->getImageResource($srcPath);
        $newImageResource = $this->createImageResource($destW, $destH, $this->getImageType($srcPath));

        if (is_null($srcW) || is_null($srcH)) {
            $srcW = imagesx($srcImageResource);
            $srcH = imagesy($srcImageResource);

            if ($srcW > $srcH) {
                $srcW = $srcH;
            } else {
                $srcH = $srcW;
            }
        }

        imagecopyresampled(
            $newImageResource,
            $srcImageResource,
            $destX, $destY,
            $srcX, $srcY,
            $destW, $destH,
            $srcW, $srcH);

        $this->saveImage($newImageResource, $destPath);
    }

    public function rebuildImage($destPath, $srcPath, $maxSize = 256)
    {
        list($width, $height, $type) = getimagesize($srcPath);
        $srcImageResource = $this->getImageResource($srcPath);

        //get new image size
        $newImageSize = max(array($width, $height));
        $ratio = $width/$height;
        $newHeigth = $height;
        $newWidth = $width;

        //resize if need
        if ($newImageSize > $maxSize) {
            $newImageSize = $maxSize;
            if ($ratio < 1) {
                $newHeigth = $maxSize;
                $newWidth = $newHeigth*$ratio;
            } else {
                $newWidth = $maxSize;
                $newHeigth = $newWidth*$ratio;
            }
        }

        $newImageResource = $this->createWhiteImageResource($newImageSize, $newImageSize);

        imagecolorallocate($newImageResource, 0, 0, 0);

        $insertCoordX = ($newImageSize - $newWidth)/2;
        $insertCoordY = ($newImageSize - $newHeigth)/2;

        imagecopyresampled($newImageResource, $srcImageResource, $insertCoordX,
            $insertCoordY, 0, 0, $newWidth, $newHeigth, $width, $height
        );

        $this->saveImage($newImageResource, $destPath);

        imagedestroy($newImageResource);
        imagedestroy($srcImageResource);
    }

    /**
     * Get image resource by path
     *
     * @param string $imagePath Image path
     *
     * @return resource
     * @throws \Exception
     */
    protected function getImageResource($imagePath)
    {
        $type = $this->getImageType($imagePath);
        switch ($type) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($imagePath);
                break;
            case 'png':
                $image = imagecreatefrompng($imagePath);
                break;
            case 'gif':
                $image = imagecreatefromgif($imagePath);
                break;
            case 'bmp':
                $image = imagecreatefromwbmp($imagePath);
                break;
            default:
                throw new \Exception('Unsupported picture type!');
        }

        return $image;
    }

    /**
     * Save image from resource
     *
     * @param resource $imageResource Image resource
     * @param string   $savePath      Path for save
     *
     * @throws \Exception
     */
    protected function saveImage($imageResource, $savePath)
    {
        $type = $this->getImageType($savePath);
        switch ($type) {
            case 'jpeg':
            case 'jpg':
                imagejpeg($imageResource, $savePath);
                break;
            case 'png':
                imagepng($imageResource, $savePath);
                break;
            case 'gif':
                imagegif($imageResource, $savePath);
                break;
            case 'bmp':
                imagewbmp($imageResource, $savePath);
                break;
            default:
                throw new \Exception('Unsupported picture type!');
        }
    }

    /**
     * Create image resource
     *
     * @param int    $width  New image resource width
     * @param int    $height New image resource height
     * @param string $type   New image resource type
     *
     * @return resource
     */
    protected function createImageResource($width, $height, $type)
    {
        $image = imagecreatetruecolor($width, $height);

        // preserve transparency
        if ($type == "gif" or $type == "png") {
            imagecolortransparent($image, imagecolorallocatealpha($image, 0, 0, 0, 127));
            imagealphablending($image, false);
            imagesavealpha($image, true);
        }

        return $image;
    }

    /**
     *  Create image resource with white image background
     *
     * @param Integer $width
     * @param Integer $height
     *
     * @return resource
     */
    protected function createWhiteImageResource($width, $height)
    {
        $image = imagecreatetruecolor($width, $height);
        $back = imagecolorallocate($image, 255, 255, 255);
        imagefill($image, 0, 0, $back);

        return $image;
    }

    /**
     * Get image type by image path
     *
     * @param string $imagePath
     *
     * @return string
     */
    protected function getImageType($imagePath)
    {
        $type = strtolower(substr(strrchr($imagePath, "."), 1));
        if (stristr($type, '?')) {
            $type = stristr($type, '?', true);
        }
        if (array_search($type, $this->allowedTypes) === false) {
            list($width, $height, $typeConst) = getimagesize($imagePath);

            return image_type_to_extension($typeConst, false);
        }

        return $type;
    }
}
