package br.senai.sp.cadastro;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by B30 on 12/03/2015.
 */
public class ClienteDao extends SQLiteOpenHelper{  //ajudante de gereciamento de banco de dados

    //recomenda-se criar string para evitar erros na construção do banco de dados
    private static final int VERSAO = 1;
    private static final String TABELA = "TabClientes";
    private static final String DATABASE = "BANCOSENAI";

    public ClienteDao(Context context){

        //construtor que usa a Classe mãe SQLiteOpenHelper = necessita de 4 paramentros
        super(context, DATABASE, null, VERSAO);

    }

    public void onCreate(SQLiteDatabase database){
        String criatabela = "CREATE TABLE " + TABELA + "(id INTEGER PRIMARY KEY, " + //definindo o ID como chave primária
                "nome TEXT UNIQUE NOT NULL," +
                "telefone TEXT," +
                "endereco TEXT," +
                "email TEXT, seekBar REAL, caminhofoto TEXT); ";
        database.execSQL(criatabela);
    }

    @Override
    public void onUpgrade(SQLiteDatabase database, int versaoAntiga, int versaoNova) {
        //no nosso caso, será apagado e criado novamente o banco através do controle
        String sql = "DROP TABLE IF EXISTS " + TABELA;
        database.execSQL(sql);
        onCreate(database);
    }

    public void insere(Mcliente cliente){

        ContentValues conteudo = new ContentValues();
        conteudo.put("nome", cliente.getNome());
        conteudo.put("telefone", cliente.getTelefone());
        conteudo.put("endereco", cliente.getEndereco());
        conteudo.put("email", cliente.getEmail());
        conteudo.put("seekBar", cliente.getSeekBar());
        conteudo.put("caminhofoto", cliente.getCaminhoFoto());

        //As informações acima, estamos "ensinando a colocar os dados dentro das colunas da tabela
        // Agora estas informações serão acrescentadas ao banco
        //O método insert pertence ao componente getWritable
        getWritableDatabase().insert(TABELA, null, conteudo);
    }

    /* Busca de dados no Banco
        faremos uso de um método rawquery que permite criar qualquer busca SQL, porém
    */

    public List<Mcliente> getList(){
        List<Mcliente> clientes = new ArrayList<Mcliente>();
        //A implementação do cursos permite expor os dados obtidos pela query no SQLite
        //SQLIteCursor é usado para "se auto sincronizar" internamente
        SQLiteDatabase db = getReadableDatabase(); //permite acesso ao banco

        Cursor c = getReadableDatabase().rawQuery("SELECT * FROM "+TABELA + ";", null);
       // c.moveToFirst();

        while (c.moveToNext()){
            Mcliente cliente = new Mcliente();
            cliente.setId(c.getLong(c.getColumnIndex("id")));
            cliente.setNome(c.getString(c.getColumnIndex("nome")));
            cliente.setTelefone(c.getString(c.getColumnIndex("telefone")));
            cliente.setEndereço(c.getString(c.getColumnIndex("endereco")));
            cliente.setEmail(c.getString(c.getColumnIndex("email")));
            cliente.setSeekBar(c.getDouble(c.getColumnIndex("seekBar")));
            cliente.setCaminhoFoto(c.getString(c.getColumnIndex("caminhofoto")));

            clientes.add(cliente);
        }
        c.close();
        return clientes;
    }

    public void deleta(Mcliente mcliente) {
        String[] args={mcliente.getId().toString()};
        getWritableDatabase().delete(TABELA, "id=?", args);
    }
}
