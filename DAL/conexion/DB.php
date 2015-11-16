<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author Cristian Buitrago
 */
require_once(dirname(dirname(dirname(__FILE__)))."/DAL/adodb5/adodb.inc.php");

class DB {

    private function __construct() {

    }

    public static function conn() {
        static $conn;
        if (!$conn) {
            $conn = adoNewConnection('mysql');
            $conn->connect('10.20.1.253', 'servidorilud', 'adminilud', 'bdilud');
            $conn->setFetchMode(ADODB_FETCH_ASSOC);
        }
        return $conn;
    }






}

?>
