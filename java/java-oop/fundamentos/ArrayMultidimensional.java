package fundamentos;

public class ArrayMultidimensional{
	
	public static void main(String[] args){
	
		String[] uma = {"Ricardo", "Sandra", "Beatriz", "Lawrence", "Laura","Juliana"};
		//uma[0]
		//uma.length;
		
		String[][] duas= 
			{
					{"Ricardo", "M" , "DF"},
					{"Sandra", "F", "MG" }
					
					
			};
		
		int [][][][] ndimensoes;
		//ndimensoes[0][1][2][3]
		
		
		System.out.println(duas[0][0]);
		System.out.println(duas[1][0]);
		System.out.println(duas.length);
		System.out.println(duas[0].length);
		
		duas[1][0] = "SANDRA";
		
		System.out.println(duas[1][0]);
	}
}
