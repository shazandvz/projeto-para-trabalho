def calcular_imc(peso, altura):
   
    imc = peso / (altura ** 2)
    return imc

def categoria_imc(imc):
   
    if imc < 18.5:
        return "Abaixo do peso (Magro)"
    elif 18.5 <= imc < 24.9:
        return "Peso saudável"
    elif 25 <= imc < 29.9:
        return "Sobrepeso"
    elif 30 <= imc < 34.9:
        return "Obesidade grau 1"
    elif 35 <= imc < 39.9:
        return "Obesidade grau 2 (severa)"
    else:
        return "Obesidade grau 3 (mórbida)"

def main():
    
    peso = float(input("Digite o seu peso (kg): "))
    altura = float(input("Digite a sua altura (m): "))

    imc = calcular_imc(peso, altura)

    
    categoria = categoria_imc(imc)

   
    print(f"O seu IMC é: {imc:.2f}")
    print(f"A sua categoria é: {categoria}")

if __name__ == "__main__":
    main()
