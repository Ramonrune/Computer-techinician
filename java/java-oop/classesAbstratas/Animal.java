package classesAbstratas;

public abstract class Animal {

	
	double peso;
	String comida;
	

	public Animal(double peso, String comida){
		this.peso = peso;
		this.comida = comida;
	}
	
	void dormir(){
		System.out.println("Dormiu");
	}
	
	abstract void fazerBarulho();
}
