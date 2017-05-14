package fundamentos;

import java.util.Random;
import javax.swing.JOptionPane;
public class Dados{
	
	public static void main(String[] args){
		
		String num = JOptionPane.showInputDialog("Digite o numero do dado:");
		int numeroUsuario = Integer.parseInt(num);
		
		Random r = new Random();
		int numeroSorteado = r.nextInt(6) + 1; //0-5
		
		if(numeroSorteado == numeroUsuario){
			JOptionPane.showMessageDialog(null,"Parabéns! Você acertou o numero " + numeroSorteado);
		}
		else{
			JOptionPane.showMessageDialog(null,"Você errou! O numero é " + numeroSorteado);
		}
	}
}