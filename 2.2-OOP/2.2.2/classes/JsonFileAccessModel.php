<?php 

class JsonFileAccessModel
{
    protected $fileName;
    protected $file;

    public function __construct($fileName)
    {
        $this->fileName = config::DATABASE_PATH . $fileName . '.json';
    }
 
    private function connect($mode)
    {
        $this->file = fopen($this->fileName, $mode);  //Добавил ../ и заработало
    }

    private function disconnect()
    {
        fclose($this->file);
    }

    public function readJson()
    {
        $this->connect('r');
        $fileSize = filesize($this->fileName); //Добавил ../ и заработало
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