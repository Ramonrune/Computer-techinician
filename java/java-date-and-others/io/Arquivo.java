package io;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

public class Arquivo {

	public static void main(String[] args) throws IOException {
		
		//Java 7
		Path path = Paths.get("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/src/manipulacaoDeArquivos_62/texto.txt");
		System.out.println(path.toAbsolutePath());
		System.out.println(path.getParent());
		System.out.println(path.getRoot());
		System.out.println(path.getFileName());
		
		
			
			/* CRIAÇÃO DE DIRETÓRIOS */
			
			Files.createFile(path.toAbsolutePath());
			//Files.createDirectories(path.toAbsolutePath()); // cria diretórios
		
			/* ESCREVER E LER ARQUIVOS */
			byte[] bytes = "Meu texto".getBytes();
			
			Files.write(path,bytes); // cria, limpa, escreve 
			
			byte[] retorno = Files.readAllBytes(path);
			
			System.out.println(new String(retorno) + "oi");
		
	
	}
}
