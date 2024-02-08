import { initializeApp } from "firebase/app";

//importamos la BD para trabajar con sus funciones
import { getFirestore } from "@firebase/firestore"

const firebaseConfig = {
  apiKey: "AIzaSyAxAnvxzWjkAMQioN6grrxK3SVWCBpDJT0",
  authDomain: "crud-acces.firebaseapp.com",
  projectId: "crud-acces",
  storageBucket: "crud-acces.appspot.com",
  messagingSenderId: "172429427316",
  appId: "1:172429427316:web:d1bc50059df4b96b3c0721"
};

const app = initializeApp(firebaseConfig);

//conexión a la BD
export const db = getFirestore(app);