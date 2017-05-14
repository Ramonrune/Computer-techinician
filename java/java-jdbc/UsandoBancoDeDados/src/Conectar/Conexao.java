package Conectar;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;










public class Conexao {
   public Connection getConnection(){
       try{
           return 
                 DriverManager.getConnection("jdbc:mysql://localhost:3306/tabela","root","p@ssw0rd");
           
       }
       
       catch(SQLException execao){
            throw new RuntimeException(execao);
       }
   } 
}
