import { List } from "./List.js";
import { User } from "./User.js";

function login () {
    const criaEmail = document.querySelector('.cria-email');
    const criaSenha = document.querySelector('.cria-senha');
    const userEmail = document.querySelector('.email');
    const userSenha = document.querySelector('.senha');

    const lista = new List();

    function getRequest () {
        const request = new XMLHttpRequest();
        return request;
    }

    function createCookie (userEmail) {
        const xmlReq = getRequest();
        xmlReq.open('GET', `./assets/php/cookies.php?useremail=${userEmail}`, true);
        xmlReq.send(null);
    }

    function createSession (userEmail, userSenha) {
        const xmlReq = getRequest();
        xmlReq.open('GET', `./assets/php/session.php?useremail=${userEmail}`, true);
        xmlReq.open('GET', `./assets/php/session.php?usersenha=${userSenha}`, true);
        xmlReq.send(null);
    }

    function saveUsers () {
        if (!readJSONUsers()) {
            let usersJSON = JSON.stringify(lista.showAllList());
            localStorage.setItem('users', usersJSON);
        } else {
            const allUsers = readJSONUsers().concat(lista.tail.data);
            let usersJSON = JSON.stringify(allUsers);
            localStorage.setItem('users', usersJSON);
        }  
    }

    function readJSONUsers () {
        const users = localStorage.getItem('users');
        let usersRead = JSON.parse(users);
        return usersRead;
    }

    function readAllUsers () {
        const users = localStorage.getItem('users');
        let usersRead = JSON.parse(users);
        for (let i of usersRead) {
            console.log(i.email);
        }
    }

    document.addEventListener('click', function (event) {
        const e = event.target;

        if (e.classList.contains('btn-login')) {
            if (!userEmail.value || !userSenha.value) return;
            readAllUsers(userEmail.value);
            const allUsers = readJSONUsers();
            for (let i of allUsers) {
                if (userEmail.value === i.email && userSenha.value === i.senha) {
                    createCookie(userEmail.value);
                    createSession(userEmail.value, userSenha.value);
                    window.location.href = 'homepage.php'; 
                    return;
                } else {
                    window.location.href = 'index.php';
                }
            }  
        }

        if (e.classList.contains('btn-criar-conta')) {
            window.location.href = 'criarConta.php';
        }

        if (e.classList.contains('btn-cadastro')) {
            if (!criaEmail.value || !criaSenha.value) return;
            const user = new User(criaEmail.value, criaSenha.value);
            lista.insertTail(user);
            console.log(lista.showAllList());
            console.log(lista);
            saveUsers();
            window.location.href = 'index.php';
        }

    });
}
login();