function validate()
{
	var nameFormat = /[a-zA-Z]+$/;
	var pwd = document.forms["add_user_form"]["password"].value;
	var cpwd = document.forms["add_user_form"]["confirm_password"].value;
	var getTextID = document.getElementById("alert_validate_text");
	if(!nameFormat.test(firstname))
		{
			getTextID.innerHTML = "<Strong>Wrong Name Format!</strong>";
			document.getElementById("alert_validate").style.display="block";
			return false;
		}
	else if(pwd==null||pwd==""||cpwd==null||cpwd=="")
		{
			getTextID.innerHTML = "<Strong>Passwords Don't Match!</strong>";
			document.getElementById("alert_validate").style.display="block";
			return false;
		}	
}