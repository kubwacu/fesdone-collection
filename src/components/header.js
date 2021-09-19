Vue.component('c-header', {
    template: `
    <header>
        <div class="logo">
         <img src="image/F.png">
        </div>
        <ul class="nav">
            <li><a href="orders.html">Orders</a></li>
            <li><a href="products.html">Products</a></li>
            <li><a href="users.html">Users</a></li>
        </ul>
        <div class="actions">
            <a href="messages.html"><i class="far fa-envelope"></i></a>
            <span class="message_counter">9+</span>
        </div>
    </header>
    `
});