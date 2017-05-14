package io;

import java.io.BufferedWriter;
import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;

import javax.swing.JOptionPane;

public class Serializa2 {

	public static void main(String[] args) throws IOException, ClassNotFoundException {
		
		ArrayList<Conta2> conta = new ArrayList<Conta2>();
		boolean continua = true;
		do{
			
			 String cliente = JOptionPane.showInputDialog("Digite o nome do cliente");
			 double saldo = Double.parseDouble(JOptionPane.showInputDialog("Digite o saldo do cliente"));
			 Conta2 c = new Conta2(cliente,saldo);
			 conta.add(c);
			 
			 if((JOptionPane.showInputDialog("Deseja continuar ?<s/n>")).equals("n")){
				 continua=false;
			 }
			
			
		}while(continua==true);
		
		Conta2 c = new Conta2();
		
		c.gravarNoArquivo(conta);
		
		ArrayList<Conta2> recupera = new ArrayList<Conta2>();
		recupera = c.recuperarContas();
		for (Conta2 cont : recupera) {
			System.out.println(cont.cliente + " " + cont.saldo);
			cont.exibeSaldo();
		}
		
		
	}

}
