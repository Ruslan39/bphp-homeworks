<?php 

class User extends DataRecordModel
{
    public $name;
    public $email;
    public $password;
    public $rate;

    public function addUserFromForm($data)
    {
        $this->name = $data[name];
        $this->password = $data[password];
        $this->email = $data[email];
        $this->rate = $data[rate];

        $this->commit();
    }    
}