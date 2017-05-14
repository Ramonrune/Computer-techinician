package usandojtable;
import java.awt.GridLayout;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.JTable;


public class Tabela extends JFrame{
     JPanel painelFundo;
     JTable tabela;
     JScrollPane barraDeRolagem;
     
     String[][] dados = {
         {"Ana Monteiro","11 1111-2222","ana@gmail.com"},
         {"Joao da Silva","19 2222-1111","joaosilva@ig.com"},
         {"Pedro Cascavel","21 3333-4444","pedro@hotmail.com"}
     
     };
     
     String [] colunas ={"Nome","Telefone","Email"};
     
     public void criaJanela(){
        painelFundo = new JPanel();
        painelFundo.setLayout(new GridLayout(1,1));
        
        tabela = new JTable(dados,colunas);
        
        barraDeRolagem = new JScrollPane(tabela);
        
        painelFundo.add(barraDeRolagem);
        
        getContentPane().add(painelFundo);
        setSize(500,120);
         setVisible(true);
     }
     public static void main(String[] args) {
        Tabela tb = new Tabela();
        
        tb.criaJanela();
    }
}
