const formSigup = document.querySelector(".signup form"),
continueBtn = formSigup.querySelector(".button input"),
errorText = formSigup.querySelector(".error-text");

//console.log(email);
formSigup.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
  var fname = formSigup.querySelector('input[name="fname"]').value;
var lname = formSigup.querySelector('input[name="lname"]').value;
var email = formSigup.querySelector('input[name="email"]').value;
var password = formSigup.querySelector('input[name="password"]').value;
    let xhr = new XMLHttpRequest();
    console.log(xhr)
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              
              if(data == "success"){
                location.href="users.php";
               //console.log(data);
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }else{
            console.log("Error", xhr.statusText);
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    let formData = new FormData(formSigup);
    console.log(formData)
    xhr.send("fname="+fname+"&lname="+lname+"&email="+email+"&password="+password);
   // console.log(email);
}