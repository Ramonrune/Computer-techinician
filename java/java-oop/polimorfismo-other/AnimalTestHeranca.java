package polimorfismo;

public class AnimalTestHeranca {

	public static void main(String[] args) {
		
		CachorroHeranca toto = new CachorroHeranca();
		toto.comida = "Carne";
		toto.dormir();
		
		GalinhaHeranca carijo = new GalinhaHeranca();
		carijo.dormir();
		
	}
	
}
