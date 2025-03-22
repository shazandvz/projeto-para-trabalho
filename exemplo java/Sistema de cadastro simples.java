import java.util.ArrayList;
import java.util.Scanner;

public class SistemaDeCadastro {

    
    static class Usuario {
        String nome;
        String email;

        public Usuario(String nome, String email) {
            this.nome = nome;
            this.email = email;
        }

        @Override
        public String toString() {
            return "Nome: " + nome + ", Email: " + email;
        }
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        ArrayList<Usuario> usuarios = new ArrayList<>();

        while (true) {
            System.out.println("\nSistema de Cadastro");
            System.out.println("1. Cadastrar usuário");
            System.out.println("2. Listar usuários");
            System.out.println("3. Excluir usuário");
            System.out.println("4. Sair");
            System.out.print("Escolha uma opção: ");
            int opcao = scanner.nextInt();
            scanner.nextLine();  

            switch (opcao) {
                case 1:
                    
                    System.out.print("Digite o nome do usuário: ");
                    String nome = scanner.nextLine();
                    System.out.print("Digite o e-mail do usuário: ");
                    String email = scanner.nextLine();
                    usuarios.add(new Usuario(nome, email));
                    System.out.println("Usuário cadastrado com sucesso!");
                    break;

                case 2:
                    
                    System.out.println("\nLista de Usuários:");
                    if (usuarios.isEmpty()) {
                        System.out.println("Nenhum usuário cadastrado.");
                    } else {
                        for (int i = 0; i < usuarios.size(); i++) {
                            System.out.println((i + 1) + ". " + usuarios.get(i));
                        }
                    }
                    break;

                case 3:
                    
                    System.out.print("Digite o número do usuário a ser excluído: ");
                    int numero = scanner.nextInt();
                    if (numero > 0 && numero <= usuarios.size()) {
                        usuarios.remove(numero - 1);
                        System.out.println("Usuário excluído com sucesso!");
                    } else {
                        System.out.println("Número inválido.");
                    }
                    break;

                case 4:
                   
                    System.out.println("Saindo...");
                    scanner.close();
                    return;

                default:
                    System.out.println("Opção inválida.");
            }
        }
    }
}
