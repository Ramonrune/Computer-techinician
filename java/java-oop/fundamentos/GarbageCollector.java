package fundamentos;

public class GarbageCollector{
	
	public static void main(String[] args){
		//variavel primitiva
		int x = 7;
		x = 9;
		
		//variavel de referencia
		String y = "Ramon";
		y = "Ramon Lacava Gutierrez Gonçalales";
		y = null;
		System.out.println(y);
	}
	
}
