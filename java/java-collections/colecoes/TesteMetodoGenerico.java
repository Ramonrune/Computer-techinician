package colecoes;

public class TesteMetodoGenerico {

	public static void main(String[] args) {
		Integer[] intArray = {1,2,3,4,5,6};
		Double[] doubleArray = {1.1,2.2,3.3,4.4,5.5,6.6};
		Character[] charArray = {'H','E','L','L','O'};
		
		System.out.println("Array de inteiros contem: ");
		printArray(intArray);
		System.out.println("\nArray de double contem:");
		printArray(doubleArray);
		System.out.println("\nArray de caracteres contem:");
		printArray(charArray);
		
	}
	
	public static < T > void printArray(T[] inputArray){
		
		for(T element : inputArray){
			System.out.printf("%s ", element);
		}
		
		System.out.println();
	}
}
