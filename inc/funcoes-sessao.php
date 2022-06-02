<?php
/* Aqui programaremos futuramente
os recursos de login/logout e verificação
de permissão de acesso dos usuários */

/* VERIFICANDO SE NÃO EXISTE UMA SESSÃO EM FUNCIONAMENTO */
if(!isset($_SESSION)) {
    session_start();
};

function verificaAcesso() {
    /* Se não EXISTE uma variável de sessão relacionada
    ao id do usuário logado... */
    if (!isset($_SESSION['id'])) {
        /* Então significa que ele não está logado, portanto
        apague qualquer resquício de sessão e force o usuário
        a ir para login.php */
        session_destroy();
        header("location:../login.php");
        die();
    };
};

function login(int $id, string $nome, string $email, string $tipo) {
    /* Variáveis de Sessão ao logar */
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['tipo'] = $tipo;
}; 

function logOut() {
    session_start();
    session_destroy();
    header("location:../login.php?logout");
    die();
};

function verificaAcessoAdmin() {
    // Se o tipo de usuário logado não for admin
    if($_SESSION['tipo'] != 'admin') {
        // Redireciona para página não autorizada.
        header("location:nao-autorizado.php");
        die();
    };
}