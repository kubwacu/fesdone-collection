/* 
    Author: Kalculata 
    Last update: 17/10/2021
*/


class Akana{
    static bridge(url){
        return "/api/api.php?resource=" + url;
    }
}


class AkanaXhr{
    constructor(params){
        this.method = params.method;
        this.query_params = params.query_params;
        this.data = params.data;
        this.resource = params.resource;
        this.result = [];
    }

    run(){
        let resource = this.resource;
        let method = this.method;

        return new Promise(function(success, failed) {
            let xhr = new XMLHttpRequest();

            xhr.onloadend = function(){
                success(JSON.parse(xhr.responseText));
            };
            xhr.onerror = failed;

            xhr.open(method, "/api/api.php?resource=" + resource);
            xhr.send(null); 
        });
    }
}

class ManageCookie{
    static set(name, value, days=30){
        let expiration_time = new Date();
    
        expiration_time.setTime(expiration_time.getTime() + (days*24*60*60*1000));
        expiration_time = "expires=" + expiration_time.toUTCString();
    
        document.cookie = name + "=" + value + ";" + expiration_time + "; path=/";
    }

    static get(name){ 
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
    
    static get_all(){
        let cookies = decodeURIComponent(document.cookie);
        let list_cookies = cookies.split(";");
    
        return list_cookies;
    }
    
    static delete(name){
        document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT"
    }
}