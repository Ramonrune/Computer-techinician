package br.senai.sp.formulariocorreto;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by B30 on 19/03/2015.
 */
public class ClienteDao extends SQLiteOpenHelper {
    //recomenda se criar string para evitar erros na construção do bd
    private static final int VERSAO = 1;
    private static final String TABELA = "Clientes";
    private static final String DATABASE = "BDSENAI";

    public ClienteDao(Context context){
        //construtor que us a classe mãe SQLiteOpenHelper - necesstita de 4 parâmetros
        super(context, DATABASE, null, VERSAO);
    }

    public void onCreate(SQLiteDatabase database){
        String criatabela = "CREATE TABLE " + TABELA + "(id INTEGER PRIMARY KEY, " +
                "nome TEXT UNIQUE NOT NULL," +
                "endereco TEXT," +
                "telefone TEXT," +
                "email TEXT, rank REAL, caminhofoto TEXT);";
        database.execSQL(criatabela);
    }

    @Override
    public void onUpgrade(SQLiteDatabase database, int oldVersion, int newVersion) {
        String sql = "DROP TABLE IF EXISTS "+TABELA;
        database.execSQL(sql);
        onCreate(database);

    }

    public void insere(Cliente cliente){
        ContentValues conteudo = new ContentValues();
        conteudo.put("nome", cliente.getNome());
        conteudo.put("endereco", cliente.getEndereco());
        conteudo.put("telefone", cliente.getTelefone());
        conteudo.put("email", cliente.getEmail());
        conteudo.put("rank", cliente.getRank());
        conteudo.put("caminhofoto", cliente.getCaminhoFoto());

        //nas informações acima, estamos "ensinado a colocar os dados dentro das colunas da tabela"
        //agora estas informações serão acrescentadas ao banco
        //o metodo insert pertence ao componente getWritable
        getWritableDatabase().insert(TABELA, null, conteudo);
    }

    public List<Cliente> getLista(){
        List<Cliente> clientes = new ArrayList<Cliente>();
        //A implementação do cursor permite expor os dados obtidos pela query no SQLyte
        //SQLiteCursoré usado para "se auto sincronuzar" internamento
        //SQLiteDatabase bd=getReadableDatabase();

        Cursor c = getReadableDatabase().rawQuery("SELECT * FROM "+TABELA + ";", null);
        //c.moveToFirst();

        while(c.moveToNext()){
            Cliente cliente = new Cliente();
            cliente.setId(c.getLong(c.getColumnIndex("id")));
            cliente.setNome(c.getString(c.getColumnIndex("nome")));
            cliente.setEndereco(c.getString(c.getColumnIndex("endereco")));
            cliente.setTelefone(c.getString(c.getColumnIndex("telefone")));
            cliente.setEmail(c.getString(c.getColumnIndex("email")));
            cliente.setRank(c.getDouble(c.getColumnIndex("rank")));
            cliente.setCaminhoFoto(c.getString(c.getColumnIndex("caminhofoto")));

            clientes.add(cliente);
        }
        c.close();
        return clientes;
    }

    public void deleta(Cliente ecliente){
        String[] args={ecliente.getId().toString()};
        getWritableDatabase().delete(TABELA, "id=?",args);
    }

}
