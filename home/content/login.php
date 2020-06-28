<?php 
function login()
{
?>
<br>
<center>
    <h2>
        LOGIN
    </h2>
</center>
<br>


    <div class="container">

        <form class="form-signin" method="post" action="">
            <h3>Form Login</h3>
            Jika belum mimiliki akun silahkan Daftar : <a href="index.php?p=login&action=daftar">Form Pendaftaran</a>
            <br>
            Username : <input
                type="text"
                name="username"
                class="input-block-level"
                placeholder="Username">
                <br>
                Password : 
            <input
                type="password"
                name="password"
                class="input-block-level"
                placeholder="Password">
                <br>
            <button class="btn btn-large btn-success" name="login" type="submit">Login</button>
        </form>
    </div>

<br>
<br>
<br>
<br>
<br>
<?php
}
?>