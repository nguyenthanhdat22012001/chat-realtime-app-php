const formLogin = document.querySelector(".login form"),
continueBtn = formLogin.querySelector(".button input"),
errorText = formLogin.querySelector(".error-text");

formLogin.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        console.log("state = "+xhr.readyState)
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href = "users.php";
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
          else{
            console.log("Error", xhr.statusText);
          }
      }
    }
    let formData = new FormData(formLogin);
    console.log(formData)
    xhr.send(formData);
}