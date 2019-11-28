<?php


namespace App\Domain\Board\Validator;


class DataValiate
{
    protected $data = [];

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function getInt($key = null)
    {
        if ($key == null) {
            return false;
        }

        return (is_int($this->data[$key]) == false)? settype($this->data[$key],"int") : $this->data[$key];

    }

    public function getString($key = null)
    {
        if ($key == null) {
            return false;
        }

        return (is_string($this->data[$key]) == false)? settype($this->data[$key],"string") : $this->data[$key];
    }
}