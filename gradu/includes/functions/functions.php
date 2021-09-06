<?php



	/*
	** Add User Function v1.0
	** Function To Add Users To Database
	*/
	function checkLogin(){
		if (isset($_SESSION['email'])) {
			header('Location: dashboard.php'); // Redirect To Dashboard Page
			exit();
	  }
	}

	/*
	** Add User Function v1.0
	** Function To Add Users To Database
	*/
	function checkNoLogin(){
		if (!isset($_SESSION['email'])) {
			header('Location: login.php'); // Redirect To Dashboard Page
			exit();
	  }
	}

	/*
	** Add User Function v1.0
	** Function To Add Users To Database
	*/

	function addUser(  $email , $password , $first , $last , $phone){
		global $con;
		$theMsg = '';

		
		
		// Check If User Exist in Database
		$userExist = checkItem('email', 'users', $email);



		$formErrors = array();

		if (empty($first)) {
			$formErrors[] = 'First Name Shoudnt Be <strong>Empty</strong>';
		  }
		if (empty($last)) {
			$formErrors[] = 'Last Name Shoudnt Be <strong>Empty</strong>';
		  }
		if (empty($email)) {
			$formErrors[] = 'Email Shoudnt Be <strong>Empty</strong>';
		  }
		if($userExist > 0){
			$formErrors[] = 'There Is Email With The Same Name Please <strong>Change it</strong>';
		}
		if (empty($password)) {
			$formErrors[] = 'Password  Shoudnt Be <strong>Empty</strong>';
		  }
		
		
		



		
		
		
		  
		if (empty($formErrors)) {

			//Password hash 

			$hashedPassword = sha1($password);

			
			

			
			// Insert Userinfo In Database
	  
			$stmt = $con->prepare("
									INSERT INTO 
									users(first_name, last_name, email, password, phone_number )
						  			VALUES( '$first' , '$last' , '$email' , '$hashedPassword' , '$phone' ) ");
									  
			
			$stmt->execute();


			  
	
			  // Echo Success Message
	  
			  $theMsg = '
			  <div class="card  border-bottom-success" bis_skin_checked="1">
			  <div class="card-body text-center" bis_skin_checked="1">
			  You Have Been Succefuly Register 
			  </div>
			</div>';

			header("refresh:1;url='dashboard.php'");

			exit();
			
		  }
		  if(!empty($formErrors)){
			echo '<div class="card  border-bottom-info text-center" bis_skin_checked="1">
			<div class="card-body" bis_skin_checked="1">' ;
			foreach($formErrors as $error) {
			  echo $error . '<br>';
			}
			echo '</div></div>';
			}
		echo $theMsg;
		




	}


	/*
	** login User Function v1.0
	** Function To login Users 
	*/

	function loginUser($email , $password){
		global $con;
		
		

		$formErrors = array();

		
		if (empty($email)) {
			$formErrors[] = 'Email Shoudnt Be <strong>Empty</strong>';
		  }
		
		if (empty($password)) {
			$formErrors[] = 'Password 1 Shoudnt Be <strong>Empty</strong>';
		  }
		
		



		
		
		
		  
		if (empty($formErrors)) {

			//Password hash 

			$hashedPassword = sha1($password);

			$stmt = $con->prepare("SELECT 
											*
											FROM 
											users 
											WHERE 
											email = ? 
											AND 
											password = ? 
											
											LIMIT 1");

					$stmt->bind_param('ss', $email, $hashedPassword);
					// $stmt->execute(array($email, $hashedPassword));
					$stmt->execute();

					// $row = $stmt->fetch();
					// $count = $row->num_rows;
					$count = $stmt->fetch();

					// $count = $stmt->rowCount();

					// If Count > 0 This Mean The Database Contain Record About This Username

					if ($count > 0) {
						
						$_SESSION['id'] = $row['id']; // Register Session ID
						$_SESSION['first_name'] = $row['first_name'];
						$_SESSION['email'] = $email; // Register Session Name
						//$_SESSION['group_id'] = $row['group_id']; // Register Session Name
						// if($row['group_id'] == 0){
						// 	header('Location: index.php'); // Redirect To Dashboard Page
						// 	exit();
						// }elseif($row['group_id'] == 1){
						// 	header('Location: admin_index.php'); // Redirect To Dashboard Page
						// 	exit();
						// }

						header('Location: dashboard.php'); // Redirect To Dashboard Page
							exit();
						
					}else{
						
						$formErrors[] = '<strong>Email or password</strong> is wrong !';
					
					}
			  
	  
		  }
		  if(!empty($formErrors)){
			echo '<div class="card  text-white bg-danger border-bottom-info text-center" bis_skin_checked="1">
			<div class="card-body" bis_skin_checked="1">' ;
			foreach($formErrors as $error) {
			  echo $error . '<br>';
			}
			echo '</div></div>';
			}
		










	}



	

	/*
	** Title Function v1.0
	** Title Function That Echo The Page Title In Case The Page
	** Has The Variable $pageTitle And Echo Defult Title For Other Pages
	*/

	function getTitle() {

		global $pageTitle;

		if (isset($pageTitle)) {

			echo $pageTitle;

		} else {

			echo 'Default';

		}
	}

	/*
	** Home Redirect Function v2.0
	** This Function Accept Parameters
	** $theMsg = Echo The Message [ Error | Success | Warning ]
	** $url = The Link You Want To Redirect To
	** $seconds = Seconds Before Redirecting
	*/

	function redirectHome($theMsg, $url = null, $seconds = 0) {

		if ($url === null) {

			$url = 'index.php';

			$link = 'Homepage';

		} else {

			if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

				$url = $_SERVER['HTTP_REFERER'];

				$link = 'Previous Page';

			} else {

				$url = 'index.php';

				$link = 'Homepage';

			}

		}

		echo $theMsg;

		echo "<div class='alert alert-info'>You Will Be Redirected to $link After $seconds Seconds.</div>";

		header("refresh:$seconds;url=$url");

		exit();

	}

	/*
	** Check Items Function v1.0
	** Function to Check Item In Database [ Function Accept Parameters ]
	** $select = The Item To Select [ Example: user, item, category ]
	** $from = The Table To Select From [ Example: users, items, categories ]
	** $value = The Value Of Select [ Example: Osama, Box, Electronics ]
	*/

	
	function checkItem($select, $from, $value) {

		global $con;


		$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

		$statement->bind_param('s', $value);

		$statement->execute();

		$count = $statement->fetch();
		

		return $count;

	}

	/*
	** Count Number Of Items Function v1.0
	** Function To Count Number Of Items Rows
	** $item = The Item To Count
	** $table = The Table To Choose From
	*/

	function countItems($item, $table) {

		global $con;

		$stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

		$stmt2->execute();

		return $stmt2->fetchColumn();

	}

	function countPendingRent($item, $table) {

		global $con;

		$stmt2 = $con->prepare("SELECT COUNT($item) FROM $table WHERE status = 0");

		$stmt2->execute();

		return $stmt2->fetchColumn();

	}


	/*
	** Get Latest Records Function v1.0
	** Function To Get Latest Items From Database [ Users, Items, Comments ]
	** $select = Field To Select
	** $table = The Table To Choose From
	** $order = The Desc Ordering
	** $limit = Number Of Records To Get
	*/

	function getLatest($select, $table, $order, $limit = 5) {

		global $con;

		$getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

		$getStmt->execute();

		$rows = $getStmt->fetchAll();

		return $rows;

	}