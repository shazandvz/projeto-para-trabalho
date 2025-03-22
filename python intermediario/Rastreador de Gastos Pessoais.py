import json


def carregar_dados(arquivo="gastos.json"):
    try:
        with open(arquivo, "r") as f:
            return json.load(f)
    except FileNotFoundError:
        return {}

def salvar_dados(dados, arquivo="gastos.json"):
    with open(arquivo, "w") as f:
        json.dump(dados, f, indent=4)


def adicionar_gasto(dados):
    categoria = input("Digite a categoria do gasto (ex: Alimentação, Transporte, Lazer): ")
    try:
        valor = float(input("Digite o valor do gasto: R$ "))
    except ValueError:
        print("Valor inválido! Tente novamente.")
        return

    if categoria not in dados:
        dados[categoria] = []

    dados[categoria].append(valor)
    print(f"Gasto de R${valor:.2f} registrado na categoria '{categoria}'.")


def exibir_resumo(dados):
    print("\nResumo de Gastos:")
    total_gastos = 0
    for categoria, gastos in dados.items():
        total_categoria = sum(gastos)
        total_gastos += total_categoria
        print(f"{categoria}: R${total_categoria:.2f}")
    
    print(f"\nTotal de gastos: R${total_gastos:.2f}")

def menu():
    dados = carregar_dados()

    while True:
        print("\nMenu:")
        print("1. Registrar gasto")
        print("2. Exibir resumo de gastos")
        print("3. Sair")

        opcao = input("Escolha uma opção: ")

        if opcao == "1":
            adicionar_gasto(dados)
            salvar_dados(dados)
        elif opcao == "2":
            exibir_resumo(dados)
        elif opcao == "3":
            print("Saindo... Até logo!")
            break
        else:
            print("Opção inválida, por favor, tente novamente.")

if __name__ == "__main__":
    menu()
