import java.util.Random;
import java.util.Scanner;

public class JogoDeAdivinhacao {

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        Random random = new Random();

        int numeroAleatorio = random.nextInt(100) + 1;
        int tentativas = 0;
        int palpite = 0;

        System.out.println("Bem-vindo ao Jogo de Adivinhação!");
        System.out.println("Tente adivinhar o número que estou pensando entre 1 e 100.");

        while (palpite != numeroAleatorio) {
            System.out.print("Digite seu palpite: ");
            palpite = scanner.nextInt();
            tentativas++;

           
            if (palpite < numeroAleatorio) {
                System.out.println("O número é maior. Tente novamente!");
            } else if (palpite > numeroAleatorio) {
                System.out.println("O número é menor. Tente novamente!");
            } else {
                System.out.println("Parabéns! Você adivinhou o número em " + tentativas + " tentativas.");
            }
        }

        scanner.close();
    }
}
