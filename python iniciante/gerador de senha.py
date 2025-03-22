import random
import string

def gerar_senha(tamanho=12):
    
    caracteres = string.ascii_letters + string.digits + string.punctuation

    
    senha = ''.join(random.choice(caracteres) for _ in range(tamanho))
    return senha

def main():
    tamanho = int(input("Digite o tamanho desejado para a senha: "))
    senha = gerar_senha(tamanho)
    print(f"Sua senha gerada é: {senha}")

if __name__ == "__main__":
    main()
