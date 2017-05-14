package jdbc;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class IncluirDados {

	public static void main(String[] args) throws SQLException {
		
		String url ="jdbc:oracle:thin:@localhost:1521:xe";
		String sql = "INSERT INTO PESSOA VALUES (?, ?, ?, ?)";
		String[] pessoas = {"Alex", "Levi", "Cayo", "Leandro", "Lucas"};
		
		try(Connection con = DriverManager.getConnection(url, "ramon", "euamococa11")){
			
			try(PreparedStatement stm = con.prepareStatement(sql)){
				for(int i = 0; i < pessoas.length; i ++){
					stm.setInt(1, i+3);
					stm.setString(2, pessoas[i]);
					stm.setString(3, "M");
					stm.setString(4, pessoas[i].toLowerCase() + "@gmail.com");
					stm.addBatch();
				}
				
				stm.executeBatch();
			}catch(SQLException e){
				
			}
			
			sql = "SELECT NOME, EMAIL FROM PESSOA";
			try(PreparedStatement stm2 = con.prepareStatement(sql);
			ResultSet rs = stm2.executeQuery();){
				
				while(rs.next()){
					System.out.println(rs.getString(1) + ":" + rs.getString(2));
				}
			}
			
			
		}
	}
}
