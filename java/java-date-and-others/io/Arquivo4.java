package io;

import java.io.BufferedWriter;
import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.charset.StandardCharsets;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardCopyOption;

public class Arquivo4 {

	public static void main(String[] args) throws IOException {
	
		Path path = Paths.get("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/src/ioCheckDeleteCreateCopyMove_65/texto.txt");
		Charset utf8 = StandardCharsets.UTF_8;
		BufferedWriter w = Files.newBufferedWriter(path, utf8);
		
		System.out.println(Files.exists(path));
		System.out.println(Files.isDirectory(path));
		System.out.println(Files.isRegularFile(path));
		System.out.println(Files.isReadable(path));
		System.out.println(Files.isExecutable(path));
		System.out.println(Files.size(path));
		System.out.println(Files.getLastModifiedTime(path));
		System.out.println(Files.getOwner(path));
		System.out.println(Files.probeContentType(path));
		
		
		/* DELETE */
		Files.delete(path);
		//Files.deleteIfExists(path);
		
		
	
		/* CREATE */
		Path path1 = Paths.get("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/src/ioCheckDeleteCreateCopyMove_65/texto1.txt");
		Files.deleteIfExists(path1);
		Files.createFile(path1);
		Files.write(path1, "Meu Texto".getBytes());
		
		
		/* COPY */
		Path copia = Paths.get("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/src/ioCheckDeleteCreateCopyMove_65/copia.txt");
		Files.copy(path1, copia, StandardCopyOption.REPLACE_EXISTING);
		
		
		/* MOVE */
		Path mover = Paths.get("C:/Users/Usuario/Desktop/DOCUMENTOS/Java/src/ioCheckDeleteCreateCopyMove_65/move/texto1.txt");
		Files.createDirectories(mover.getParent());
		Files.move(path1,mover, StandardCopyOption.REPLACE_EXISTING);
		
	}
	
}
