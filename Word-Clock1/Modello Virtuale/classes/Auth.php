<?php
// Importing main CONFIG class
require 'Config.php';

/*
  Registration part for encrypt the password
// crypt the user's password with the PHP 5.5's password_hash() function, results in a 60 character hash string
// the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using PHP 5.3/5.4, by the password hashing
// compatibility library. the third parameter looks a little bit shitty, but that's how those PHP 5.5 functions
// want the parameter: as an array with, currently only used with 'cost' => XX.
$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT, array('cost' => $hash_cost_factor));
*/

/**
 * Class that manage the configurations for the classes
 * @author Alessandro Narciso
 * @date 10.02.2017
 */
class Auth extends Config {

  public $errors = array();

  public function __construct (){
    // Controllo se è stata effettuata una richiesta in get
    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET)){
      // Eseguo la funzione di logout solo se è stata effettuata una richiesta di logout e l'utente è già loggato
      if(isset($_GET['logout']) && $_SESSION['logged_in'] == 1){
        $this->logoutSession();
      }
    }

    // Controllo se è stata effettuata una richiesta in post
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST)){
      // Controllo se è stato effettuata una richiesta di login
      if(isset($_POST['auth_request'])){
        // Se è stato effettuato correttamente, allora mando i dati del POST alla funzione
        $this->loginPost($_POST['auth__username'], $_POST['auth__password']);
      // Controllo se è stato effettuata una richiesta per il cambio delle impostazioni
      } else if(isset($_SESSION['logged_in'])){
        if(isset($_POST['settings_request'])){
          // Se è stato effettuato correttamente, allora mando i dati del POST alla funzione
          $this->changePassword($_SESSION['admin_username'], $_POST['settings__curpassword'], $_POST['settings__newpassword'], $_POST['settings__repassword']);
        }
      }
    }
  }

  /**
   * Function that login with POST data
   */
  private function loginPost($username, $password){
    if (empty($username)) {
      $this->errors[] = "Il campo dell'username è vuoto.";
    } else if (empty($password)) {
      $this->errors[] = "Il campo della password è vuoto.";
    } else {
      $username = trim($username);
      $password = trim($password);

      if($this->databaseConnection()){
        // database query, getting all the info of the selected user
        $q_user = $this->db_connection->prepare('SELECT * FROM admin WHERE admin_username = :admin_username');
        $q_user->bindValue(':admin_username', $username, PDO::PARAM_STR);
        $q_user->execute();
        // get result row (as an object)
        $res = $q_user->fetchObject();
      }

      // if this user not exists
      if (!isset($res->admin_id) || $res->admin_password != $password) {
        // was MESSAGE_USER_DOES_NOT_EXIST before, but has changed to MESSAGE_LOGIN_FAILED
        // to prevent potential attackers showing if the user exists
        $this->errors[] = "Login fallito.";
      } else {
        // write user data into PHP SESSION [a file on your server]
        $_SESSION['admin_id'] = $res->admin_id;
        $_SESSION['admin_username'] = $res->admin_username;
        $_SESSION['logged_in'] = true;

        header("Location: /");
      }
    }
  }

  /**
   * Function that login with POST data
   */
  private function changePassword($username, $old_password, $new_password, $re_password){
    if (empty($old_password)) {
      $this->errors[] = "Il campo della password corrente è vuoto.";
    } else if (empty($new_password)) {
      $this->errors[] = "Il campo della nuova password è vuoto.";
    } else if (empty($re_password)) {
      $this->errors[] = "Il campo della conferma della password è vuoto.";
    } else if ($new_password !== $re_password) {
      $this->errors[] = "Le due password non coincidono.";
    } else {
      $old_password = trim($old_password);
      $new_password = trim($new_password);
      $re_password = trim($re_password);

      if($this->databaseConnection()){
        // database query, getting all the info of the selected user
        $q_user = $this->db_connection->prepare("SELECT admin_password FROM admin WHERE admin_username = :admin_un");
        $q_user->bindValue(':admin_un', $username, PDO::PARAM_STR);
        $q_user->execute();
        // get result row (as an object)
        $res_user = $q_user->fetchObject();

        // if this user not exists
        if (!isset($res_user->admin_password)) {
          // was MESSAGE_USER_DOES_NOT_EXIST before, but has changed to MESSAGE_LOGIN_FAILED
          // to prevent potential attackers showing if the user exists
          $this->errors[] = "L'utente non esiste.";
        } else {
          if($old_password == $res_user->admin_password){
            // database query, getting all the info of the selected user
            $q_pass = $this->db_connection->prepare("UPDATE admin SET admin_password = :admin_pw WHERE admin_username = :admin_un");
            $q_pass->bindValue(':admin_pw', $new_password, PDO::PARAM_STR);
            $q_pass->bindValue(':admin_un', $username, PDO::PARAM_STR);
            $q_pass->execute();
            // get result row (as an object)
            $res_pass = $q_pass->fetchObject();

            // Message
            $this->messages[] = "Password cambiata con successo!";
          } else {
            // Se la password corrente che ha inserito non corrisponde a quella nel db
            $this->errors[] = "La password corrente non è corretta!";
          }
        }
      }
    }
  }

  /**
   * Function that logout from the session
   */
  private function logoutSession(){
    $_SESSION = null;
    session_destroy();
    session_start();
  }
}
