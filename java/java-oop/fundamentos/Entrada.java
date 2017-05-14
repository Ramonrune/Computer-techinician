package fundamentos;

import java.util.Scanner;

public class Entrada {

	public static void main(String[] args) {
		// Chamada do programa
		// System.out.println(args[0]);

		// interagindo com o usuário
		Scanner s = new Scanner(System.in);
		System.out.println("Qual o seu nome ?");
		String nome = s.nextLine();
		System.out.println("Bem-vindo " + nome);

	}
}