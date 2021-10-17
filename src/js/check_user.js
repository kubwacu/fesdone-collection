const tkn = ManageCookie.get_cookie("tkn");

if(tkn == null){
    window.location.replace('/login.html?r=0');
}