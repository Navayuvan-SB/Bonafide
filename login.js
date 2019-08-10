function login(){

	var userEmail = document.getElementById('Email_field').value;
	var userPass = document.getElementById('Password_field').value;

	firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
	  var errorCode = error.code;
	  var errorMessage = error.message;
	});

	firebase.auth().onAuthStateChange(firebaseUser =>{
		if(firebaseUser){
			console.log(firebaseUser);
		}else{
			console.log('not logged in');
		}
	});

}