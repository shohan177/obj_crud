<?php 

namespace App\Controller;

use App\Support\Database;

class Student extends Database
{
	
	public function AddNewStudent($name, $email, $cell, $photo)
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
}

