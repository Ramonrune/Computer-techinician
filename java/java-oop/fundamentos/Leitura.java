package fundamentos;

import java.util.ArrayList;
import java.util.Scanner;


public class Leitura{
	
	public static void main(String[] args){
		
		
		ArrayList<String> produtos = new ArrayList<String>();
		Scanner s = new Scanner(System.in);
		System.out.println("Liste seus Produtos : Para sair digite FIM");
		String produto;
		
		
		while(!"FIM".equals(produto = s.nextLine())){

			produtos.add(produto);
			
		}
		
		System.out.println(produtos.toString());
		
	}
}
