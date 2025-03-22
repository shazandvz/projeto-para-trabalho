def contar_palavras(texto, palavra):
    
    texto = texto.lower()
    palavra = palavra.lower()

    
    ocorrencias = texto.split().count(palavra)
    return ocorrencias

def main():
    
    texto = input("Digite o texto: ")

    
    palavra = input("Digite a palavra que deseja contar: ")

    
    resultado = contar_palavras(texto, palavra)

   
    print(f"A palavra '{palavra}' aparece {resultado} vez(es) no texto.")

if __name__ == "__main__":
    main()
