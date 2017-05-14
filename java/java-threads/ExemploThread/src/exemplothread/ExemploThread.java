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
public class ExemploThread {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Inicio da Aplicação");
        //criação dos executaveis
        GeradorRelatorio relatorio = new GeradorRelatorio();
        BarraDeProgresso barra = new BarraDeProgresso();
        Thread threadRelatorio = new Thread(relatorio);
        Thread threadBarra = new Thread(barra);
        threadRelatorio.start();
        threadBarra.start();
        
    }
    
}
