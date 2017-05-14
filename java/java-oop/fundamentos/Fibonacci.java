package fundamentos;

import java.util.ArrayList;

public class Fibonacci{
	
	public static void main(String[] args){
	/**
	 * 1 + 2[3]     2 + 3 [5]      3 + 5 [8]    5 + 8[13]
	 * 
	 * Subtrai 3 - 1
	 * 5 - 2
	 * 
	 */
		
		int anterior = 1, proximo = 2;
		
		
		while(proximo < 50){
			proximo = proximo + anterior;
			anterior = proximo - anterior;
			System.out.println(proximo);
		}

		
		
	}
}