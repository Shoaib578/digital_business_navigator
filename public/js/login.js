var tab = document.getElementsByClassName("tab");
var signupDiv = document.getElementById("signup")
var loginDiv = document.getElementById("login")


document.getElementById("login_turn").onclick = ()=>{
  tab[1].classList.add("active")
  tab[0].classList.remove("active")

  signupDiv.style.display = "none"	

  loginDiv.style.display = "block"
}


document.getElementById("signup_turn").onclick = ()=>{
  tab[1].classList.remove("active")
  tab[0].classList.add("active")

  signupDiv.style.display = "block"	

  loginDiv.style.display = "none"
  
}
