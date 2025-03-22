def celsius_para_fahrenheit(celsius):
    return (celsius * 9/5) + 32

def celsius_para_kelvin(celsius):
    return celsius + 273.15

def fahrenheit_para_celsius(fahrenheit):
    return (fahrenheit - 32) * 5/9

def fahrenheit_para_kelvin(fahrenheit):
    return (fahrenheit - 32) * 5/9 + 273.15

def kelvin_para_celsius(kelvin):
    return kelvin - 273.15

def kelvin_para_fahrenheit(kelvin):
    return (kelvin - 273.15) * 9/5 + 32

def menu():
    print("Selecione a operação de conversão:")
    print("1. Celsius para Fahrenheit")
    print("2. Celsius para Kelvin")
    print("3. Fahrenheit para Celsius")
    print("4. Fahrenheit para Kelvin")
    print("5. Kelvin para Celsius")
    print("6. Kelvin para Fahrenheit")

    escolha = input("Digite o número da operação (1/2/3/4/5/6): ")

    if escolha in ('1', '2', '3', '4', '5', '6'):
        temperatura = float(input("Digite a temperatura: "))

        if escolha == '1':
            print(f"{temperatura}°C = {celsius_para_fahrenheit(temperatura)}°F")
        elif escolha == '2':
            print(f"{temperatura}°C = {celsius_para_kelvin(temperatura)}K")
        elif escolha == '3':
            print(f"{temperatura}°F = {fahrenheit_para_celsius(temperatura)}°C")
        elif escolha == '4':
            print(f"{temperatura}°F = {fahrenheit_para_kelvin(temperatura)}K")
        elif escolha == '5':
            print(f"{temperatura}K = {kelvin_para_celsius(temperatura)}°C")
        elif escolha == '6':
            print(f"{temperatura}K = {kelvin_para_fahrenheit(temperatura)}°F")
    else:
        print("Opção inválida!")

if __name__ == "__main__":
    menu()
