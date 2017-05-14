package jdbc;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class ContaCRUD {

	
	public void tranferir(Connection con, Conta origem, Conta destino, double valor) throws SQLException{
		
		if(origem.saldo >= valor){
			
			try{
				con.setAutoCommit(false);
				
				/* SAQUE */
				origem.saldo -= valor;
				alterar(con, origem);
				
				
				
				/* DEPÓSITO */
				destino.saldo += valor;
				alterar(con, destino);
				
				con.commit();
			}catch(Exception e){
				con.rollback();
			}
		}
		
		
	}
	
	
	public void criar(Connection con, Conta conta) throws SQLException{
		String sql = "insert into conta values (?, ?, ?)";
		try(PreparedStatement stm = con.prepareStatement(sql)){
			stm.setInt(1, conta.numero);
			stm.setString(2,  conta.cliente);
			stm.setDouble(3, conta.saldo);
			stm.executeUpdate();
		}
	}
	
	
	public List<Conta> ler(Connection con) throws SQLException{
		List<Conta> lista = new ArrayList<>();
		
		String sql = "select numero, cliente, saldo from conta";
		
		try(PreparedStatement stm = con.prepareStatement(sql);
				ResultSet rs = stm.executeQuery()){
			while(rs.next()){
				lista.add(new Conta(rs.getInt(1), rs.getString(2), rs.getDouble(3)));
				
			}
			
		}
		
		return lista;
	}
	
	
	public void alterar(Connection con, Conta conta) throws SQLException{
		String sql = "update conta set cliente=?, saldo = ? where numero = ?";
		
		try(PreparedStatement stm = con.prepareStatement(sql)){
			stm.setString(1, conta.cliente);
			stm.setDouble(2, conta.saldo);
			stm.setInt(3, conta.numero);
			stm.executeUpdate();
			
			
		}
		
	}
	
	
	public void excluir(Connection con, Conta conta) throws SQLException{
		
		String sql = "delete conta where numero = ?";
		
		try(PreparedStatement stm = con.prepareStatement(sql)){
			
			stm.setInt(1, conta.numero);
			stm.executeUpdate();
		}
		
	}
	
	public static void main(String[] args) throws SQLException, ClassNotFoundException {
		
		String url = "jdbc:mysql://localhost:3307/xti";
		Class.forName("com.mysql.jdbc.Driver");
		try(Connection con = DriverManager.getConnection(url, "ramon", "euamococa11")){
			
			ContaCRUD crud = new ContaCRUD();
			
			
			
			
			/*
			 * 
			crud.criar(con, conta1);
			crud.criar(con, conta2);
			crud.criar(con, conta3);
			crud.excluir(con, conta3);
			Conta conta1 = new Conta(1, "Ramon", 1000.10);
			
			conta1.saldo = 9000.99;
			crud.alterar(con, conta1);
			
			Conta conta2 = new Conta(2, "Isaque", 1000.10);
			Conta conta3 = new Conta(3, "Alex", 1000.10);
			*/
			
	
			
			
			List<Conta> contas = crud.ler(con);
			
			for(Conta conta : contas){
				System.out.println(conta);
			}
			
			
			Conta origem = contas.get(0);
			Conta destino = contas.get(1);
			crud.tranferir(con, origem, destino, 500);
			
			
			
			contas = crud.ler(con);
			
			for(Conta conta : contas){
				System.out.println(conta);
			}
			
			
		}
		
		
	}
}
