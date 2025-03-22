import random


palavras = ["python", "java", "desenvolvimento", "algoritmo", "programacao", "computador", "software"]

def escolher_palavra():
    return random.choice(palavras)

def mostrar_palavra(palavra, letras_corretas):
  
    return " ".join([letra if letra in letras_corretas else "_" for letra in palavra])

def jogar():
    palavra = escolher_palavra()
    letras_corretas = []
    tentativas = 6  
    letras_erradas = []

    print("Bem-vindo ao jogo da Forca!")
    
    while tentativas > 0:
        print(f"\nPalavra: {mostrar_palavra(palavra, letras_corretas)}")
        print(f"Tentativas restantes: {tentativas}")
        print(f"Letras erradas: {', '.join(letras_erradas)}")

       
        tentativa = input("Digite uma letra: ").lower()

        
        if len(tentativa) != 1 or not tentativa.isalpha():
            print("Por favor, digite apenas uma letra válida.")
            continue

        if tentativa in letras_corretas or tentativa in letras_erradas:
            print("Você já tentou essa letra. Tente outra.")
            continue

        if tentativa in palavra:
            letras_corretas.append(tentativa)
            print("Boa! Você acertou uma letra.")
        else:
            letras_erradas.append(tentativa)
            tentativas -= 1
            print("Ops! A letra não está na palavra.")

        
        if all(letra in letras_corretas for letra in palavra):
            print(f"\nParabéns! Você adivinhou a palavra: {palavra}")
            break

    if tentativas == 0:
        print(f"\nVocê perdeu! A palavra era: {palavra}")

if __name__ == "__main__":
    jogar()
