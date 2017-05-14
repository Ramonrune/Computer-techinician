package classesFinal;

public abstract class Animal {

	
	double peso;
	String comida;
	

	public Animal(double peso, String comida){
		this.peso = peso;
		this.comida = comida;
	}
	
	final void dormir(){
		System.out.println("Dormiu");
	}
	
	abstract void fazerBarulho();
}
