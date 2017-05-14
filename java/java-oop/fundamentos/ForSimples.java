package fundamentos;

public class ForSimples{
	
	public static void main(String[] args){
		
		String texto = "";
		for(int i = 0; i < 3; i++){
			texto += i + ",";
		}
		
		System.out.println(texto);
		
		
		for(int i = 10; i > 0; i--){
			System.out.println(i);
		}
		
		
		for(int i = 0; i <= 20; i++){
			if(i % 2 == 0){
				System.out.println("O numero " + i + " é par");
			}
		}
		
		
		int tamanho = 5;
		for(int x = 0; x < tamanho; x++){
			for(int i = 0; i < tamanho; i++){
				System.out.print("* ");
			}
			System.out.println();
		}
		
	}
}
