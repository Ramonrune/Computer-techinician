package fundamentos;

public class OperadoresDeComparacao{
		
	public static void main(String[] args){
		
		int x = 6;
		Integer x1 = 6;
		//x == 6
		
		System.out.println(x == 6);
		System.out.println(x == 7);
		//System.out.println(x == "6");
		System.out.println(x != 7);
		System.out.println(x > 5);
		System.out.println(x >= 6);
		System.out.println(x < 7);
		System.out.println(x <= 6);
		
		System.out.println(x1 instanceof Integer);
		System.out.println("oi" instanceof String);
	}
}
