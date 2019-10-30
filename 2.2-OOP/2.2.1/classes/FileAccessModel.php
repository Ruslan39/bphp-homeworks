<?php

class FileAccessModel
{
    protected $fileName;
    protected $file;

    public function __construct($fileName)
    {
        $this->fileName = config::DATABASE_PATH . $fileName . '.json';
    }
 
    protected function connect($mode)
    {
        $this->file = fopen("$this->fileName", "$mode");
    }

    protected function disconnect()
    {
        fclose($this->file);
    }

    public function read()
    {
        $this->connect(r);
        $fileSize = filesize("$this->fileName");
        $content = fread($this->file, $fileSize);
        $this->disconnect();
        return $content;
    }

    public function write($newContent)
    {
        $this->connect(w);
        fwrite($this->file, "$newContent");
        $this->disconnect();
    }
}