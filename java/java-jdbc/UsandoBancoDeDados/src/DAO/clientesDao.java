package DAO;
import Conectar.Conexao;
import Modelo.clientes;
import java.sql.*;

public class clientesDao {
    private Connection connection;
    
    long id;
    String nome;
    String cidade;
    String data;
    String registro;

      public clientesDao() {
        this.connection = new Conexao().getConnection();        
    }
    
    public void adiciona(clientes cliente){ 
        String sql = "INSERT INTO clientes(nome,cidade,data)VALUES(?,?,?)";
        try{
            PreparedStatement stmt = connection.prepareStatement(sql);
            stmt.setString(1, cliente.getNome());
            stmt.setString(2, cliente.getCidade());
            stmt.setString(3, cliente.getData());
             stmt.execute();
             stmt.close();
        }
        catch(SQLException u){
            throw new RuntimeException(u);
        }
    }
    
    
}
