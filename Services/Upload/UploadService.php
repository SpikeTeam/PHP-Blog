<?php

namespace Services\Upload;

class UploadService implements IUploadable
{
    public function upload($fileInfo, $destination): string
    {
        $fileName = $destination . DIRECTORY_SEPARATOR .
            uniqid() . '_' . $fileInfo['name'];

        $result = move_uploaded_file($fileInfo['tmp_name'], $fileName);

        if($result === false) {
            throw new \Exception("Uploaded failded.");
        }

        return $fileName;
    }
}