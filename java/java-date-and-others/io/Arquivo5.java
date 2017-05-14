package io;

import java.io.IOException;
import java.nio.file.DirectoryIteratorException;
import java.nio.file.DirectoryStream;
import java.nio.file.FileStore;
import java.nio.file.FileSystem;
import java.nio.file.FileSystems;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

public class Arquivo5 {

	public static void main(String[] args) throws IOException {

		Iterable<Path> dirs = FileSystems.getDefault().getRootDirectories();
		
		for(Path path: dirs){
			System.out.println(dirs);
		}
		
		/* Listar o conteúdo de um diretório */
		Path dir = Paths.get("C:/");
		try(DirectoryStream<Path> stream = Files.newDirectoryStream(dir)) {
			for(Path path : stream){
				System.out.println(path.getFileName());
			}
			
		} catch (IOException | DirectoryIteratorException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		System.out.println();
		FileSystem fs = FileSystems.getDefault();
		for(FileStore store : fs.getFileStores()){
			System.out.println("Unidade: " + store.toString());
			System.out.println("Total: " + store.getTotalSpace());
			System.out.println("Disponível: " + store.getUsableSpace());
			
		
			
			System.out.println("Utilizada: " + (store.getTotalSpace() - store.getUsableSpace()) );
			System.out.println();
		}
		
		
	}
	
}
