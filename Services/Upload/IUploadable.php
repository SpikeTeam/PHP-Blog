<?php

namespace Services\Upload;


interface IUploadable
{
    public function upload($fileInfo, $destination) : string;
}