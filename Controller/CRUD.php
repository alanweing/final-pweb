<?php
define ('DATABASE_NAME', 'trabalho_alan');
require_once dirname(dirname(__FILE__)) . '/Controller/DatabaseConnection.php';

class CRUD
{
  public static function insert($value)
  {
    $i = DatabaseConnection::instance();
    $q = "INSERT INTO `" . DATABASE_NAME . "`." . '`' . static::$table . '`' . ' (' . implode(', ', static::$fields) . ') ' . " VALUES($value)";
    try
    {
      $i->connection->query($q);
      $i->connection->commit();
    }

    catch (PDOException $e)
    {
      return $e;
    }
    return TRUE;
  }

  public static function select($fields='*', $conditions=NULL, $limit=NULL, $order=NULL)
  {
    $q = "SELECT $fields FROM " . static::$table;
    if (!is_null($conditions))
      $q .= " WHERE $conditions";
    if (!is_null($order))
      $q .= " ORDER BY $order";
    if (!is_null($limit))
      $q .= " LIMIT $limit";
    try
    {
      return DatabaseConnection::instance()->connection->query($q);
    }

    catch (PDOException $e)
    {
      return $e;
    }
  }

  public static function update($new_values, $conditions)
  {
    $q = "UPDATE " . '`' . DATABASE_NAME . '`.`' . static::$table . "` SET $new_values WHERE $conditions";
    return DatabaseConnection::instance()->connection->query($q);
  }

  public static function delete($conditions)
  {
    $q = "DELETE FROM `". DATABASE_NAME . '`.`' . static::$table . "` WHERE $conditions";
    return DatabaseConnection::instance()->connection->query($q);
  }

  public static function query($query)
  {
    return DatabaseConnection::instance()->query($query);
  }
}
