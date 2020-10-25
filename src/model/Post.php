<?php
  class Post {
    private $id;
    private $user_id;
    private $title;
    private $views;
    private $body;
    private $published;

    function set_id($id) {
      $this->id = $id;
    }
    function get_id() {
      return $this->id;
    }

    function set_user_id($user_id) {
      $this->user_id = $user_id;
    }
    function get_user_id() {
      return $this->user_id;
    }

    function set_title($title) {
      $this->title = $title;
    }
    function get_title() {
      return $this->title;
    }

    function set_views($views) {
      $this->views = $views;
    }
    function get_views() {
      return $this->views;
    }

    function set_body($body) {
      $this->body = $body;
    }
    function get_body() {
      return $this->body;
    }

    function set_published($published) {
      $this->published = $published;
    }
    function get_published() {
      return $this->published;
    }
  }
?>
