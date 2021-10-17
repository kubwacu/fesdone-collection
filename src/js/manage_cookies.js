/* 
    Author: Kalculata 
    Last update: 17/10/2021
*/

function set_cookie(name, value, days){
    let expiration_time = new Date();

    expiration_time.setTime(expiration_time.getTime() + (days*24*60*60*1000));
    expiration_time = "expires=" + expiration_time.toUTCString();

    document.cookie = name + "=" + value + ";" + expiration_time + "; path=/";
}

function get_cookie(name){ 
    name = name + "=";

    let cookies = decodeURIComponent(document.cookie);
    let list_cookies = cookies.split(";");

    for(let i=0; i<list_cookies.length; i++){
        let cookie = list_cookies[i];
        while(cookie.charAt(0) === ' '){
            cookie = cookie.substr(1);
        }
        if(cookie.indexOf(name) == 0){
            return  cookie.substring(name.length, cookie.length);
        }
    }
    return null;
}

function get_all_cookies(){
    let cookies = decodeURIComponent(document.cookie);
    let list_cookies = cookies.split(";");

    return list_cookies;
}

function delete_cookie(name){
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT"
}