<?php
	ob_start();
	session_start();

	$connect = mysqli_connect('localhost', 'root', '', 'NEMA');

	//Add Members to the Database
	function add_member ($fname, $lname, $username, $email, $telephone, $gender, $password) {
		global $connect;

		$sql = sprintf("INSERT INTO Members(`First Name`, `Last Name`, `Username`, `Email`, `Telephone`, `Gender`, `Password`) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
		$fname, $lname, $username, $email, $telephone, $gender, $password);

		mysqli_query($connect, $sql);
	}

	//Add Collections to the Database
	function add_collection ($author, $title, $type, $file_name, $description, $edit_id) {
		global $connect;

		$sql = sprintf("INSERT INTO Collections(`Author`, `Title`, `Type`, `File_Name`, `Description`) VALUES('%s', '%s', '%s', '%s', '%s')",
		$author, $title, $type, $file_name, $description);

		if(isset($edit_id) && $edit_id > 0) {
			$sql = sprintf("UPDATE `Collections` SET `Author`='$author', `Title`='$title', `Type`='$type', `File_Name`='$file_name', `Description`='$description' WHERE `id`='$edit_id'");
		}

		if(mysqli_query($connect, $sql)) {
			return true;
		}else {
			return false;
		}
	}

	// Submit and Store the Question in the Database
	function submit_question($question, $user_id) {
		global $connect;

		$sql = sprintf("INSERT INTO Messages (`Question`, `User_id`) VALUES ('%s', '%d')", $question, $user_id);
		var_dump(isset($_SESSION['is_Admin']));

		if(isset($_SESSION['is_Admin'])) {
			$sql = sprintf("INSERT INTO Messages (`Question`, `User_id`, `Status`) VALUES ('%s', '%d', 'Answered')", $question, $user_id);
		}

		if(mysqli_query($connect, $sql)) {
			return true;
		}
	}

	//Clean User Input before putting into the Database
	function clean_data($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}

	//Log Members Into the system
	function login_successful($username, $password){
		global $connect;

		$sql = sprintf("SELECT id, is_admin FROM Members WHERE Username = '%s' AND Password = '%s'", $username, $password);

		$result = mysqli_query($connect, $sql);

		if(mysqli_num_rows($result) == 0){

			return false;
		}
		else {
			$row = mysqli_fetch_array($result);

			if($row['is_admin'] == TRUE) {
				$_SESSION['is_Admin'] = TRUE;
			}
			$_SESSION['member_id'] = $row['id'];

			return true;
		}
	}

?>
