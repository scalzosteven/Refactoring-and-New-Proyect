<?php

namespace Refactoring\Image;
class Image
{
    public function getImage()
    {
        $fileDoseNotExist = !file_exists(__DIR__ . '/../../cache/random');

        if ($fileDoseNotExist || time() - filemtime(__DIR__ . '/../../cache/random') > 3) {
            return $this->obtainImage();
        } else {
            return file_get_contents(__DIR__ . '/../../cache/random');
        }
    }

    /**
     * @return string
     */
    private function obtainImage(): string
    {
        $responseXml = @file_get_contents(
            'http://thecatapi.com/api/images/get?format=xml&type=jpg' );

        if (!$responseXml) {
            // the cat API is down or something
            return 'http://cdn.my-cool-website.com/default.jpg';
        }

        $responseElement = new \SimpleXMLElement($responseXml);

        $this->getFile_put_contents_in_cache($responseElement);

        return (string)$responseElement->data->images[0]->image->url;
    }

    /**
     * @param \SimpleXMLElement $responseElement
     */
    private function getFile_put_contents_in_cache(\SimpleXMLElement $responseElement)
    {
        file_put_contents(
            __DIR__ . '/../../cache/random',
            (string)$responseElement->data->images[0]->image->url
        );
    }
}