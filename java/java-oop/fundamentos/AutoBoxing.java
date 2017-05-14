package fundamentos;

public class AutoBoxing {

	public static void main(String[] args) {

		Integer x = new Integer(555); // empacotado
		int a = x.intValue(); // desempacotar
		a++; // incrementar
		x = new Integer(a); // re-empacotar

		System.out.println(x.intValue());

		Integer num = 555;
		num++; // desempacota, incrementa, reempacotando
		System.out.println(num);
		// num.intValue();

		Boolean v = new Boolean("true");
		if (v) { // v.booleanValue()
			System.out.println(v);
		}

	}
}
