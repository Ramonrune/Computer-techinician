package polimorfismo;

public class Cachorro extends Animal{

	//double peso;
	
	public Cachorro(){
		super(30, "Carne");
		
	}
	
	void fazerBarulho(){
		System.out.println("Au, Au !");
	}
}
