<?php


namespace Refactoring\Image;


class Cache
{
    /**
     * @param \SimpleXMLElement $responseElement
     */
    public function getFilePutContentsInCache(\SimpleXMLElement $responseElement)
    {
        file_put_contents(
            __DIR__ . '/../../cache/random',
            (string)$responseElement->data->images[0]->image->url
        );
    }

}