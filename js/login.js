
//firebase.auth().onAuthStateChange(firebaseUser =>{
//	if(firebaseUser){
//		window.alert(firebaseUser);
//	}else{
//		window.alert('not logged in');
//	}
//});

//function login(){

//	const userEmail = signupForm['Email_field'].value;
//	const userPass = signupForm['Password_field'].value;

//	firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
//	  var errorCode = error.code;
//	  var errorMessage = error.message;
//	  window.alert("Error in Login");

//	});

//}


const loginform = document.querySelector('#login_fun');
loginform.addEventListener('sumbit' , (e) => {
	e.preventDefault();

	const Email = loginform['Email_field'].value;
	const Password = loginform['Password_field'].value;

	auth.signInWithEmailAndPassword(Email, Password).then(cred => {
		
		const modal = document.querySelector('#log');
		M.Modal.getInstance(modal).close();
		loginform.reset();

		loginform.querySelector(.'error').innerHTML = '';
	}).catch(err => {
		loginform.querySelector(.'error').innerHTML = err.message;
	});
});