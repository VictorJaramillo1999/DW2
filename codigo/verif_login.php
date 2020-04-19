

		     
		<?php
		include_once 'user.php';
		include_once 'userlogin.php';
		include_once 'entidades/medico.php';

		 $userSession= new UserSession();
		 $user = new User();
		 $medi= new medicos();
			
			if(isset($_SESSION['name'])){
				$medi->setUser($userSession->getCurrentUser());
				include_once 'datos_medicos.php';
			}else if(isset($_POST['email']) && isset($_POST['password'])){
				$emailForm=$_POST['email'];
				$passForm=$_POST['password'];

				if($user->userExists($emailForm,$passForm)){
					$userSession->setCurrentUser($emailForm);
					$medi->setUser($emailForm);
					
					include_once 'datos_medicos.php';
				
				}else{
					$errorlogin= "<div class='alert alert-danger mt-4' role='alert'>Email or Password are incorrects!
					 <p><a href='loginmedicos.php'><strong>Please try again!</strong></a></p></div>";
					 include_once 'loginmedicos.php';
				}     
			}else{
				
				header("location:loginmedicos.php");
			}

	
			?>
		
	