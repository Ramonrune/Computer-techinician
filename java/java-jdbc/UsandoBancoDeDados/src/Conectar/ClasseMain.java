package Conectar;
import java.sql.Connection;
import java.sql.SQLException;

public class ClasseMain {
    public static void main(String[] args) throws SQLException{
        
        Connection connection = new 
                Conexao().getConnection();
        System.out.println("Conexão aberta!");
        
        connection.close();
        
    }
}
