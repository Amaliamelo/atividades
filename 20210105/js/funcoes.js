function confirmarExclusao(codigo){

    document.getElementById('codigo').value = codigo;
    $('#excluir-modal').modal();
}

function confirmarExclusaoUser(codigo){

    document.getElementById('codigoExcluir').value = codigo;
    $('#excluir-user').modal();
}
function alterar(codigo, nome,email,senha){
    
    document.getElementById('codigo').value = codigo;
    document.getElementById('nome').value = nome;
    document.getElementById('email').value = email;
    document.getElementById('senha').value = senha;
    
    $('#modalTeste').modal();
}

function exibirDicas(dica1, dica2){
    document.getElementById("dica1").innerHTML = 
        dica1;
    document.getElementById("dica2").innerHTML = 
        dica2;
}