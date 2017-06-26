<?php

class DatabaseConnection
{
  private $user = 'root';
  private $pass = 'alan4924965';
  private static $instance;
  public $connection;

  private function __construct()
  {
    $this->connect();
  }

  private function connect()
  {
    try
    {
      $this->connection = new PDO('mysql:host=localhost;dbname=trabalho_alan', $this->user, $this->pass);
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e)
    {
      die($e);
    }
  }

  public static function instance()
  {
    if (is_null(self::$instance))
      self::$instance = new self;
    try
    {
      self::$instance->connection->query("SELECT 1");
    }

    catch(PDOException $e)
    {
      self::$instance->connect();
    }
    return self::$instance;
  }
}
