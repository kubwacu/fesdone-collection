Vue.component('c-header', {
    template: `
    <header>
        <div class="logo">
         <img src="src/images/logo.png">
        </div>
        <ul class="nav">
            <li>
                <a href="messages.html">Messages</a>
                <span class="message_counter">9+</span>
            </li>
            <li><a href="products.html">Products</a></li>
        </ul>
        <div class="actions">
            <span @click="logout" class="logout_btn"><i class="fas fa-door-open"></i> Log out</span>
        </div>
    </header>
    `,
    methods: {
        logout: function(){
            AkanaCookie.delete('tkn');
            window.location.replace("/index.html");
        }
    }
});