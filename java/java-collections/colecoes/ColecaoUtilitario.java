package colecoes;

import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collection;
import java.util.Collections;
import java.util.List;

public class ColecaoUtilitario {

	public static void main(String[] args) {
		
		List<String> list = new ArrayList<>();
		list.add("Guaraná");
		list.add("Uva");
		list.add("Manga");
		list.add("Coco");
		list.add("Açaí");
		list.add("Banana");
		System.out.println(list);
		
		Collections.sort(list);
		System.out.println(list);
		
		Collections.reverse(list);
		System.out.println(list);
		
		Collections.shuffle(list);
		System.out.println(list);
		
		Collections.addAll(list, "Cupuaçu", "Laranja", "Laranja");
		System.out.println(list);
		
		System.out.println(Collections.frequency(list, "Laranja"));
		
		List<String> list2 = Arrays.asList("Acerola", "Graviola");
		boolean d = Collections.disjoint(list, list2);
		System.out.println(d);
		
		Collections.sort(list);
		int indice = Collections.binarySearch(list, "Guaraná");
		System.out.println(list);
		System.out.println(indice);
		
		Collections.fill(list, "Açaí");
		System.out.println(list);
		
		//coleção não modificavel
		Collection<String> constante = 
				Collections.unmodifiableCollection(list);
		
	}
}
