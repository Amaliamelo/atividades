<?php
function rodape(){
    $desenvolvedor = $GLOBALS["desenvolvedor"];
    include "modal_login.php";
    include "modal_cadastro.php";
    echo "
    </main>
    <footer class='fixar-rodape'>
        <span class='text-muted'> Site desenvolvido por: $desenvolvedor</span>
    </footer>
    </body>
    </html>
    ";
}
?>