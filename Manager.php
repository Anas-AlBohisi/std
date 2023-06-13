<?php

trait Loggable {
  private $log_file = 'log.txt';

  private function log($message) {
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[$timestamp] $message\n";
    file_put_contents($this->log_file, $log_message, FILE_APPEND);
  }
}

class Manager {
  use Loggable;

  private $students = array();

  public function addStudent($student) {
    $this->students[$student->getId()] = $student;
    $message = "Added student: " . $student->getName() . " (ID: " . $student->getId() . ")";
    $this->log($message);
  }

  public function getStudent($id) {
    if (isset($this->students[$id])) {
      return $this->students[$id];
    }
    return null;
  }

  public function updateStudent($id, $name, $email) {
    if (isset($this->students[$id])) {
      $student = $this->students[$id];
      $old_name = $student->getName();
      $old_email = $student->getEmail();
      $student->setName($name);
      $student->setEmail($email);
      $message = "Updated student details: " . $old_name . " (ID: " . $id . ") => " . $name;
      $this->log($message);
    }
  }

  public function deleteStudent($id) {
    if (isset($this->students[$id])) {
      $student = $this->students[$id];
      unset($this->students[$id]);
      $message = "Deleted student: " . $student->getName() . " (ID: " . $id . ")";
      $this->log($message);
    }
  }
}

class Student {
  private $id;
  private $name;
  private $email;

  public function __construct($name, $email) {
    $this->id = uniqid();
    $this->name = $name;
    $this->email = $email;
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }
}
