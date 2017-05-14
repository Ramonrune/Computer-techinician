package com.example.projetofinal;

import android.app.Activity;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
/*
 * @Autor:Ramon Lacava 3IT
 * @Date:19/05/2013
 * 
 * Arquivo da tela de login
 */
public class TelaLogin extends Activity {
	//elementos do layout que serão usados
	private EditText nome;
	private EditText senha;
	private EditText codigo;
	private Button entrar;
	
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.tela_login);
		//as ids são setadas com os campos
		nome = (EditText) findViewById(R.id.nome);
		senha = (EditText) findViewById(R.id.senha);
		codigo = (EditText) findViewById(R.id.codigo);
		entrar = (Button) findViewById(R.id.botao);
		
		//instanciado o banco de dados
		
		bancodedados db = new bancodedados(TelaLogin.this);
		Intent intent = getIntent();
		//pega o codigo do autentificador
		String cod = intent.getStringExtra("codigo");
		Log.i("Codigo de Verificação",cod);
		//insere um usuário no banco de dados
		db.insere(1,"admin","admin",cod);
		//no clique ele pega o que o usuário digitou
		entrar.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View v) {
				String nome1 = String.valueOf(nome.getText());
				String senha1 = String.valueOf(senha.getText());
				String codigo1 = String.valueOf(codigo.getText());
				bancodedados db = new bancodedados(TelaLogin.this);
				//ele checa se os dados digitados são iguais aos dados do banco de dados
				String resposta = db.checa(nome1, senha1, codigo1);
				Log.i(nome1,resposta);
				//se a resposta for igual a 1 ele loga
				if(resposta.equals("1")){
					Toast.makeText(TelaLogin.this, "Login Efetuado com Sucesso!", Toast.LENGTH_SHORT).show();
					Intent intent = new Intent(TelaLogin.this,Tempo.class);
					startActivity(intent);
				}
				if(resposta.equals("0")){
					Toast.makeText(TelaLogin.this, "Usuário não Encontrado!", Toast.LENGTH_SHORT).show();
				}
				
			}
		});
		
	}
}


