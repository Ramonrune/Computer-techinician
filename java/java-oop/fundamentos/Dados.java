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
			JOptionPane.showMessageDialog(null,"Parab�ns! Voc� acertou o numero " + numeroSorteado);
		}
		else{
			JOptionPane.showMessageDialog(null,"Voc� errou! O numero � " + numeroSorteado);
		}
	}
}