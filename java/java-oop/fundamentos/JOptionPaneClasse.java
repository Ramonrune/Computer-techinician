package fundamentos;
import javax.swing.JOptionPane; 

public class JOptionPaneClasse{
	
	public static void main(String[] args){
		
		String nome = JOptionPane.showInputDialog("Qual o seu Nome ?");
		//System.out.println(nome);
		JOptionPane.showMessageDialog(null,nome);
	}
}