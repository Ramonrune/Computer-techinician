package classesAbstratas;
//pode ser abstract
public class Cachorro extends Animal{

	//double peso;
	
	public Cachorro(){
		super(30, "Carne");
		
	}

	@Override
	void fazerBarulho() {
		System.out.println("Au, Au !");
		
	}
	
	
	
}
