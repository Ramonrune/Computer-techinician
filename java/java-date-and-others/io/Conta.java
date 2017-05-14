package io;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;

public class Conta{
	
	String cliente;
	double saldo;
	
	public Conta(){
		
	}
	static Path path = Paths.get("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/src/desafioIO_64/clientes.txt");
	static Charset utf8 = StandardCharsets.UTF_8;
	
	public Conta(String cliente, double saldo){
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
	
	void transferePara(Conta destino, double valor){
		this.saca(valor);
		destino.deposita(valor);
	}
	
	public static void gravarNoArquivo(ArrayList<Conta> conta){
	
		
		
		try(BufferedWriter w = Files.newBufferedWriter(path, utf8)){
			
			for(Conta cont : conta){
				w.write(cont.cliente + ";" + cont.saldo + "\n");
			}
		
			
		}catch(IOException e){
			e.printStackTrace();
		}
		
	}
	
	
	public static ArrayList recuperarContas(){
		
		ArrayList<Conta> array = new ArrayList<Conta>();
		try(BufferedReader r = Files.newBufferedReader(path,utf8)){
			
			String linha = null;
			while((linha = r.readLine()) != null){
				String[] atributos = linha.split(";");
				Conta c = new Conta(atributos[0], Double.parseDouble(atributos[1]));
				array.add(c);
			}
			
		}catch(IOException e){
			e.printStackTrace();
		}
		return array;
	}
}
