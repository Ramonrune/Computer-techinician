package polimorfismo;

public class MatematicaTest1 {

	public static void main(String[] args) {

		MatematicaSobrecarrega m = new MatematicaSobrecarrega();
		System.out.println(m.media(5, 3));
		System.out.println(m.media("5", "3"));
		System.out.println(m.media(5));
		System.out.println(m.media(5,3,34,56));
		
	}

}
