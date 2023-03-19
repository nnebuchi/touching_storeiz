const generateUserToken = (token, data=null)=>{
    const userCookie = {
        token:token,
        data:data
    };
    document.cookie = "user="+JSON.stringify(userCookie)+"; path=/";
}



const destroyUserToken = ()=>{
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
}

const logout = ()=>{
    destroyUserToken();
    location.replace(url+"/logout");
}

function getCookie(cname) {
   
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}
// destroyUserToken()

var usercookie = getCookie("user")!='' ? JSON.parse(getCookie("user")):null;
console.log(usercookie);

if(usercookie === null){

    if(typeof user_data !== 'undefined' && user_data !== null){
        generateUserToken(universal_token, user_data);
    }else{
        generateUserToken(universal_token);
    }
    
    usercookie = getCookie("user")!='' ? JSON.parse(getCookie("user")):null;
    
    // console.log(usercookie)
}

