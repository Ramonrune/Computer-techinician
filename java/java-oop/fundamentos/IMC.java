package fundamentos;

import javax.swing.JOptionPane;
/**
 * 
 * @author Ramon
 * 
 * Classe responsavel por calcular o IMC
 * 
 * IMC = pesoEmQuilo / (alturaEmMetros * alturaEmMetros)
 *
 */
public class IMC{
	
	public static void main(String[] args){
		
		String peso = JOptionPane.showInputDialog("Qual seu peso em Quilogramas ?");
		String altura = JOptionPane.showInputDialog("Qual sua Altura em Metros ?");
		
		double pesoEmQuilogramas = Double.parseDouble(peso);
		double alturaEmMetros = Double.parseDouble(altura);
		double imc = pesoEmQuilogramas / (alturaEmMetros * alturaEmMetros);
		
		String mensagem = 
				(imc >= 20 && imc <= 25) ? "Peso Ideal" : "Fora do peso ideal"; 
				
		mensagem = "IMC = " + imc + "\n" + mensagem;
				
		JOptionPane.showMessageDialog(null,mensagem);

		
	}
}
