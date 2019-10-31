<?php 

class Users extends JsonDataArray
{
    public function displaySortedList()
    {
        $dSList = $this->newQuery()->orderBy('name')->getObjs();
        
        foreach($dSList as $value) {            
            echo '<b>' . "$value[name]" . '</b>' . '<br><br>';
            echo 'e-mail: ' . "$value[email]" . '<br>';
            echo 'rate: ' . "$value[rate]" . '<br>';
            echo '<hr><br>';
        }
    }
}