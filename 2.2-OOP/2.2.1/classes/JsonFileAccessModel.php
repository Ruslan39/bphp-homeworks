<?php

class JsonFileAccessModel extends FileAccessModel
{    
    public function readJson()
    {
        $this->connect('r');
        $fileSize = filesize($this->fileName);
        $content = fread($this->file, $fileSize);
        $contentFromJson = json_decode($content, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        $this->disconnect();        
        return $contentFromJson;
    }

    public function writeJson($newJsonContent)
    {
        $this->connect('w');
        $newJsonData = json_encode($newJsonContent, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);
        fwrite($this->file, $newJsonData);        
        $this->disconnect();
    }
}