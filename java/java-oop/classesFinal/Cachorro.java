package classesFinal;
//pode ser abstract
/**
 * 
 * Final não pode ser herdado
 *
 */
public final class Cachorro extends Animal{

	//double peso;
	
	public Cachorro(){
		super(30, "Carne");
		
	}
	/*
	void dormir(){
		
	}
	 */
	@Override
	void fazerBarulho() {
		System.out.println("Au, Au !");
		
	}
	
	
	
}
