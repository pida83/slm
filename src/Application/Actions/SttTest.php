<?php


namespace App\Application\Actions;


class SttTest
{
    static $instance;
    static $cnt = 0;
    var $cntt = 1;
    private function __construct()
    {
        //$this->setsome();
        //self::$instance = &$this;
    }


    static function setVal() {
        static::$cnt++;
    }

    static function getVal(){
        echo static::$cnt;
    }

    static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new SttTest();
        }
        return self::$instance;
    }

    static function setInstance($var) {
            self::$instance = $var;
    }

   public function getsome () {
        return self::$cnt;
    }

    public function setsome () {
        return ++self::$cnt;
    }
    
    static function getObje() {
        echo "LINE :: " . __LINE__ . "<br/>";
        echo "FILE :: " . __FILE__ . "<br/>";
        echo "METHOD :: " . __METHOD__ . "<br/>";
        echo "<pre>";
        var_dump(self::$instance);
        echo "</pre>";

    }
    public function getCntt(){
            return $this->cntt;
    }

    public function setCntt(){
        return ++$this->cntt;
    }

}