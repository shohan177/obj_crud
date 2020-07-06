<?php 

namespace App\Controller;

use App\Support\Database;

class Student extends Database
{
	/**
	 * inser user information 
	 */
	public function addNewStudent($name, $email, $cell, $photo)
	{
		$photo_name = parent::fileUpload($photo,'media/student/img');



		$notification = parent::insert('students', [

			'name'      => $name,
			'email'     => $email,
			'cell'      => $cell,
			'photo'     => $photo_name

		]);

		if ($notification) {
			return '<p class="alert alert-success"> Added sucess <button class="close" data-dismiss="alert">&times;</button></p>';
		}
	}

	/**
	 * get all user data
	 */
	public function allStudent()
	{
		$data = parent:: all('students', 'DESC');
		if ($data) {
			return $data;
		}
	}

	/**
	 * delete student 
	 */

	public function delstudent($id)
	{
		$notification = parent::delete('students',$id);
		if ($notification) {
			return "<p class=\"alert alert-danger\"> Delete number <b>$id</b> data sucess  <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
		}
	}
}

