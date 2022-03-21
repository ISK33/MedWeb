var profileIcon = document.getElementById("profile-icon");
var profileLink = document.getElementById("profileLink");
var userLogedIn = document.getElementById("userLogedIn");
//execute after Dom loaded
document.addEventListener('DOMContentLoaded',function(){
  //check user type doctor or user
  if(sessionStorage.getItem('log')){
  if(sessionStorage.getItem('logAs') === 'user'){
      profileLink.setAttribute("href","profile.html");

    }else if(sessionStorage.getItem('logAs') === 'doctor'){
      profileLink.setAttribute("href","profile_doctor.html");

    }
  }
    var details = {
        imageProfileDisplay:'imageProfileDisplay'
    }
    //upload profile Image from db
    fetch("php/index.php", {
        method: "POST",
        mode: "same-origin",
        referrer: "https://javascript.info/anotherpage",
        credentials: "same-origin",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(details),
      })
        .then((data) => data.json())
        .then((res) => {
        if(res["res"]=="done"){
            sessionStorage.setItem("profileImage",res["imageURL"]["photo"]);
            if(res["imageURL"]["photo"]){
                //profile image
            url = `./upload/profilesImages/${res["imageURL"]["photo"]}`;
            }
            else{
              //default image
                url = "./img/profile-icon.png";
            }
            profileIcon.src = ("src",url);
            profileIcon.style.padding = 0;
            profileIcon.style.width = "45px";
            profileIcon.style.height = "45px";
            profileIcon.style.objectFit = "cover";
            profileIcon.style.borderRadius = "50%";
            profileIcon.style.padding = "1px";
            profileIcon.style.border = "1px solid #747475";
       
        }else {
            result = [];
            for (var i in res) result.push([i, res[i]]);
            result.map(
              (err) => (console.log(err[1]))
            );
          }
      });
      
    }
)
//logout button
var logoutButton = document.getElementById("logout");
logoutButton.addEventListener('click',function(e){
    sessionStorage.clear();
    window.location.href='login.html';
})