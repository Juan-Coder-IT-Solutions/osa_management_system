// Import the functions you need from the SDKs you need
// import { initializeApp } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js";
// import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.0.2/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
importScripts(
  "https://www.gstatic.com/firebasejs/10.4.0/firebase-app.js"
);
importScripts(
  "https://www.gstatic.com/firebasejs/10.4.0/firebase-analytics.js"
);

const firebaseConfig = {
  apiKey: "AIzaSyAx2VWecduWycQ8FUOZ0-q1S6ma9xiPjBo",
  authDomain: "osa-management-system.firebaseapp.com",
  databaseURL: "https://osa-management-system-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "osa-management-system",
  storageBucket: "osa-management-system.appspot.com",
  messagingSenderId: "827737901579",
  appId: "1:827737901579:web:18b07432d102201bc7950e",
  measurementId: "G-XVZ3BJMVDH"
};

firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

// messaging.setBackgroundMessageHandler(function (payload) {
//   console.log(payload);
//   const notification = JSON.parse(payload);
//   const notificationOption = {
//     body: notification.body,
//     icon: notification.icon,
//   };
//   return self.registration.showNotification(
//     payload.notification.title,
//     notificationOption
//   );
// });

// messaging.onBackgroundMessage((payload) => {
//   console.log(
//     "[firebase-messaging-sw.js] Received background message ",
//     payload
//   );
//   // Customize notification here
//   const notificationTitle = "Background Message Title";
//   const notificationOptions = {
//     body: "Background Message body.",
//     icon: "/firebase-logo.png",
//   };

//   self.registration.showNotification(notificationTitle, notificationOptions);
// });
const isSupported = firebase.messaging.isSupported();
if (isSupported) {
  const messaging = firebase.messaging();
  messaging.onBackgroundMessage((payload) => {
    console.log(
      "[firebase-messaging-sw.js] Received background message ",
      payload
    );
    // Customize notification here
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
      body: "Background Message body.",
      icon: "/firebase-logo.png",
    };

    self.registration.showNotification(notificationTitle, notificationOptions);
  });
}
