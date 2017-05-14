package polimorfismo;

public class MatematicaTest {

	public static void main(String[] args) {
		
		Matematica m = new Matematica();
		
		double total = m.soma("Título",2,3,4,5,6,7,8,9,2,10);
		
		double[] nums = {2,3,4,5,6,7,8,9,2,10};
		
		double total1 = m.soma1(nums);
		
		System.out.println(total);
		
		System.out.println(total1);
	
		
		
		
	}

}
