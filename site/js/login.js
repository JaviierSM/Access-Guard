import { ManageAccount } from './firebaseconect.js';

document.getElementById("formulario-sesion").addEventListener("submit", (event) => {
  event.preventDefault();

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  const account = new ManageAccount();
  account.authenticate(email, password);

  if (!email.includes("@admin.com")) {
    alert("Usted no puede entrar aquí")
  }else{
    window.location.href = 'http://localhost:3000/'; // cuando se aloje el proyecto en un host, se cambiará esta ruta
  }

  
});

console.log('Formulario de Inicio de Sesión');