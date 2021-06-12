$(document).ready(function() {
	"use strict";
	var password1 		= $('#password1'); //id of first password field
	var password2		= $('#password2'); //id of second password field
	var passwordsInfo 	= $('#pass-info'); //id of indicator element

	passwordStrengthCheck(password1,password2,passwordsInfo); //call password check function

});

function passwordStrengthCheck(password1, password2, passwordsInfo)
{
	//Must contain 5 characters or more
	var WeakPass = /(?=.{5,}).*/;
	//Must contain lower case letters and at least one digit.
	var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/;
	//Must contain at least one upper case letter, one lower case letter and one digit.
	var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/;
	//Must contain at least one upper case letter, one lower case letter and one digit.
	var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/;

	$(password1).on('keyup', function(e) {
		if(VryStrongPass.test(password1.val()))
		{
			passwordsInfo.removeClass().addClass('vrystrongpass').html("بسیار عالی میباشد.");
		}
		else if(StrongPass.test(password1.val()))
		{
			passwordsInfo.removeClass().addClass('strongpass').html("(قوی! (حرف های خاصی را وارد کنید تا حتی قوی تر شود");
		}
		else if(MediumPass.test(password1.val()))
		{
			passwordsInfo.removeClass().addClass('goodpass').html("خوب است ! بهتر است ترکیب عدد و حرف هم داشته باشید.");
		}
		else if(WeakPass.test(password1.val()))
    	{
			passwordsInfo.removeClass().addClass('stillweakpass').html("هنوز ضعیف است! بهتر عددهم استفاده کنید");
    	}
		else
		{
			passwordsInfo.removeClass().addClass('weakpass').html("خیلی ضیف! بهتر بیش از 5 رقم باشد.");
		}
	});

	$(password2).on('keyup', function(e) {
		if(password1.val() !== password2.val())
		{
			passwordsInfo.removeClass().addClass('weakpass').html("رمز عبور همسان نیست!");
		}else{
			passwordsInfo.removeClass().addClass('goodpass').html("رمز عبور همسان است");
		}

	});
}
