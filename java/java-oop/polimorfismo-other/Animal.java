package polimorfismo;

public class Animal {

	//private int serial;
	protected int serial;
	double peso;
	String comida;
	/*
	public Animal(){
		this(0, null);
	}
	*/
	
	public Animal(double peso, String comida){
		this.peso = peso;
		this.comida = comida;
	}
	
	void dormir(){
		System.out.println("Dormiu");
	}
	
	void fazerBarulho(){
		System.out.println("Fazer barulho");
	}
}
