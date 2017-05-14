
import java.util.ArrayList;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author B30
 */
public class ExemploALEstados {
    
    public static void main(String[]args){
        ArrayList<Estados> estados =
                new ArrayList<>();
        Estados est1 = new Estados();
        est1.sNome="São Paulo";
        est1.sSigla="SP";
        estados.add(est1);
        
        Estados est2 = new Estados();
        est2.sNome = "Tocantins";
        est2.sSigla = "TO";
        estados.add(est2);
        
        for( int i = 0; i <estados.size(); i++){
            estados.get(i).imprimir();
        }
        
        
        //Alterando objeto
        
        
    }        
            
}
