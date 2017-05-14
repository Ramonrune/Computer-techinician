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
class GeradorRelatorio implements Runnable{
    
    @Override
    public void run(){
        int i;
        for(i=0;i<=50;i++){
            System.out.println("Linha : "+i);
        }
    }
}
