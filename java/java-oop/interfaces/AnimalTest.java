package interfaces;

public class AnimalTest extends Object{

	public static void main(String[] args) {
		
		//Cachorro toto = new Cachorro();
		Animal toto = new Cachorro();
		toto.comida = "Carne";
		toto.dormir();
		
		//Galinha carijo = new Galinha();
		Animal carijo = new Galinha();
		carijo.dormir();
		
		System.out.println(toto instanceof Cachorro);
		System.out.println(toto instanceof Animal);
		
		System.out.println(toto.equals(carijo));
		toto.hashCode();
		System.out.println(toto.getClass());

		System.out.println(toto.toString());
	}
	
}
