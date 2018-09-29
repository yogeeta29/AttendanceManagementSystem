$(document).ready(function(){

	$("#sub_01").on('click',function(){
			var flag=false;
			var txtmail = $("#username").val();
			var txtpassword = $("#password").val();
			
			if(txtmail==""){
				document.getElementById("popover01").style.display="block";
				flag=true;
			}
			else{
				document.getElementById("popover01").style.display="none";
			} 
			if(txtpassword==""){
				document.getElementById("popover03").style.display="block";
				flag=true;
			}
			else{
				document.getElementById("popover03").style.display="none";
			} 		
			
			
			//alert("\nName: " + txtName + "\nAge: " + txtage + "\nContact: " + txtcontact + "\nAddress: " + txtaddress + "\nMail: " + txtmail + "\nPassword: " + txtpassword)
			
			if(flag==true){
				return false;
			}
		});
	  
   $("#username").on('change keyup',function(){
	   var email= $("#username").val();
  if($("#username").val()==""){
	document.getElementById("popover01").style.display="block";
	flag=true;
  }
  else if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
	document.getElementById("popover02").style.display="block";
	flag=true;
  }
  else{
	document.getElementById("popover02").style.display="none";
  }
  });
  
   $("#password").on('change keyup',function(){
  if($("#password").val()==""){
	document.getElementById("popover03").style.display="block";
	flag=true;
  }
  else if($("#password").val().length<=8){
	document.getElementById("popover04").style.display="block";
	flag=true;
  }
  else{
	document.getElementById("popover04").style.display="none";
  }
  }); 	
			
});