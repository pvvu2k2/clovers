<section class="login">
    <div class=" form" style="background-color: #fff; width: 50%">
        <h1>Đăng ký</h1>
        <form action="index.php?page=register" method="post">
            Username: <input type="text" name="username" placeholder="Username"><br>
            Password: <input type="password" name="pass" placeholder="Password"><br>
            Name: <input type="text" name="fullname" placeholder="Fullname"><br>
            Address: <input type="text" name="address" placeholder="Address"><br>
            Email: <input type="email" max="9999999999" min="0000000000" name="email" placeholder="Email"><br>
            Phone: <input type="number" max="9999999999" min="0000000000" name="phone" placeholder="Phone"><br>
            <input type="submit" name="btn_regiter" value="Đăng ký">
            <button>
                <a href="index.php?page=login">Đăng nhập</a>
            </button>
        </form>

</section>