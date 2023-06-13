<?php

require 'Manager.php';
require 'Student.php';
require 'Course.php';

use MyApp\Services\Manager;
use MyApp\Entities\Student;
use MyApp\Entities\Course;

$manager = new Manager();


$student1 = new Student('John Doe', 'johndoe@example.com');
$student2 = new Student('Jane Doe', 'janedoe@example.com');
$manager->addStudent($student1);
$manager->addStudent($student2);


$course1 = new Course('Math');
$course2 = new Course('Science');

$student1->addCourse($course1);
$student1->addCourse($course2);
$student2->addCourse($course2);

$manager->updateStudent($student1->getId(), 'John Smith', 'johnsmith@example.com');

$manager->deleteStudent($student2->getId());

$student = $manager->getStudent($student1->getId());
echo "Student Name: " . $student->getName() . "\n";
echo "Student Email: " . $student->getEmail() . "\n";
echo "Student Courses: ";
foreach ($student->getCourses() as $course) {
  echo $course->getName() . ", ";
}
echo "\n";

$log_file = 'log.txt';
if (file_exists($log_file)) {
  echo "Log File Contents: \n";
  echo file_get_contents($log_file);
} else {
  echo "Log file not found.\n";
}

?>