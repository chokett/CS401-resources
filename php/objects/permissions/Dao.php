<?php

require_once "User.php";

class Dao {

  // file containing serialized User objects
  private $usersFile = "users.txt";

  public function getUser ($email) {
    $users = file($this->usersFile);

    foreach ($users as $user) {
      // recreate User object
      $user = unserialize($user);
      if ($email == trim($user->getEmail())) {
        // user email found, return the object
        return $user;
      }
    }
    throw new Exception("User not found");
  }

  public function addUser ($user) {
    // serialize User object
    $writeme = serialize($user);
    file_put_contents($this->usersFile, $writeme . "\n", FILE_APPEND);
  }
} // end Dao

?>
