package fundamentos;

public class TiposPrimitivos{
	
	public static void main(String[] args){
		
		int idade = 31;
		double preco = 12.45;
		char sexo = 'M'; //Unicode
		boolean casado = false;
		byte b = 127; //cem
		short s = 32767; //32 mil
		short s1 = 32_767; //a partir da versão 7
		int i = 2_147_483_647; //2 bilhões
		long l = 9000000000000000000l;
		
		//IEEE 754
		double d = 1.7976931348623157E+308;
		float f = 123f;
		
		i = s; // cast implicito
		System.out.println(s);
		System.out.println(i);
		
		i = (int) l; //cast explicito
		System.out.println(i);
		System.out.println(l);
		
		
		byte bb = 0b01010101; // 8 bits / 1 byte
		short ss = 0b0101010101010101; // 16 bits / 2 bytes
		int ii = 0b01010101010101010101010101010101;
		
		
		
		
		System.out.println(ii);
		
	}
}
