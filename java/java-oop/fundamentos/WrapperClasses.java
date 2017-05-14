package fundamentos;

public class WrapperClasses{
	
	/**
	 * @param args
	 */
	public static void main(String[] args){
	
		Integer idade = new Integer(18);
		
		
		Double preco = new Double(12.45);
		Double preco1 = new Double("12.45");
		double d = preco1.doubleValue();
		int i = preco.intValue();
		byte b = preco.byteValue();
		
		
		Character sexo = new Character('M');
		
		Boolean casado = new Boolean(true);
		Boolean casado1 = new Boolean("true"); // "yes"
		
		
		//Conversão estática
		double d1 = Double.parseDouble("123.4");
		int i1 = Integer.parseInt("123");
		float f1 = Float.parseFloat("3.14f");
		
		
		int i2 = Integer.valueOf("101010", 2);
		System.out.println(i2);
		
	}
}