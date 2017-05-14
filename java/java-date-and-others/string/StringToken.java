package string;

public class StringToken {

	public static void main(String[] args) {
		
		String s = "XHTML; CSS; JavaScript; JQuery; Java";
		
		String[] tokens = s.split(";");
		System.out.println(tokens.length + " tokens");
		
		for(String token : tokens){
			System.out.println(token);
		}
		
		String x = "Venha trabalhar na XTI";
		
		
		String[] tokens1 = x.split(" ");
		for (String string : tokens1) {
			System.out.println(string);
		}
		
	}
}
