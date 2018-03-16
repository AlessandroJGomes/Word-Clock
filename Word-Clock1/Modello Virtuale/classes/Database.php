<?php
// Import the main config
require '../config/config.php';

/**
 * Class that manage the DATABASE CONNECTION
 * @author Alessandro Narciso
 * @date 10.02.2017
 */
class Database {
  /**
   * @var object $db_connection The database connection
   */
  protected $db_connection = null;

  /**
  * Checks if database connection is opened. If not, then this method tries to open it.
  * @return bool Success status of the database connecting process
  */
  protected function databaseConnection(){
    // if connection already exists
    if ($this->db_connection != null) {
      return true;
    } else {
      try {
        // Generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        // Also important: We include the charset, as leaving it out seems to be a security issue:
        // @see http://wiki.hashphp.org/PDO_Tutorial_for_MySQL_Developers#Connecting_to_MySQL says:
        // "Adding the charset to the DSN is very important for security reasons,
        // most examples you'll see around leave it out. MAKE SURE TO INCLUDE THE CHARSET!"
        $this->db_connection = new PDO('mysql:host='. DB_HOST .';port=' . DB_PORT . ';dbname='. DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        return true;
      } catch (PDOException $e) {
        $this->errors[] = MESSAGE_DATABASE_ERROR . $e->getMessage();
      }
    }
    // default return
    return false;
  }
}
