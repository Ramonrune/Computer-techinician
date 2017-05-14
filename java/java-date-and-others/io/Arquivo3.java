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

public class Arquivo3 {

	public static void main(String[] args) {
		
		ArrayList<Conta> conta = new ArrayList<Conta>();
		boolean continua = true;
		do{
			
			 String cliente = JOptionPane.showInputDialog("Digite o nome do cliente");
			 double saldo = Double.parseDouble(JOptionPane.showInputDialog("Digite o saldo do cliente"));
			 Conta c = new Conta(cliente,saldo);
			 conta.add(c);
			 
			 if((JOptionPane.showInputDialog("Deseja continuar ?<s/n>")).equals("n")){
				 continua=false;
			 }
			
			
		}while(continua==true);
		
		Conta c = new Conta();
		
		c.gravarNoArquivo(conta);
		
		ArrayList<Conta> recupera = new ArrayList<Conta>();
		recupera = c.recuperarContas();
		for (Conta cont : recupera) {
			System.out.println(cont.cliente + " " + cont.saldo);
		}
		
		
	}

}
