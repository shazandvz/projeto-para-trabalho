import java.util.Scanner;

public class ConversorDeUnidades {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Conversor de Unidades");
        System.out.println("Escolha a unidade de entrada:");
        System.out.println("1. Metros (m)");
        System.out.println("2. Quilômetros (km)");
        System.out.println("3. Centímetros (cm)");
        System.out.println("4. Milímetros (mm)");

        System.out.print("Digite o número da unidade de entrada: ");
        int unidadeEntrada = scanner.nextInt();

        System.out.print("Digite o valor a ser convertido: ");
        double valorEntrada = scanner.nextDouble();

        System.out.println("Escolha a unidade de saída:");
        System.out.println("1. Metros (m)");
        System.out.println("2. Quilômetros (km)");
        System.out.println("3. Centímetros (cm)");
        System.out.println("4. Milímetros (mm)");

        System.out.print("Digite o número da unidade de saída: ");
        int unidadeSaida = scanner.nextInt();

        double resultado = 0;

        if (unidadeEntrada == 1) { 
            switch (unidadeSaida) {
                case 1: resultado = valorEntrada; break;
                case 2: resultado = valorEntrada / 1000; break; 
                case 3: resultado = valorEntrada * 100; break; 
                case 4: resultado = valorEntrada * 1000; break; 
            }
        } else if (unidadeEntrada == 2) { 
            switch (unidadeSaida) {
                case 1: resultado = valorEntrada * 1000; break; 
                case 2: resultado = valorEntrada; break; 
                case 3: resultado = valorEntrada * 100000; break; 
                case 4: resultado = valorEntrada * 1000000; break; 
            }
        } else if (unidadeEntrada == 3) {
            switch (unidadeSaida) {
                case 1: resultado = valorEntrada / 100; break; 
                case 2: resultado = valorEntrada / 100000; break; 
                case 3: resultado = valorEntrada; break; 
                case 4: resultado = valorEntrada * 10; break; 
            }
        } else if (unidadeEntrada == 4) { 
            switch (unidadeSaida) {
                case 1: resultado = valorEntrada / 1000; break; 
                case 2: resultado = valorEntrada / 1000000; break;
                case 3: resultado = valorEntrada / 10; break;
                case 4: resultado = valorEntrada; break;
            }
        }

        System.out.println("Resultado: " + resultado);

        scanner.close();
    }
}
