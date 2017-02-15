<html>
	<head>
		<style type="text/css">
			body{
				width:80%;
				height:80%;
				margin:0;
				padding:0;
			}
			div.popup{
				position:fixed;
				top:0;
				bottom:0;
				left:0;
				right:0;
				background: rgba(0,0,0,.8);
			}
			div#box{
				margin:5% auto;
				background:rgba(0, 0, 0,.1);
				width:50%;
				height:45%;

			}
			a.close{
				text-decoration:none;
				color:#fb1700;
				margin:10px 15px;
				float:right;
				font-family:tahoma;
				font-size:20px;
			}
		</style>
	</head>
	<body>

		<?php

		session_start();

	    require __DIR__ . '/../vendor/autoload.php';

	    use App\Admin;

		if (!empty($_SESSION['user'])){
		    header("Location: siswa.php");
		}

	    if(isset($_POST['signin'])){
	        $act = new Admin();
	        $data = $act->getData($_POST['id']);
	        $edit = $data->fetch(PDO::FETCH_OBJ);

	        if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
	            echo "<meta http-equiv='refresh' content='1;url=admin.php'>";
	        }
	        elseif ($act->login($_POST['username'], $_POST['password'])) {
				echo "<meta http-equiv='refresh' content='1;url=siswa.php'>";
	        }
				// $act->login($_POST['username'], $_POST['password']);
	            // $_SESSION['user'] = $_POST['id'];
	    }
		?>

		<div class="popup">
			<div id="box">
				<br><br><br>
				<table align="center" style='color:#04f0e9'> <tr> <td>
		        <form name="login" action="login.php" method="POST">
			        Username:<br>
					<input type="text" name="username"><br><br>
			        <input type="password" name="password"><br><br>
			        <button type="submit" name="signin">Login</button>
		        </form> </td> </tr> </table>
			</div>
		</div>
	</body>
</html>
