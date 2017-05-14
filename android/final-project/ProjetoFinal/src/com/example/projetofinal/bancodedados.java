package com.example.projetofinal;
import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

/**
 * @Autor:Ramon Lacava 3IT
 * @Data:19/05/2015
 * 
 * Arquivo responsavel pelo banco de dados do autentificador
 * 
 */

public class bancodedados extends SQLiteOpenHelper {
    //recomenda -se criar string para evitar erros na construção do id
    private static final int VERSAO = 1;
    private static final String TABELA = "usuario";
    private static final String DATABASE = "usuario";

    public bancodedados(Context context) {
        //construtor que usa a classe mas SQLiteOpenHelper - necessita de 4 parametros
        super(context, DATABASE, null, VERSAO);

    }

    public void onCreate(SQLiteDatabase database) {
        String criatabela = "CREATE TABLE " + TABELA + " (id INTEGER PRIMARY KEY," +
                "nome TEXT UNIQUE NOT NULL," +
                "senha TEXT,"+
                "codigo TEXT);";
        database.execSQL(criatabela);


    }

    //metodo que atualiza o banco de dados
    public void onUpgrade(SQLiteDatabase database, int versaoAntiga, int versaoNova) {
        String sql = "DROP TABLE IF EXISTS " + TABELA;
        database.execSQL(sql);
        onCreate(database);
    }
    //metodo que insere o login no banco de dados
    public void insere(int id , String nome , String senha,String codigo) {
        ContentValues conteudo = new ContentValues();
        conteudo.put("id", id);
        conteudo.put("nome", nome);
        conteudo.put("senha", senha);
        conteudo.put("codigo", codigo);
        getWritableDatabase().insert(TABELA,null,conteudo);
    }
    
    
    //checa se o login está correto ou não está
    //se estiver correto retorna 1 , se não retorna 0
    public String checa(String nome,String senha,String codigo){
    	SQLiteDatabase db = getReadableDatabase();
    	String valor="";
        Cursor c = getReadableDatabase().rawQuery("SELECT * FROM " + TABELA + ";",null);


        while(c.moveToNext()){
        	if((nome.equals(c.getString(c.getColumnIndex("nome")))) && (senha.equals(c.getString(c.getColumnIndex("senha")))) && (codigo.equals(c.getString(c.getColumnIndex("codigo"))))){
        		valor="1";
        	}
        	else {
        		valor="0";
        	}
        }
    	return valor;
    }
    //aqui ele atualiza o código que é gerado pelo autentificador
    public void Atualiza(String codigo){
    	SQLiteDatabase db = getReadableDatabase();
    	ContentValues conteudo = new ContentValues();
    	conteudo.put("codigo", codigo);
        getWritableDatabase().update(TABELA,conteudo, codigo, null);
    }



    //Nas informações acima , estamos 'ensinando a colocar os dados dentro das colunas"
    //Agora estas informaç~es serão acrescentadas ao banco
    //O metodo insert pertence ao método getWritable


}

