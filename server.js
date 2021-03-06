     // Import the functions you need from the SDKs you need
      import {initializeApp}  from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
      import  {getAnalytics}  from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
      



      //import {  } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
      //import {  } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
      // TODO: Add SDKs for Firebase products that you want to use
      // https://firebase.google.com/docs/web/setup#available-libraries
    
      // Your web app's Firebase configuration
      // For Firebase JS SDK v7.20.0 and later, measurementId is optional
      const firebaseConfig = {
        apiKey: "AIzaSyBrovLUtIff15JyTx_7FbifhO5QBA2YKgM",
        authDomain: "pruebacanbus.firebaseapp.com",
        databaseURL: "https://pruebacanbus-default-rtdb.firebaseio.com",
        projectId: "pruebacanbus",
        storageBucket: "pruebacanbus.appspot.com",
        messagingSenderId: "391775351194",
        appId: "1:391775351194:web:3ac9a2a73675f21c9dca23",
        measurementId: "G-1ZVR73393X"
      };
  
      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      const analytics = getAnalytics(app);
    
   

      import { getDatabase, ref, child, get } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-database.js";

      const dbRef = ref(getDatabase());
      get(child(dbRef, `datos_auto/`)).then((snapshot) => {
        if (snapshot.exists()) {
          console.log(snapshot.val());
        } else {
          console.log("No data available");
        }
      }).catch((error) => {
        console.error(error);
      });

