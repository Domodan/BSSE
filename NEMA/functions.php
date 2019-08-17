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
	function add_collection ($author, $title, $type, $file_type, $file_name, $description) {
		global $connect;
		$sql = sprintf("INSERT INTO Collections(`Author`, `Title`, `Type`, `File_Type`, `File_Name`, `Description`) VALUES('%s', '%s', '%s', '%s', '%s', '%s')",
		$author, $title, $type, $file_type, $file_name, $description);
		// if(isset($edit_id)) {
		// 	$sql = sprintf("UPDATE Collections SET `Type`='$type',`Title`='$title',`Author`='$author',`Number`='$number' WHERE `id`='$edit_id'");
		// }

		mysqli_query($connect, $sql);

		return true;
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

		$sql = sprintf("SELECT id, is_Admin FROM Members WHERE Username = '%s' AND Password = '%s'", $username, $password);

		$result = mysqli_query($connect, $sql);
		if(mysqli_num_rows($result) == 0){
			return false;
		}
		else {
			$row = mysqli_fetch_array($result);

			if($row['is_admin'] == TRUE) {
				$_SESSION['is_admin'] = TRUE;
			}
			$_SESSION['member_id'] = $row['id'];

			return true;
		}
	}

?>
