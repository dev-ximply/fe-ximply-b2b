// Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyA0WzUUU0LTJSBkuePOgU1XggVvxgwYFFc",
    authDomain: "laravel-login-jwt.firebaseapp.com",
    projectId: "laravel-login-jwt",
    storageBucket: "laravel-login-jwt.appspot.com",
    messagingSenderId: "203312470034",
    appId: "1:203312470034:web:68d788b555997d2bbba0cb",
    measurementId: "G-8Q3C870MEJ"
  };

  // Initialize Firebase
firbase.app = initializeApp(firebaseConfig);
// firebase.analytics = getAnalytics(app);

//google sign in
var googleProvider = new firebase.auth.GoogleAuthProvider();