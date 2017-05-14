package construtores;

public class CarroTest {

	public static void main(String[] args) {
		
		Carro ferrari = new Carro();
		ferrari.modelo = "Ferrari Enzo";
		ferrari.velocidadeMaxima = 349;
		ferrari.segundosZeroACem = 3.2;
		
		Carro koenigsegg = new Carro("Koenigsegg CCXR", 430, 3.1);
		System.out.println(koenigsegg.modelo);
		

	}

}
