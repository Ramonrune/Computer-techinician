package polimorfismo;

import java.util.Scanner;

public class Assertion {

	public static void main(String[] args) {
		
		Scanner s = new Scanner(System.in);
		System.out.println("Entre um Numero de 0 a 10");
		int numero = s.nextInt();
		
		assert (numero >= 0 && numero <=10) : "Numero Invalido " + numero;
		/**
		 * run configuration
		 * assertion
		 * -ea // habilitar
		 * -da // desabilitar
		 * 
		 * -ea:br.com.xti... // pacote
		 * 
		 */
		
		
		System.out.println("Você entrou " +numero);
	}
}
