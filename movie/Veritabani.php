<?php

class Veritabani
{

    protected static $baglanti;

    public static function baglan($host, $name, $user, $pass)
    {
        try {
            self::$baglanti = new PDO("mysql:host=".$host.";dbname=".$name, $user, $pass);
        } catch (PDOException $e) {
            die("Bağlantı Hatası!");
        }
    }

}