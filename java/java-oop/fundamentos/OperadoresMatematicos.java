package fundamentos;

public class OperadoresMatematicos{
	
	public static void main(String[] args){
		
		int x = 6;
		
		//int y = ++x; //pré-incremento
		int y = x++;//pós incremento
		
		System.out.println("x = "+ x);
		System.out.println("y = " + y);
		
		//int x = 7 + 3;
		// 7 * 3
		// 7 - 3
		// 7 / 3
		// 7 % 3
		// +7
		// -7
	
		
		
		System.out.println(x);
	
		
		System.out.println(-(+3));
		System.out.println(-(-3));
		String ola = "Oi " + "Programador Java";
		System.out.println(x + y);
		
		
		
		int n = 6;
		//int n1 = --n;//pré-decremento
		int n1 = n--; //pós-decremento
		System.out.println("n = " + n);
		System.out.println("n1 = " + n1);
		
	}
}
