package colecoes;

import java.util.LinkedList;
import java.util.Queue;

public class ColecaoQueue {

	public static void main(String[] args) {
		
		//FIFO FIRST IN FIRST OUT
		Queue<String> fila = new LinkedList<>();
		fila.add("Ramon");
		fila.add("Cayo");
		fila.offer("Leandro");
		System.out.println(fila);
		
		
		System.out.println(fila.peek());
		System.out.println(fila.poll()); //remove o elemento do início da fila
		System.out.println(fila);
		
		
		/* Outros métodos disponíveis em LinkedList*/
		
		LinkedList<String> f = (LinkedList<String>) fila;
		f.addFirst("Lucas");
		f.addLast("Ramon");
		
		System.out.println(f);
		
		System.out.println(f.peekFirst());
		System.out.println(f.peekLast());
		f.pollFirst();
		f.pollLast();
		
		System.out.println(f);
	}
}
