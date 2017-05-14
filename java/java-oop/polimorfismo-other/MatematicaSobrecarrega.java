package polimorfismo;

public class MatematicaSobrecarrega {
	
	public double media(int x){
		System.out.print("media(int x) ");
		return x;
	}
	
	public double media(int x, int y){
		System.out.print("media(int x, int y) ");
		return (x + y) / 2;
	}
	
	public double media(String x, String y){
		System.out.print("media(String x, String y) ");
		int ix = Integer.parseInt(x);
		int iy =Integer.parseInt(y);
		return (ix + iy) / 2;
	}
	
	
	public double soma(double ...numeros){
		double total = 0;
		for(double n : numeros){
			total += n;
		}
		return total;
	}
	
	public double media(double ... numeros){
		System.out.print("media(double ... numeros) ");
		return this.soma(numeros)/ numeros.length;
		
	
	}
}
