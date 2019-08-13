
firebase.auth().onAuthStateChange(firebaseUser =>{
	if(firebaseUser){
		window.alert(firebaseUser);
	}else{
		window.alert('not logged in');
	}
});

function login(){

	var userEmail = document.getElementById('Email_field').value;
	var userPass = document.getElementById('Password_field').value;

	firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
	  var errorCode = error.code;
	  var errorMessage = error.message;
	  window.alert("Error in Login");

	});

}