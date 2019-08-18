<script src="https://www.gstatic.com/firebasejs/6.3.5/firebase-app.js"></script>

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.
    // var displayName = user.displayName;
    // var email = user.email;
    // var emailVerified = user.emailVerified;
    // var photoURL = user.photoURL;
    // var isAnonymous = user.isAnonymous;
    // var uid = user.uid;
    // var providerData = user.providerData;
    window.alert("Logged In");
    // ...
  } else {

  	window.alert("Not logged In");
    // User is signed out.
    // ...
  }
});

function login(){
	// body...

	var email = document.getElementById("Email_field").value();
	var password = document.getElementById("Password_field").value();
	window.alert(email);
	console.log(email);
	// firebase.auth().signInWithEmailAndPassword("mukeshgurushamy@gmail.com", "retne086").catch(function(error) {
 //  // Handle Errors here.
	//   var errorCode = error.code;
	//   var errorMessage = error.message;
	//   window.alert(errorMessage);
	//   // ...
	// });
	firebase.auth().createUserWithEmailAndPassword(email, password)
		.catch(function (err){
			window.alert("failed");
		});
}	