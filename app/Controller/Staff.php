<?php 

namespace App\Controller;

use App\Support\Database;

class Staff extends Database
{


	/**
	 * get all user data
	 */
	public function allStaff()
	{
		$data = parent:: all('staffs', 'DESC');
		if ($data) {
			return $data;
		}
	}

	public function delStaff($id)
	{
		$notification = parent::delete('staffs',$id);
		if ($notification) {
			return "<p class=\"alert alert-danger\"> Delete number <b>$id</b> data sucess  <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
		}
	}

	/**
	 * view single student 
	 */

	public function viewStaff($id)
	{
		$data = parent::find('staffs',$id);
		return $data -> fetch_assoc();
	
	}

	/**
	 * update student 
	 */
	public function updateStaff($id,$name, $email, $cell, $photo, $photo_status)
	{
		if ( $photo_status == "new") {
			$photo_name = parent::fileUpload($photo,'media/student/img');
		}else{
			$photo_name = $photo;
		}

		$data = parent::update('staffs',$id, [

			'name'      => $name,
			'email'     => $email,
			'cell'      => $cell,
			'photo'     => $photo_name

		]);

		if ($data) {

			return "<p class=\"alert alert-danger\"> update sucessfull data sucess  <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
		}
	}
}