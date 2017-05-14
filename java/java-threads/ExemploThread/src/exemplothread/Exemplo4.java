/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exemplothread;

import java.awt.Toolkit;

/**
 *
 * @author B30
 */
public class Exemplo4 {
    public static void main(String[] args) {
        System.out.println("Contagem Regressiva Iniciada!");
        int i=10;
        
        while(i>=0){
            try{
                Thread.sleep(1000);
                System.out.println("Faltam "+i);
                Toolkit.getDefaultToolkit().beep();
            }catch(InterruptedException e){
                e.printStackTrace();
                
            }
            i--;
        }
    }
}
