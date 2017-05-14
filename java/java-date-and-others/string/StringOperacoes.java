package string;

public class StringOperacoes {

	public static void main(String[] args) {
		
		String s1 = "Write Once";
		String s2 = s1 + " Run Anywere";
		String s3 = new String("Java Virtual Machine");
		char[] array = {'J','a','v','a'};
		String s4 = new String(array);
		System.out.println();
		
		//operações
		int tamanho = s1.length();
		char letra = s1.charAt(0); // 0 a length() - 1
		String texto = s1.toString();
		System.out.println(tamanho + " " + letra + " " + texto);
		System.out.println();
		
		//localização
		System.out.println(s3.indexOf('J'));
		System.out.println(s3.indexOf("Virtual"));
		System.out.println(s3.lastIndexOf('a'));
		System.out.println(s3.isEmpty());
		System.out.println();
		
		//comparação
		String xti = "XTI";
		System.out.println(xti.equals("xti"));
		System.out.println(xti.equalsIgnoreCase("xti"));
		System.out.println(xti.startsWith("XT"));
		System.out.println(xti.startsWith("TI"));
		System.out.println(xti.endsWith("TI"));
		System.out.println("amor".compareTo("bola"));
		// antes = -1
		System.out.println("bola".compareTo("amor"));
		// depois = 1
		System.out.println("amor".compareTo("amor"));
		// igual = 0
		System.out.println("123".compareTo("234"));
	
		String so = "Olhe, olhe!";
		// true informa o ignore case
		System.out.println(so.regionMatches(true, 6, "Olhe", 0, 4));
		
		
		
		//extração
		String l = "O Brasil é Lindo";
		String sl = l.substring(11);
		System.out.println(sl);
		String sl2 = l.substring(2,8);
		System.out.println(sl2);
		
		
		
		//modificação
		sl = l.concat(" que Maravilha");
		System.out.println(sl);
		
		sl = l.replace('s', 'z');
		System.out.println(sl);
		
		sl = l.replaceFirst(" ", "X");
		System.out.println(sl);
		
		sl = l.replaceAll(" ", "X");
		System.out.println(sl);
		
		System.out.println(sl.toUpperCase());
		System.out.println(sl.toLowerCase());
		
		System.out.println("      esp aços      ".trim());
		
		
		
	}
}
