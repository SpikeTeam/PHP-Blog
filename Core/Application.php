<?php

namespace Core;

class Application
{
    const FRONT_END_FOLDER = 'frontend';

    public function loadTemplate($templateName)
    {
        include self::FRONT_END_FOLDER . '/' . $templateName . '.php';
    }
}