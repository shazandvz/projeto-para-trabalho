import java.util.Scanner;

public class ContadorDePalavras {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Digite uma frase para contar as palavras:");
        String frase = scanner.nextLine();

        String[] palavras = frase.split("\\s+");

       
        int numeroDePalavras = palavras.length;

        System.out.println("A frase contém " + numeroDePalavras + " palavras.");

        scanner.close();
    }
}
