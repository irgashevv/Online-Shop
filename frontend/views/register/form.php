<?php
    include_once __DIR__ . "/../header.php";
?>

    <div id="login-container" class="width1024">
        <div><br><br><br><br></div>
        <h1>register</h1>
            <form action="/?model=register&action=register" method="post">

                <div>
                    <label for="">Name: </label><input type="text" name="name">
                </div>

                <div>
                    <label for="">Phone: </label><input type="text" name="phone">
                </div>

                <div>
                    <label for="">Email: </label><input type="text" name="email">
                </div>

                <div>
                    <label for="">Password: </label><input type="password" name="password">
                </div>

                <div>
                   <label for="">Repeat Password: </label><input type="password" name="password_repeat">
                </div>
                <div><br></div>
                <div>
                    <input type="submit" value="register">
                </div>
            </form>
        <div><br><br><br><br></div>
    </div>

<?php
    include_once  __DIR__ . "/../footer.php";
?>