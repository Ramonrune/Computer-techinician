package fundamentos;

public class BreakContinue{
	
	public static void main(String[] args){
		
		while(true){
			System.out.println("Entrou");
			break;
			
		}
		
		/*
		 * Rótulos
		um:
		for(){
			dois:
			for(int i = 0; i < 10; i++){
				if(i == 5){
					break um;
					//continue;
				}
				
				System.out.println(i);
			}
		*/
		
		boolean [] [] matrix = {
				{false,true,false,false,false},
				{false,false,false,false,false}
		};
		
		busca:
		for(int a = 0; a < matrix.length; a++){
			System.out.print("\nA ");
			for( int b = 0; b < matrix[a].length; b++){
				if(matrix[a][b]==true){
					System.out.print("TRUE ");
					//break;
					//break busca;
					continue busca;
				}
				System.out.print("B ");
			}
			
		}
		
	}
}