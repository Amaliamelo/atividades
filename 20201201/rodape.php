<?php
function rodape(){
    $desenvolvedor = $GLOBALS["desenvolvedor"];
    include "modal_login.php";
    echo "
    </main>
    <footer class='footer'>
        <span class='text-muted'> Site desenvolvido por: $desenvolvedor</span>
    </footer>
    </body>
    </html>
    ";
}
?>