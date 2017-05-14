package refinado;

import java.io.Console;
import java.io.IOException;
import java.util.Properties;

public class Sistemas {

	public static void main(String[] args) throws IOException {
		
		Properties p = System.getProperties();
		System.out.println(p.getProperty("java.version"));
		p.setProperty("xti.curso.java.version", "1.0.0");
		
		/*
		Set<Object> pk =  p.keySet();
		
		for(Object key: pk ){
			System.out.println(key + " = " + p.get(key));
		}*/
		
		/*
		Console c = System.console();
		System.out.println("Usuário: ");
		String user = c.readLine();
	
		System.out.println("Senha: ");
		char[] senha = c.readPassword();
		
		System.out.println("Usuário: " + user + "\nSenha:" + new String(senha));
	 	*/
		
		
		Runtime.getRuntime().exec("notepad");
	}
}
