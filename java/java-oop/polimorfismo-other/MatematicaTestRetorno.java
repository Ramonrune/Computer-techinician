package polimorfismo;

public class MatematicaTestRetorno {

	public static void main(String[] args) {
		
		MatematicaComRetorno m = new MatematicaComRetorno();
		int ma = m.maior(10, 20);
		System.out.println(ma);
		
		double so = m.soma(10, 20);
		System.out.println(so);
		

		double soma = m.soma(m.maior(2, 4), m.maior(3, 5));
		System.out.println(soma);
		
		
		System.out.println(m.raiz(27));
		System.out.println(m.raiz(276));
		System.out.println(Math.sqrt(276));
	
		
		
		
	}

}
