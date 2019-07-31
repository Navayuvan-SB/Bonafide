firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
  } else {
    // No user is signed in.
  }
});


function login(){

	var userEmail = document.getElementById('Email_field').value;
	var userPass = document.getElementById('Password_field').value;

}