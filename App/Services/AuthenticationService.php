<?php 

namespace App\Services;
use App\Models\User;

class AuthenticationService
{
	public function attempt($email, $password)
	{
		// get the user with the matching email
		try{
		  $user = User::findBy('email', $email);
		} catch (ModelNotFoundException $e){
			echo "error";
		}

		//compare passwords
		if($this->comparePassword($password, $user)){
				echo "success!";
				return true;			
			}
			return false;
	}

	private function comparePassword($password, User $user)
	{
		if (password_verify($password, $user->password)) {
			return true;
		}
		return false;
	}
}