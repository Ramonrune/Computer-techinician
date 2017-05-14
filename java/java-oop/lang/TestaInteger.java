package br.com.caelum.lang;

import java.io.PrintStream;

public class TestaInteger {

	public static void main(String[] args) {
		Integer x1 = new Integer(10);
		Integer x2 = new Integer(10);
		
		String s1 = new String("s1");
		String s2 = new String("s1");
		
		if(x1.equals(x2)){
			System.out.println("Igual");
		}
		else{
			System.out.println("Diferente");
		}
		
		if(s1 == s2){
			System.out.println("Igual");
		}
		
		PrintStream saida = System.out;
		saida.println("Ola");
		
		TestaString s = new TestaString();
		System.out.println(s);
		
	}
}
