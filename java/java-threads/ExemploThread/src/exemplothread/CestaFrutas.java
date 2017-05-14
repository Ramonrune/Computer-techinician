/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exemplothread;

/**
 *
 * @author B30
 */
public class CestaFrutas implements Runnable{
    
    
    @Override
    public void run(){
        //criação da lista de frutas
        String [] frutas = {"Abacate","Limão","Pêssego","Morango","Melancia","Kiwi","Caqui","Acerola"};
        
        System.out.println("Inicio do run()");
        
        //impressão da lista de frutas
        
        for(String fruta:frutas){
            System.out.println(fruta);
            try{
                Thread.sleep(3*1000);
            }catch(InterruptedException e){
                e.printStackTrace();
            }
            
        }
        System.out.println("Fim do run()");
    }
}
