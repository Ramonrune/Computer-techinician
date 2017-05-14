package excecoes;

import javax.swing.plaf.synth.SynthSeparatorUI;

public class DebugExemplo {

	int resultado;

	public int raiz(int numero) {
		int impar = 1, raiz = 0;

		while (numero >= impar) {
			numero -= impar;
			impar += 2;
			++raiz;

		}

		return raiz;
	}

	public static void main(String[] args) {

		int numero = 16;
		DebugExemplo exemplo = new DebugExemplo();
		int raiz = exemplo.raiz(numero);

		if (raiz == 4) {
			System.out.println("Raiz correta");
		}
	}
}
