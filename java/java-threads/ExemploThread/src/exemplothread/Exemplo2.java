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
public class Exemplo2 {
    
    
    public static void main(String[] args) {
        System.out.println("Inicio da Aplicação");
       //Criação do executavel
        CestaFrutas cesta = new CestaFrutas();
        //criação da thread
        Thread threadRelatorio = new Thread(cesta);
        //inicio da execução thread
        threadRelatorio.start();
    }
}
