function checkadduser(){
		if (document.formadd.username.value=="") {
			alert('username not null');
			document.formadd.username.focus();
			return false;
		};
		if (document.formadd.password.value=="") {
			alert('password not null');
			document.formadd.password.focus();
			return false;
		};
		if (document.formadd.repassword.value != document.formadd.password.value)
		{
			alert('re-password not same');
			document.formadd.repassword.focus();
			return false;
		}
		if (document.formadd.email.value=="") {
			alert('mail not null');
			document.formadd.email.focus();
			return false;
		}
		if (document.formadd.firstname.value=="") {
			alert('first name not null');
			document.formadd.firstname.focus();
			return false;
		}
		if (document.formadd.lastname.value=="") {
			alert('last name not null');
			document.formadd.lastname.focus();
			return false;
		}
		return true;
	}
function checkmail(e){
		var loi = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
		var kt=loi.test(e.value);
		if (kt==false) {
			alert('Mail Invalid');
			e.select();
		};
		return kt;
	}
function checkpost(){
		if (document.formadd.tittle.value=="") {
			alert('title not null');
			document.formadd.tittle.focus();
			return false;
		};
		if (document.formadd.contentt.value=="") {
			alert('conttentt not null');
			document.formadd.conttentt.focus();
			return false;
		};
		if (document.formadd.imagess.value==""){
			alert('imagess not null');
			document.formadd.imagess.focus();
			return false;
		}
		return true;
	}
function checklogin(){
	if (document.formadd.username.value=""){
		alert('username not null');
		document.formadd.password.focus();
		return false;
	};
	if(document.formadd.password.value=""){
		alert('password not null');
		document.formadd.password.focus();
		return false;
	}
	return true;
	}
}
