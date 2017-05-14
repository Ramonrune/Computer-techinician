package io;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.nio.file.Files;
import java.util.ArrayList;

public class Conta2 implements java.io.Serializable{
	
	String cliente;
	double saldo;
	
	public Conta2(){
		
	}

	
	public Conta2(String cliente, double saldo){
		this.cliente = cliente;
		this.saldo = saldo;
	}
	
	void exibeSaldo(){
		System.out.println(cliente + " seu saldo é de " + saldo);
	}
	
	void saca(double valor){
		saldo -= valor;
	}
	
	void deposita(double valor){
		saldo += valor;
	}
	
	void transferePara(Conta2 destino, double valor){
		this.saca(valor);
		destino.deposita(valor);
	}
	
	public static void gravarNoArquivo(ArrayList<Conta2> conta) throws IOException{
	
		try(FileOutputStream fos = new FileOutputStream("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/Java/src/io/clientes.ser")){
			
			try(ObjectOutputStream oos = new ObjectOutputStream(fos)){
				
					oos.writeObject(conta);
				
			}
			
		
		}
	
		
	}
	
	
	public static ArrayList recuperarContas() throws FileNotFoundException, IOException, ClassNotFoundException{
		
		try(FileInputStream fis = new FileInputStream("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/Java/src/io/clientes.ser")){
			try(ObjectInputStream ois = new ObjectInputStream(fis)){
				return (ArrayList<Conta2>)ois.readObject();
			}
		}
		
		
	}
}
