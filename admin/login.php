<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
     // header("location:home.php");  
 }  
 
 ?>
<html>
    <head>
        <title>Sun Shine</title>
		<style>
		
		.main{
			position:relative;
		}
		
		.name{
		position:absolute;
		top:20%;
		left:40%;
		}
		
		.name h1{
		color:white;
		latter-spacing:10px;
		font-size:100px;
		}
		
		li a{
		color:white;
		text-decoration:none;
		}
		
		
		#login{
		background:black;
		height:200px;
		width:400px;
		position:absolute;
		top:50%;
		left:40%;
		padding:1px;;
		opacity:0.7;
		padding-left:7	0px
		
		}
		
		p {
		  line-height: 1.5em;
		}
				
		.q{
		opacity:0.7;
		position:absolute;
		top:30%;
		left:2%;
		height:300px;
		width:350px;
		background-color:black;
		}
		.q li{
		color:white;
		}
		.clearfix {
		  *zoom: 1;
		}
		.clearfix:before, .clearfix:after {
		  content: ' ';
		  display: table;
		}
		.clearfix:after {
		  clear: both;
		}
		
		
		</style>
		
		<link rel="stylesheet" href="css/font-awesome.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
		
        <div class="main">
            <img src="maxresdefault.jpg" alt="" style="height: 630px;width: 1350px"/>
			
		<div class="name"><h1>Sun Shine</h1></div>
		</div>
		
		
		<div id="login">

        <form method="post">

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text"  name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" name="sub"  value="Login"></p>

          </fieldset>

        </form>
		</div>
		<div class="q">
		<ul>
		<div class="p1"><li><h1>Our Services</h1></li></div>
		<div class="p2"><li><p>Pure veg</p></li></div>
		<div class="p3"><li><p>100% hygenic</p></li></div>
		<div class="p4"><li><p>lowest cost</p></li></div>
		<div class="p5"><li><p>summer special offers</p></li></div>
		</ul>
		</div>
		</div>
    </body>
</html>
<?php
   include('db.php');
  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['user']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      
      $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         
         header("location: home.php");
      }else {
         echo '<script>alert("Your Login Name or Password is invalid") </script>' ;
      }
   }
?>
