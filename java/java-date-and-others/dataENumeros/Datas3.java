package dataENumeros;

import java.text.DateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.Locale;

public class Datas3 {

	public static void main(String[] args) {
		
		Calendar c = Calendar.getInstance();
		c.set(1980, Calendar.FEBRUARY, 12);
		Date date = c.getTime();
		
		Locale padrao = Locale.getDefault();
		Locale brasil = new Locale("pt", "BR");
		Locale india = new Locale("hi","IN");
		Locale eua = Locale.US;
		Locale japao = Locale.JAPAN;
		Locale italia = Locale.ITALY;
		
		
		DateFormat f = DateFormat.getDateInstance(DateFormat.FULL);
		System.out.println(f.format(date));
		
		f = DateFormat.getDateInstance(DateFormat.FULL, brasil);
		System.out.println(f.format(date));
		
		f = DateFormat.getDateInstance(DateFormat.FULL, india);
		System.out.println(f.format(date));
		
		f = DateFormat.getDateInstance(DateFormat.FULL, eua);
		System.out.println(f.format(date));
		
		f = DateFormat.getDateInstance(DateFormat.FULL, japao);
		System.out.println(f.format(date));
		
		f = DateFormat.getDateInstance(DateFormat.FULL, italia);
		System.out.println(f.format(date));
	}
}
