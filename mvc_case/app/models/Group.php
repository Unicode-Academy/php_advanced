<?php
//Group Model
class Group extends Model
{

    public function tableFill()
    {
        return 'groups';
    }

    public function fieldFill()
    {
        return '*';
    }

    public function primaryKey()
    {
        return 'id';
    }

    public function getGroups()
    {
        return $this->all();
    }
}
