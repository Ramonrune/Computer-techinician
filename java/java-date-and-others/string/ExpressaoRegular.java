package string;

import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class ExpressaoRegular {

	public static void main(String[] args) {
		
		String padrao = "Java";
		String texto = "Java";
		boolean b = texto.matches(padrao);
		System.out.println(b);
		
		
		boolean b1 = "Java".matches("java");
		System.out.println(b1);
		
		/**
		 * MODIFICADORES
		 * 
		 * (?i), ignora maiusculas e minusculas
		 * (?x), comentarios
		 * (?m), multilinhas
		 * (?s), dottal
		 * 
		 * 
		 * 
		 */
		System.out.println("Modificadores");
		boolean b2 = "Java".matches("(?i)java");
		System.out.println(b2);
		
		
		boolean b3  = "Java".matches("(?im)java");
		
		System.out.println(b3);
		
		/**
		 * Metacaracteres
		 * . qualquer caracter
		 * \d digitos [0-9]
		 * \D não é digito [^0-9]
		 * \s espaços [\t\n\x0B\f\r]
		 * \S não é espaço [^\s]
		 * \w letra [a-zA-Z_0-9]
		 * \W não é letra
		 */
		System.out.println("Metacaracteres");
		boolean b4 = "@".matches(".");
		boolean b5 = "2".matches("\\d");
		boolean b6 = "a".matches("\\d");
		boolean b7 = "a".matches("\\w");
		boolean b8 = " ".matches("\\s");
		boolean b9 = "Pie".matches("...");
		boolean b10 = "21".matches("\\d\\d");
		
		String cep = "\\d\\d\\d\\d\\d-\\d\\d\\d";
		boolean b11 = "70294-070".matches(cep);
		System.out.println(b4);
		System.out.println(b5);
		System.out.println(b6);
		System.out.println(b7);
		System.out.println(b8);
		System.out.println(b9);
		System.out.println(b10);
		System.out.println(b11);
		
		
		
		
		/**
		 * Quantificadores
		 * 
		 * X{n} X, exatamente n vezes
		 * X{n,} X, pelo menos n vezes
		 * X{n, m} X, pelo menos n mas não mais do que m vezes
		 * X? X, 0 ou 1 vez
		 * X* X, 0 ou mais vezes
		 * X+ X, 1 ou + vezes
		 * 
		 */
		
		System.out.println("Quantificadores");
		boolean a = "21".matches("\\d{2}");
		boolean a1 = "123".matches("\\d{2,}");
		boolean a2 = "123456".matches("\\d{2,5}");
		boolean a3 = "".matches(".?");
		boolean a4 = "aa".matches(".?");//0 ou 1
		boolean a5 = "".matches(".*"); // 0 ou +
		boolean a6 = "123".matches(".+"); //1 ou +
		boolean a7 = "70294-070".matches("\\d{5}-\\d{3}");
		boolean a8 = "12/02/1980".matches("\\d{2}/\\d{2}/\\d{4}");
		
		
		System.out.println(a);
		System.out.println(a1);
		System.out.println(a2);
		System.out.println(a3);
		System.out.println(a4);
		System.out.println(a5);
		System.out.println(a6);
		System.out.println(a7);
		System.out.println(a8);
		
		
		
		/**
		 * Metacaracter de fronteira
		 * 
		 * ^ inicia
		 * 
		 * $ finaliza
		 * | ou 
		 */
		
		
		System.out.println("Metacaracter de fronteira");
		
		boolean c = "Pier21".matches("^Pier.*");
		boolean c1 = "Pier21".matches(".*21$");
		boolean c2 = "tem java aqui".matches(".*java.*");
		boolean c3 = "tem java aqui".matches("^tem.*aqui$");
		boolean c4 = "sim".matches("sim|não");
		
		System.out.println(c);
		System.out.println(c1);
		System.out.println(c2);
		System.out.println(c3);
		System.out.println(c4);
		
		
		
		System.out.println("Agrupadores");
		
		/**
		 * Agrupadores
		 * 
		 * [..] agrupamento
		 * 
		 * [a-z] alcançe
		 * 
		 * [a-e][i-u] união
		 * 
		 * [a-z&&[aeiou]] interseção
		 * 
		 * [^abc] exceção
		 * [a-z&&[^m-p]] suybtração
		 * \x fuga literal
		 */
		
		boolean exp1 = "x".matches("[a-z]");
		boolean exp2 = "3".matches("[0-9]");
		boolean exp3 = "true".matches("[tT]rue");
		boolean exp4 = "true".matches("[tT]rue|[yY]es");
		boolean exp5 = "Beatriz".matches("[A-Z][a-zA-Z]*");
		boolean exp6 = "olho".matches("[^abc]lho");
		boolean exp7 = "crau".matches("cr[ae]u");
		boolean exp8 = "rh@xti.com.br".matches("\\w+@\\w+\\.\\w{2,3}");
		
		
		System.out.println(exp1);
		System.out.println(exp2);
		System.out.println(exp3);
		System.out.println(exp4);
		System.out.println(exp5);
		System.out.println(exp6);
		System.out.println(exp7);
		System.out.println(exp8);
		
		
		
		String doce = "Qual é o Doce mais doCe que o doce ?";
		Matcher matcher = Pattern.compile("((?i)doce)").matcher(doce);
		while(matcher.find()){
			System.out.println(matcher.group());
		}
		
		
		/**
		 * Substituições
		 * 
		 */
		
		System.out.println("Substituições");
		
		String r = doce.replaceAll("(?i)doce", "DOCINHO");
		String rato = "O rato roeu a roupa do rei de roma";
		String r1 = rato.replaceAll("r[aeiou]", "XX");
		String r2 = "Tabular este texto".replaceAll("\\s","\t");
		
		String url = "www.xti.com.br/clientes-2011.html";
					// "http://www.xti.com.br/2011/clientes.jsp"
	
		String re = "www.xti.com.br/\\w{2,}-\\d{4}.html";
		boolean ur = url.matches(url);
		
		re = "(www.xti.com.br)/(\\w{2,})-(\\d{4}).html";
		
		String resultado = url.replaceAll(re,"http://$1/$3/$2.jsp");
		
		System.out.println(r);
		System.out.println(r1);
		System.out.println(r2);
		System.out.println(ur);
		System.out.println(resultado);
	}
}
