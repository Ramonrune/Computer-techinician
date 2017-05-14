
import java.util.ArrayList;
import java.util.Collections;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Julia Carolina Maia da Silva
 */
public class ExemploArrayLIst {
    public static void main(String[]args){
        //Criando objeto ArrayLIst do tipo String
        ArrayList<String> estados = 
                new ArrayList<>();
        //Adicionando itens no ArrayList
        estados.add("São Paulo");//indice 0
        estados.add("Minas Geral");//indice 1
        estados.add("Acre");//indice 2
        Collections.sort(estados);
        //Exibindo os itens do ArrayList
        for(int i = 0; i < estados.size(); i++){
            System.out.println(estados.get(i));
        }
        //alterando um valor do ArrayList
        estados.set(1, "Pernambuco");
        Collections.reverse(estados);
        System.out.println("=======================");
        for(int i = 0; i < estados.size(); i++){
            System.out.println(estados.get(i));
        }
        //removendo um item do ArrayList
        estados.remove(2);
        System.out.println("=======================");
        for(int i = 0; i < estados.size(); i++){
            System.out.println(estados.get(i));
        }
        
    }
    
}
