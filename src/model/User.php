<?php
  class User {
    private $id;
    private $email;
    private $password;
    private $role;

    function set_id($id) {
      $this->id = $id;
    }
    function get_id() {
      return $this->id;
    }

    function set_email($email) {
      $this->email = $email;
    }
    function get_email() {
      return $this->email;
    }

    function set_password($password) {
      $this->password = $password;
    }
    function get_password() {
      return $this->password;
    }

    function set_role($role) {
      $this->role = $role;
    }
    function get_role() {
      return $this->role;
    }
  }
?>
