
import java.util.ArrayList;
import javax.swing.JOptionPane;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author B30
 */
public class Exercicio01 {
    public static void main(String[]args){
        String sResp="Sim";
        
         ArrayList<String> nome = 
                new ArrayList<>();
         while("Sim".equalsIgnoreCase(sResp)){
           nome.add(JOptionPane.showInputDialog("Digite o nome: "));
            
           
           sResp = JOptionPane.showInputDialog("Deseja continuar? \nSim ou Nao?");
    }
        for(int i = 0; i < nome.size(); i++){
            JOptionPane.showMessageDialog(null,nome.get(i));
    }
  }
}
