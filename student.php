<?php

class Student {
  private $id;
  private $name;
  private $email;
  private $courses = array();

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

  public function getEmail() {
    return $this->email;
  }

  public function getCourses() {
    return $this->courses;
  }

  public function addCourse($course) {
    $this->courses[] = $course;
  }
}

class Course {
  private $name;

  public function __construct($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }
}

// Example usage:
$student = new Student('John Doe', 'johndoe@example.com');
$course1 = new Course('Math');
$course2 = new Course('English');
$student->addCourse($course1);
$student->addCourse($course2);
echo "Student ID: " . $student->getId() . "\n";
echo "Student Name: " . $student->getName() . "\n";
echo "Student Email: " . $student->getEmail() . "\n";
echo "Student Courses: \n";
foreach ($student->getCourses() as $course) {
  echo $course->getName() . "\n";
}

?>