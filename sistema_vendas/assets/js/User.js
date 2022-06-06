export class User {
    constructor(email = null, senha = null) {
        this.email = email;
        this.senha = senha;
    }

    get userEmail() {
        return this.email;
    }
    set userEmail(email) {
        this.email = email;
    }

    get userSenha() {
        return this.senha;
    }
    set userSenha(senha) {
        this.senha = senha;
    }
}