def exibir_tarefas(tarefas):
    if not tarefas:
        print("Nenhuma tarefa encontrada!")
    else:
        print("\nLista de Tarefas:")
        for id, (tarefa, concluida) in tarefas.items():
            status = "Concluída" if concluida else "Pendente"
            print(f"{id}. {tarefa} - {status}")

def adicionar_tarefa(tarefas):
    tarefa = input("Digite a tarefa: ")
    id_tarefa = len(tarefas) + 1  
    tarefas[id_tarefa] = (tarefa, False)  
    print(f"Tarefa '{tarefa}' adicionada com sucesso!")

def marcar_concluida(tarefas):
    try:
        id_tarefa = int(input("Digite o ID da tarefa a ser marcada como concluída: "))
        if id_tarefa in tarefas:
            tarefa, _ = tarefas[id_tarefa]
            tarefas[id_tarefa] = (tarefa, True)  
            print(f"Tarefa '{tarefa}' marcada como concluída!")
        else:
            print("ID de tarefa inválido!")
    except ValueError:
        print("Por favor, insira um número válido para o ID da tarefa.")

def excluir_tarefa(tarefas):
    try:
        id_tarefa = int(input("Digite o ID da tarefa a ser excluída: "))
        if id_tarefa in tarefas:
            tarefa, _ = tarefas.pop(id_tarefa)  
            print(f"Tarefa '{tarefa}' excluída com sucesso!")
        else:
            print("ID de tarefa inválido!")
    except ValueError:
        print("Por favor, insira um número válido para o ID da tarefa.")

def menu():
    tarefas = {}
    
    while True:
        print("\nEscolha uma opção:")
        print("1. Adicionar tarefa")
        print("2. Marcar tarefa como concluída")
        print("3. Excluir tarefa")
        print("4. Exibir todas as tarefas")
        print("5. Sair")
        
        opcao = input("Digite o número da opção: ")
        
        if opcao == "1":
            adicionar_tarefa(tarefas)
        elif opcao == "2":
            marcar_concluida(tarefas)
        elif opcao == "3":
            excluir_tarefa(tarefas)
        elif opcao == "4":
            exibir_tarefas(tarefas)
        elif opcao == "5":
            print("Saindo... Até logo!")
            break
        else:
            print("Opção inválida, por favor, tente novamente!")

if __name__ == "__main__":
    menu()
