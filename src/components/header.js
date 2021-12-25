Vue.component('c-header', {
    template: `
    <header>
        <div class="logo">
         <img src="src/images/logo.png">
        </div>
        <ul class="nav">
            <li><a href="orders.html">Orders</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="users.html">Users</a></li>
        </ul>
        <div class="actions">
            <div class="messages_link">
                <a href="messages.html"><i class="far fa-envelope"></i></a>
                <span class="message_counter">9+</span>
            </div>
            <span @click="logout" class="logout_btn">Log out</span>
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