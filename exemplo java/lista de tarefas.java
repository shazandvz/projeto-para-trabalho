import java.util.ArrayList;
import java.util.Scanner;

public class ListaDeTarefas {

    static class Tarefa {
        String descricao;
        boolean concluida;

        public Tarefa(String descricao) {
            this.descricao = descricao;
            this.concluida = false;
        }

        @Override
        public String toString() {
            return (concluida ? "[Concluída] " : "[Pendente] ") + descricao;
        }

        public void concluir() {
            concluida = true;
        }

        public void desmarcar() {
            concluida = false;
        }
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<Tarefa> tarefas = new ArrayList<>();

        while (true) {
            System.out.println("\nLista de Tarefas:");
            System.out.println("1. Adicionar tarefa");
            System.out.println("2. Listar tarefas");
            System.out.println("3. Marcar tarefa como concluída");
            System.out.println("4. Remover tarefa");
            System.out.println("5. Sair");
            System.out.print("Escolha uma opção: ");
            int opcao = scanner.nextInt();
            scanner.nextLine(); 

            switch (opcao) {
                case 1:
                    System.out.print("Digite a descrição da tarefa: ");
                    String descricao = scanner.nextLine();
                    tarefas.add(new Tarefa(descricao));
                    System.out.println("Tarefa adicionada com sucesso!");
                    break;

                case 2:
                    System.out.println("\nLista de Tarefas:");
                    for (int i = 0; i < tarefas.size(); i++) {
                        System.out.println((i + 1) + ". " + tarefas.get(i));
                    }
                    break;

                case 3:
                    System.out.print("Digite o número da tarefa para marcar como concluída: ");
                    int concluirIndex = scanner.nextInt() - 1;
                    if (concluirIndex >= 0 && concluirIndex < tarefas.size()) {
                        tarefas.get(concluirIndex).concluir();
                        System.out.println("Tarefa marcada como concluída!");
                    } else {
                        System.out.println("Número de tarefa inválido.");
                    }
                    break;

                case 4:
                    System.out.print("Digite o número da tarefa para remover: ");
                    int removerIndex = scanner.nextInt() - 1;
                    if (removerIndex >= 0 && removerIndex < tarefas.size()) {
                        tarefas.remove(removerIndex);
                        System.out.println("Tarefa removida com sucesso!");
                    } else {
                        System.out.println("Número de tarefa inválido.");
                    }
                    break;

                case 5:
                    System.out.println("Saindo...");
                    scanner.close();
                    return;

                default:
                    System.out.println("Opção inválida.");
            }
        }
    }
}
