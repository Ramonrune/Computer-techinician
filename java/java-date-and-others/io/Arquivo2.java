package io;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

public class Arquivo2 {

	public static void main(String[] args) throws IOException{
	
		Path path = Paths.get("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/src/manipulacaoIOBuffer_63/texto.txt");
		Charset utf8 = StandardCharsets.UTF_8;
		
		/** Escrita de arquivos */
		//BufferedWriter w = null;
		//depois do java 7
		try(BufferedWriter w = Files.newBufferedWriter(path, utf8) ){
			//w = Files.newBufferedWriter(path, utf8);
			w.write("Outro Texto\n");
			w.write("Outro Texto\n");
			//w.flush();
				
		}
		catch(IOException e){
			e.printStackTrace();
		}
		/*
		finally{
			if(w != null){
				w.close();
			}
		}
		*/
		
		
		/** Leitura */
		
		try(BufferedReader r = Files.newBufferedReader(path, utf8)){
			
			String linha = null;
			while((linha = r.readLine()) != null){
				System.out.println(linha);
				
			}
			
		}
		catch(IOException e){
			e.printStackTrace();
		}
		
		
		
		
	}
	
	
}
