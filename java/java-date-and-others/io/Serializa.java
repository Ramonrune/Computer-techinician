package io;

import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.Arrays;

import polimorfismo.Conta;


public class Serializa {

	public static void main(String[] args) throws Exception{
		
		
		String[] nomes = {"Ramon", "Isaque", "Alex"};
		
		Conta conta1 = new Conta("Ramon", 111_222_333.444);
		Conta conta2 = new Conta("Isaque",22222);
		
		/** Escrita */
		
		FileOutputStream fos = new FileOutputStream("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/Java/src/serializacao_67/objeto.ser");
		ObjectOutputStream oos = new ObjectOutputStream(fos);
		//oos.writeObject(nomes);
		oos.writeObject(conta1);
		oos.writeObject(conta2);
		oos.close();
		
		/**Leitura */
		FileInputStream fis = new FileInputStream("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/Java/src/serializacao_67/objeto.ser");
		ObjectInputStream ois = new ObjectInputStream(fis);
		//String[] nomes1 = (String[]) ois.readObject();
		Conta c1 = (Conta) ois.readObject();
		Conta c2 = (Conta) ois.readObject();
		ois.close();
		
		//System.out.println(Arrays.toString(nomes1));
		c1.exibeSaldo();
		c2.exibeSaldo();
	}
	
}
