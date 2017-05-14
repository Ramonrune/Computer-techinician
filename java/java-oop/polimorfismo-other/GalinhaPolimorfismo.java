package polimorfismo;

public class GalinhaPolimorfismo extends Animal{

	public GalinhaPolimorfismo(){
		super(2, "Milho");
	}
	
	void fazerBarulho(){
		System.out.println("Cô có!");
	}
	
}
