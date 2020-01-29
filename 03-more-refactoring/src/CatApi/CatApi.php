<?php

namespace Refactoring\CatApi;

use Refactoring\Image\Image;

class CatApi
{
    /**@var Image */
    private $_image;

    public function __construct()
    {
        $this->setImage();
    }

    public function getRandomImage()
    {
        return $this->_image->getImagen();
    }


    private function setImage()
    {
        $this->_image = new Image();
    }
}
