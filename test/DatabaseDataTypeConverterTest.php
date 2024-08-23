<?php

namespace Yaskuriyamuri\Php_mytools_test;

use PHPUnit\Framework\TestCase;
use Yaskuriyamuri\Php_mytools\DatabaseDataTypeConverter;

/**
 * Class DatabaseDataTypeConverterTest
 *
 * Test case untuk kelas DatabaseDataTypeConverter.
 *
 * @package Yaskuriyamuri\Php_mytools_test
 */
class DatabaseDataTypeConverterTest extends TestCase
{
    public function testSqlServerToSQLite3()
    {
        $this->assertEquals('INTEGER', DatabaseDataTypeConverter::sqlServerToSQLite3('int'));
        $this->assertEquals('TEXT', DatabaseDataTypeConverter::sqlServerToSQLite3('nvarchar'));
        $this->assertEquals('CHAR(10)', DatabaseDataTypeConverter::sqlServerToSQLite3('nchar', 10));
        $this->assertEquals('TEXT', DatabaseDataTypeConverter::sqlServerToSQLite3('ntext'));
        $this->assertEquals('BOOLEAN', DatabaseDataTypeConverter::sqlServerToSQLite3('bit'));
        $this->assertEquals('DATETIME', DatabaseDataTypeConverter::sqlServerToSQLite3('datetime'));
        $this->assertEquals('REAL', DatabaseDataTypeConverter::sqlServerToSQLite3('float'));
        $this->assertEquals('TEXT', DatabaseDataTypeConverter::sqlServerToSQLite3('uniqueidentifier'));
  
    }

    public function testSqlServerToMySQL()
    {
        $this->assertEquals('INT', DatabaseDataTypeConverter::sqlServerToMySQL('int'));
        $this->assertEquals('VARCHAR(255)', DatabaseDataTypeConverter::sqlServerToMySQL('nvarchar',255));
        $this->assertEquals('CHAR(10)', DatabaseDataTypeConverter::sqlServerToMySQL('nchar', 10));
        $this->assertEquals('TEXT', DatabaseDataTypeConverter::sqlServerToMySQL('ntext'));
        $this->assertEquals('TINYINT(1)', DatabaseDataTypeConverter::sqlServerToMySQL('bit'));
        $this->assertEquals('DATETIME', DatabaseDataTypeConverter::sqlServerToMySQL('datetime'));
        $this->assertEquals('FLOAT', DatabaseDataTypeConverter::sqlServerToMySQL('float'));
        $this->assertEquals('CHAR(36)', DatabaseDataTypeConverter::sqlServerToMySQL('uniqueidentifier'));
    }

    public function testSQLite3ToSqlServer()
    {
        $this->assertEquals('INT', DatabaseDataTypeConverter::sqlite3ToSqlServer('INTEGER'));
        $this->assertEquals('NVARCHAR(MAX)', DatabaseDataTypeConverter::sqlite3ToSqlServer('TEXT'));
        $this->assertEquals('NCHAR(10)', DatabaseDataTypeConverter::sqlite3ToSqlServer('CHAR', 10));
        $this->assertEquals('NVARCHAR(MAX)', DatabaseDataTypeConverter::sqlite3ToSqlServer('TEXT'));
        $this->assertEquals('BIT', DatabaseDataTypeConverter::sqlite3ToSqlServer('BOOLEAN'));
        $this->assertEquals('DATETIME', DatabaseDataTypeConverter::sqlite3ToSqlServer('DATETIME'));
        $this->assertEquals('FLOAT', DatabaseDataTypeConverter::sqlite3ToSqlServer('REAL'));
        $this->assertEquals('VARBINARY(MAX)', DatabaseDataTypeConverter::sqlite3ToSqlServer('BLOB'));
    }

    public function testSQLite3ToMySQL()
    {
        $this->assertEquals('INT', DatabaseDataTypeConverter::sqlite3ToMySQL('INTEGER'));
        $this->assertEquals('TEXT', DatabaseDataTypeConverter::sqlite3ToMySQL('TEXT'));
        $this->assertEquals('CHAR(10)', DatabaseDataTypeConverter::sqlite3ToMySQL('CHAR', 10));
        $this->assertEquals('TEXT', DatabaseDataTypeConverter::sqlite3ToMySQL('TEXT'));
        $this->assertEquals('TINYINT(1)', DatabaseDataTypeConverter::sqlite3ToMySQL('BOOLEAN'));
        $this->assertEquals('DATETIME', DatabaseDataTypeConverter::sqlite3ToMySQL('DATETIME'));
        $this->assertEquals('FLOAT', DatabaseDataTypeConverter::sqlite3ToMySQL('REAL'));
        $this->assertEquals('BLOB', DatabaseDataTypeConverter::sqlite3ToMySQL('BLOB'));
    }

    public function testMySQLToSqlServer()
    {
        $this->assertEquals('INT', DatabaseDataTypeConverter::mysqlToSqlServer('int'));
        $this->assertEquals('NVARCHAR(255)', DatabaseDataTypeConverter::mysqlToSqlServer('varchar',255));
        $this->assertEquals('NCHAR(10)', DatabaseDataTypeConverter::mysqlToSqlServer('char', 10));
        $this->assertEquals('NTEXT', DatabaseDataTypeConverter::mysqlToSqlServer('text'));
        $this->assertEquals('BIT', DatabaseDataTypeConverter::mysqlToSqlServer('tinyint'));
        $this->assertEquals('DATETIME', DatabaseDataTypeConverter::mysqlToSqlServer('datetime'));
        $this->assertEquals('FLOAT', DatabaseDataTypeConverter::mysqlToSqlServer('float'));
        $this->assertEquals('VARBINARY(MAX)', DatabaseDataTypeConverter::mysqlToSqlServer('blob'));
    }

    public function testMySQLToSQLite3()
    {
        $this->assertEquals('INTEGER', DatabaseDataTypeConverter::mysqlToSQLite3('int'));
        $this->assertEquals('TEXT', DatabaseDataTypeConverter::mysqlToSQLite3('varchar'));
        $this->assertEquals('CHAR(10)', DatabaseDataTypeConverter::mysqlToSQLite3('char', 10));
        $this->assertEquals('TEXT', DatabaseDataTypeConverter::mysqlToSQLite3('text'));
        $this->assertEquals('BOOLEAN', DatabaseDataTypeConverter::mysqlToSQLite3('tinyint'));
        $this->assertEquals('DATETIME', DatabaseDataTypeConverter::mysqlToSQLite3('datetime'));
        $this->assertEquals('REAL', DatabaseDataTypeConverter::mysqlToSQLite3('float'));
        $this->assertEquals('BLOB', DatabaseDataTypeConverter::mysqlToSQLite3('blob'));
    }
}
