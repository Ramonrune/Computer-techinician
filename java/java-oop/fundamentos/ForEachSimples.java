package fundamentos;

import java.util.ArrayList;

public class ForEachSimples{
	
	public static void main(String[] args){
		
		int[] pares = {2,4,6,8};
		
		for(int i = 0; i < pares.length; i++){
			int par = pares[i];
			System.out.println(par);
		}
		
		
		for(int par : pares){
			System.out.println(par);
		}
		
		ArrayList<Integer> lista = new ArrayList<Integer>();
		for(int i = 0; i < 10; i++){
			lista.add(i);
		}
		
		
		for(Integer numero : lista){
			System.out.println(numero);
		}
	}
}
