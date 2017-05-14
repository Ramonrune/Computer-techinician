package br.senai.sp.aplicacao2;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by B30 on 10/03/2015.
 */

public class ClienteDao extends SQLiteOpenHelper {
    //recomenda -se criar string para evitar erros na construção do id
    private static final int VERSAO = 1;
    private static final String TABELA = "clientes";
    private static final String DATABASE = "BANCOSENAI";

    public ClienteDao(Context context) {
        //construtor que usa a classe mas SQLiteOpenHelper - necessita de 4 parametros
        super(context, DATABASE, null, VERSAO);

    }

    public void onCreate(SQLiteDatabase database) {
        String criatabela = "CREATE TABLE " + TABELA + " (id INTEGER PRIMARY KEY," +
                "nome TEXT UNIQUE NOT NULL," +
                "telefone TEXT ," +
                "endereco TEXT," +
                "email TEXT, nota REAL , caminhofoto TEXT);";
        database.execSQL(criatabela);


    }


    public List<cliente> getLista(){
        List<cliente> clientes = new ArrayList<cliente>();
        //a implementação do cursor permite expor os dados obtidos pela query no sql
        //sqlitecursor é usado para "se auto sincronizar" internamente

        SQLiteDatabase db = getReadableDatabase();

        Cursor c = getReadableDatabase().rawQuery("SELECT * FROM " + TABELA + ";",null);


        while(c.moveToNext()){
            cliente cliente = new cliente();

            cliente.setId((c.getLong(c.getColumnIndex("id"))));
            cliente.setNome(c.getString(c.getColumnIndex("nome")));
            cliente.setTelefone(c.getString(c.getColumnIndex("telefone")));
            cliente.setEndereco(c.getString(c.getColumnIndex("endereco")));
            cliente.setEmail(c.getString(c.getColumnIndex("email")));
            cliente.setRank(c.getDouble(c.getColumnIndex("nota")));
            cliente.setCaminhoFoto(c.getString(c.getColumnIndex("caminhofoto")));
            
            clientes.add(cliente);
        }
        c.close();
        return clientes;
    }

    public List<cliente> getNome(){
        List<cliente> clientes = new ArrayList<cliente>();
        //a implementação do cursor permite expor os dados obtidos pela query no sql
        //sqlitecursor é usado para "se auto sincronizar" internamente


        Cursor c = getReadableDatabase().rawQuery("SELECT * FROM " + TABELA + ";",null);


        while(c.moveToNext()){
            cliente cliente = new cliente();

            cliente.setId((c.getLong(c.getColumnIndex("id"))));
            cliente.setNome(c.getString(c.getColumnIndex("nome")));

            clientes.add(cliente);
        }
        c.close();
        return clientes;
    }






    public void onUpgrade(SQLiteDatabase database, int versaoAntiga, int versaoNova) {
        String sql = "DROP TABLE IF EXISTS " + TABELA;
        database.execSQL(sql);
        onCreate(database);
    }

    public void insere(cliente cliente) {
        ContentValues conteudo = new ContentValues();
        conteudo.put("nome", cliente.getNome());
        conteudo.put("telefone", cliente.getTelefone());
        conteudo.put("endereco", cliente.getEndereco());
        conteudo.put("email", cliente.getEmail());
        conteudo.put("nota", cliente.getRank());
        conteudo.put("caminhofoto", cliente.getCaminhoFoto());
        getWritableDatabase().insert(TABELA,null,conteudo);

    }

    public void altera(cliente cliente){
        ContentValues values = new ContentValues();
        values.put("nome",cliente.getNome());
        values.put("telefone",cliente.getTelefone());
        values.put("endereco",cliente.getEndereco());
        values.put("email",cliente.getEmail());
        values.put("nota",cliente.getRank());
        values.put("caminhoFoto",cliente.getCaminhoFoto());

        String args = (cliente.getId().toString());
        getWritableDatabase().update(TABELA,values,"id=?",new String[]{cliente.getId().toString()});

    }


    //Nas informações acima , estamos 'ensinando a colocar os dados dentro das colunas"
    //Agora estas informaç~es serão acrescentadas ao banco
    //O metodo insert pertence ao método getWritable



    public void deleta(cliente cliente){
    String[] args={cliente.getId().toString()};
    getWritableDatabase().delete(TABELA,"id=?",args);
}

}

