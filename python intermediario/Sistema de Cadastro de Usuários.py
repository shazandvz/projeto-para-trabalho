import bcrypt


def hash_senha(senha):
    return bcrypt.hashpw(senha.encode('utf-8'), bcrypt.gensalt())


def verificar_senha(senha, senha_hash):
    return bcrypt.checkpw(senha.encode('utf-8'), senha_hash)

def cadastrar_usuario(arquivo):
    login = input("Digite o login: ")
    senha = input("Digite a senha: ")


    senha_hash = hash_senha(senha)

    with open(arquivo, 'a') as f:
        f.write(f"{login},{senha_hash.decode('utf-8')}\n")
    
    print("Usuário cadastrado com sucesso!")


def login_usuario(arquivo):
    login = input("Digite o login: ")
    senha = input("Digite a senha: ")

  
    try:
        with open(arquivo, 'r') as f:
            usuarios = f.readlines()

        for usuario in usuarios:
            login_armazenado, senha_hash_armazenada = usuario.strip().split(',')
            if login_armazenado == login and verificar_senha(senha, senha_hash_armazenada):
                print("Login bem-sucedido!")
                return True
        print("Login ou senha incorretos!")
        return False
    except FileNotFoundError:
        print("Arquivo de usuários não encontrado.")
        return False


def menu():
    arquivo = "usuarios.txt"

    while True:
        print("\nMenu:")
        print("1. Cadastro de usuário")
        print("2. Login de usuário")
        print("3. Sair")
        
        opcao = input("Escolha uma opção: ")

        if opcao == "1":
            cadastrar_usuario(arquivo)
        elif opcao == "2":
            if login_usuario(arquivo):
                print("Bem-vindo ao sistema!")
                break
        elif opcao == "3":
            print("Saindo do sistema...")
            break
        else:
            print("Opção inválida, tente novamente.")

if __name__ == "__main__":
    menu()
