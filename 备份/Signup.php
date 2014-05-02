<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Pinterest</title>
 <link href="Signup.css" rel="stylesheet" type="text/css">
 
 <script type="text/javascript" src="jquery-1.10.2.js"></script>
 
<script type="text/javascript">
$(document).ready(function(){
	

     
    //$(".firstname").focus();              //自动载入焦点
	
	  $(".firstname").focusout(function() {
    if($(this).val().length==0){
		$(this).css("border-color","red");
		$(this).css("color","red");
		$(this).css("font-size","inherit");				
		
		$(this).css("background-color","white");
	} 
	
			  if($(".firstname").val().length && $(".email").val().length && $(".password").val().length ){
			  
			 
					  
					  document.getElementById("Sign_up").disabled=false;
					    $("#Sign_up").css("background-color","red");
					  
					
			 }	 
			  
			  
			
	
	
	});
	
	  $(".firstname").focus(function() {
        $(this).attr("value","");
		$(this).css("color","black");
		$(this).css("border-color","white");
    });  
	
	$(".email").focusout(function() {
    if($(this).val().length==0){
		$(this).css("border-color","red");
		$(this).css("color","red");
		$(this).css("font-size","inherit");		
		$(this).css("background-color","#FFF");		
		
	} 
	
		  if($(".firstname").val().length && $(".email").val().length && $(".password").val().length ){
			  
			 
					  
					  document.getElementById("Sign_up").disabled=false;
					    $("#Sign_up").css("background-color","red");
					  
					
			 }
			  
	});   
	$(".email").focus(function() {
        $(this).attr("value","");
		$(this).css("color","black");
		$(this).css("border-color","white");
    });   
	$(".password").focusout(function() {
    if($(this).val().length==0){
		$(this).css("border-color","red");
		$(this).css("color","red");
		$(this).css("background-color","#FFF");
		$(this).css("font-size","inherit");				
		
	} 
	
		  if($(".firstname").val().length && $(".email").val().length && $(".password").val().length ){
			  
			 
					  
					  document.getElementById("Sign_up").disabled=false;
					    $("#Sign_up").css("background-color","red");				  
					
			 }
			 else {
				  document.getElementById("Sign_up").disabled=true;
				  $("#Sign_up").css("background-color","white");	
				 
				 }
			 
			
			  
	});   
	$(".password").focus(function() {
        $(this).attr("value","");
		$(this).css("color","black");
		$(this).css("border-color","white");
    });   
	
	$("#female").click(function() {
		
		var k= document.getElementById("female")
		if(k.value=="female"){
			document.getElementById("male").checked=false;
						}						

        
    });
	$("#male").click(function() {
		
		var k= document.getElementById("male")
		if(k.value=="male"){
			document.getElementById("female").checked=false;
						}						

        
    });
	

 
  
  

});



  
</script>
 
 
</head>


<?php


ini_set("error_reporting","E_ALL & ~E_NOTICE"); 





if ($_POST['Cancel'])
{
	header("location:index.php");
	}
	else if ($_POST['Sign_up'])
	{
		
		
		
		
		
		
		
		if($_POST['female'])
				$gender="female";
		
		
		else if ($_POST['male'])
		
		$gender="male";
		
		
		include("conn.php");
		
		$sql= "insert into user (username,lastname,email,password,country,gender) values ('".$_POST[first_name]."','".$_POST[last_name]."','".$_POST[email_address]."',
		'".$_POST[password]."','".$_POST[country]."','".$gender."')";
		
		 mysql_query($sql);
		//echo"$sql";		
		mysql_close();
		
		
		
	//header("location:index.php");      //日后修改
	}

?> 




<body>




<form method="post" name="sign">
 <h1 class=h1class>
                    Sign up with Email            
  </h1>
  
  
  
 <div class="fontsize">        
        
 <input name="first_name" type="text" autofocus required class="firstname" placeholder="First Name" value="" >  
  <input class="lastname" type="text" name="last_name" placeholder="Last Name" value="">  
   <input name="email_address" type="text" required class="email" placeholder="Email Adress" value="">  <br>
   <input class="password" type="password" name="password" placeholder="Password" value="">  <br>
   <select class="country" name="country">  
   <option value="US" 
                    selected="selected"
        >
        United States 
            </option>
    <option value="CN" 
        >
        China (中国) 
            </option>      
            </select>
            <br>
            
 <div class="back">      
            
 <input name="female" type="radio" value="female" id="female" > <font class="gender">Female</font>
  <input name="male" type="radio" value="male" id="male" checked="true">   <font class="gender">Male</font>
   </div>  
   
   
    
 </div>   
 <div class="back">            
 By creating an account, I accept Pinterest's Terms of Service and Privacy Policy.    
  </div>    
  
  <div class="bottom">
  
  
 
  <div class="buttonuphead">
  <input class="button" type="submit" id="Cancel" name="Cancel" value="Cancel">
   <input name="Sign_up" type="submit" disabled="disabled" class="button"  id="Sign_up" value="Sign up">
   </div> 

  
  </div>          
      
</form>
<button>按钮</button>
</body>
</html>