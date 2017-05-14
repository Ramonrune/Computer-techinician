package polimorfismo;

public class CachorroTeste {

	public static void main(String[] args) {
		
		CachorroPoo pitbull = new CachorroPoo();
		pitbull.raca = "Pitbull";
		pitbull.tamanho = 40;
		pitbull.latir();
		
		
		CachorroPoo viralata = new CachorroPoo();
		viralata.raca = "Vira-Lata";
		viralata.tamanho = 30;
		viralata.latir();

	}

}
