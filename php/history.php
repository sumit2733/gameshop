<html>
<head>
<title>Games Shop</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Games Center Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/modernizr.custom.js"></script>
	<link rel="stylesheet" type="text/css" href="css/component.css" />
</head>
<body> 
<!--header-->	
<div class="header" >
		
		</div>
		<!---->
	
		<div class="header-top">
		<div class="container">
		<div class="head-top">
			<div class="logo">
			
				<h1><a href="index.html"><span> G</span>ames <span>C</span>enter</a></h1>
				
			</div>
		<div class="top-nav">		
			  <span class="menu"><img src="images/menu.png" alt=""> </span>
				
					<ul>
						<li class="active"><a class="color1" href="home.php"  >Home</a></li>
						<li><a class="color2" href="games.php"  >Games</a></li>
						<li><a class="color6" href="contact1.php" >Contact</a></li>
					<li>
					<form style="margin-top:5px;" action="search.php" method="post">
						<input type="text" value="search games" name="game" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'search about something ?';}" >
						<input type="submit" name="search" value="Search" style="background:green;" >
					</form>
				</li>
						<li><a class="color3" href="logout.php"  >Log Out</a></li>
				
					</ul>
                </div>
				</div>
				</div>
				</div>
</body>
</html>

 <?php  
 session_start();
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1)
{

//Connect to mysql server 
$link = mysql_connect('localhost','root','');
//Check link to the mysql server 
if(!$link){ 
die('Failed to connect to server: ' . mysql_error()); 
} 
//Select database 
$db = mysql_select_db('Gameshop');
if(!$db){ 
die("Unable to select database"); 
} 
//Prepare query 	
$Customer =$_SESSION['USER_ID'];
$query ="SELECT Cust_id,Game_name
         From History,Game
		 WHERE History.Game_id=Game.Game_id
		   AND Cust_id= '$Customer'";
//Execute query 
$result = mysql_query($query);
echo "<center><h1>History of Customer</h1>";
echo "<table border='1' cellpadding = '10'> 
<tr><th>User Id</th>
<th>Game Name</th>   
</tr>"; 

while($row = mysql_fetch_array($result)) 
 
{ 
echo "<tr><td>" . $row['Cust_id'] . "</td> 
<td>" . $row['Game_name']."</td>   
</tr>"; 
echo "<br/>"; 
} 
echo "</table></center>";
}



else 
{ 
include("login.html"); 
echo "<center>Enter the customer name</ center>"; 
}  
?>