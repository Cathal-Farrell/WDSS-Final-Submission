<?php
session_start();

require_once __DIR__ . '/../shoppingCartClass.php';

use PHPUnit\Framework\TestCase;

class IndexTest extends TestCase {
    public function testDatabaseConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "nvctech";   

        $conn = new mysqli($servername, $username, $password, $dbname);

        $this->assertEquals(true, $conn->ping(), 'Init file not creating cart');
    }
}
