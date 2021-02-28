<?php
function getAssignmentGrade($assignmentGrade){
    if($assignmentGrade >= 90){
        return 'A';
    } elseif($assignmentGrade >= 80){
        return 'B';
    } elseif ($assignmentGrade >= 70){
        return 'C';
    } elseif ($assignmentGrade >= 60){
        return 'D';
    } else {
        return 'F';
    }
}