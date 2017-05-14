package polimorfismo;

public class AnimalTest{
	
	public static void barulho(Animal animal){
		animal.fazerBarulho();
	}
	
	public static void barulhoSemPolimorfismo(String animal){
		if(animal.equals("Cachorro")){
			System.out.println("Au, au!");
		}
		else if(animal.equals("Galinha")){
			System.out.println("Cô, có!");
		}
	}

	public static void main(String[] args) {
		
		Animal generico = new Animal(0, null);
		Animal toto = new Cachorro();
		
		Animal carijo = new GalinhaPolimorfismo();
		
		generico.fazerBarulho();
		toto.fazerBarulho();
		carijo.fazerBarulho();
		
		
		barulho(toto);
		barulho(carijo);
		
		barulhoSemPolimorfismo("Cachorro");
		barulhoSemPolimorfismo("Galinha");
	}
	
}
