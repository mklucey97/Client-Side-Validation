/**
 * File: main.js
 * Author: Mary Lucey
 * Date: 07-31-2025
 * Description: This JavaScript file provides client-side functionality including
 *              form validation and clearing input fields for Assignment 5.
 *              Linked to title.html as part of the Mustache-templated PHP project.
 * 
 * Assignment 5: Client Side Validation
 */
 
 "use strict";
 
 function clearForm() {
	 document.getElementById("title").value = "";
	 document.getElementById("favdrink").value = "";
	 document.getElementById("pname").value = "";
	 document.getElementById("favfictionalplace").value = "";
	 document.getElementById("favrealplace").value = "";
	 document.getElementById("email").value = "";
	 document.getElementById("msg").innerHTML = "<br>";
 }

 function validate() {
	 let errorMessage = "";
	 
	 let title = document.getElementById("title").value.trim();
	 let drink = document.getElementById("favdrink").value.trim();
	 let pname = document.getElementById("pname").value.trim();
	 let fiction = document.getElementById("favfictionalplace").value.trim();
	 let real = document.getElementById("favrealplace").value.trim();
	 let email = document.getElementById("email").value.trim();
	 
	 document.getElementById("title").value = title;
	 document.getElementById("favdrink").value = drink;
	 document.getElementById("pname").value = pname;
	 document.getElementById("favfictionalplace").value = fiction;
	 document.getElementById("favrealplace").value = real;
	 document.getElementById("email").value = email;
	 
	 if (!title) errorMessage += "Title name cannot be empty.<br>";
	 if (!drink) errorMessage += "Favorite drink cannot be empty.<br>";
	 if (!pname) errorMessage += "Pet name cannot be empty.<br>";
	 if (!fiction) errorMessage += "Fictional place cannot be empty.<br>";
	 if (!real) errorMessage += "Real place cannot be empty.<br>";
