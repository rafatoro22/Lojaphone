<div id="cabeca">
    <center>
        <nav>
          <ul>
            <li><a href="./">Principal</a></li>
             <?php
             if (!empty($_SESSION["auth"])) {
                if ( $_SESSION["auth"]["role"] == "admin") {
        ?>
            <li><a href="./usuario/">Usuario</a></li>
            <?php
                }
            }
            ?>

            <li><a href="./produto">Produtos</a></li>
            
            <li><a href="./carrinho/index">Carrinho</a></li>
            <?php
             if (!empty($_SESSION["auth"])) {
                if ( $_SESSION["auth"]["role"] == "admin") {
        ?>
            <li><a href="./cupom/index">Cupons</a></li>
             <?php
                }
            }
            ?>
             <?php
             if (!empty($_SESSION["auth"])) {
                if ( $_SESSION["auth"]["role"] == "admin, user") {
        ?>
            <li><a href="./usuario/perfil">Meu Perfil</a></li>
            <?php
                }
            }
            ?>
            <li><a href="./login/index">Login</a></li>
            <li><a href="./login/logout">Logout</a></li>
        </ul>
    </nav>
    <div id="banner">
        <img  width="100%" src="publico/img/banner.jpg">
    </div>
</center>
</div>

