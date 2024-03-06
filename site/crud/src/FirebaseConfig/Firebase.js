// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getFirestore } from "@firebase/firestore";

const firebaseConfig = {
  apiKey: "AIzaSyCVCvedTinyUadvsyHbEoI7hMwypNnGpT4",
  authDomain: "accessguard-459d3.firebaseapp.com",
  projectId: "accessguard-459d3",
  storageBucket: "accessguard-459d3.appspot.com",
  messagingSenderId: "147602161004",
  appId: "1:147602161004:web:7d81b2574dd85bf3ed4749",
  measurementId: "G-PJPJ8GCM1W"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
export const db = getFirestore(app);