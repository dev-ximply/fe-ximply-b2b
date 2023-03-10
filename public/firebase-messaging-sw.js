// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js");
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyA-XZ2C5Gp6UdzjnE5aMDTqQzYZIB-bf_A",
    authDomain: "push-notification-632ee.firebaseapp.com",
    projectId: "push-notification-632ee",
    storageBucket: "push-notification-632ee.appspot.com",
    messagingSenderId: "160051766452",
    appId: "1:160051766452:web:e33349f818113aa124a3e1",
    measurementId: "G-1MTY8S4D2P",
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(title, options);
});
