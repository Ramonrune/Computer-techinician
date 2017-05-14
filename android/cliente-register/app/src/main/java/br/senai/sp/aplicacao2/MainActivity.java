package br.senai.sp.aplicacao2;

import android.app.AlertDialog;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.ContextMenu;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;


public class MainActivity extends ActionBarActivity {

    private ListView lista_clientes;
    private List<cliente> clientes;
    public cliente clienteSelecionado;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
      //  requestWindowFeature(Window.FEATURE_NO_TITLE);
        //getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN,WindowManager.LayoutParams.FLAG_FULLSCREEN);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        //declarando a lista de clientes

        this.lista_clientes = (ListView) findViewById(R.id.lista_clientes);

        ClienteDao daoc = new ClienteDao(this);
        clientes = daoc.getLista();
        daoc.close();


        //array contem string e o android só aceita objetos do tipo string


        final ArrayAdapter<cliente> adapter = new ArrayAdapter<cliente>(this, android.R.layout.simple_list_item_1, clientes);
       // lista_clientes = (ListView) findViewById(R.id.lista_clientes);
        lista_clientes.setAdapter(adapter);


        //quando usamos o this significa que a variavel lista_clientes deve ser declarada agora
        //lista_clientes = (ListView) findViewById(R.id.lista_clientes);
        //lista_clientes.setAdapter(adapter);

        //parte 2 - acrescentando o toast preparando para ouvir qual a posicao



        lista_clientes.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> Parent, View view, int position, long id) {

                clienteSelecionado = (cliente) Parent.getItemAtPosition(position);
                Toast.makeText(MainActivity.this, "Posição atual: " + clienteSelecionado, Toast.LENGTH_LONG).show();
                Intent edicao = new Intent(MainActivity.this,formulario.class);

                edicao.putExtra("clienteSelecionado", (java.io.Serializable) clientes);
                startActivity(edicao);
                // startActivity(new Intent(MainActivity.this, formulario.class));

            }

        });



        lista_clientes.setOnItemLongClickListener(new AdapterView.OnItemLongClickListener() {
                    @Override
                    public boolean onItemLongClick(AdapterView<?> parent, View view, int position, long id) {
                        clienteSelecionado = (cliente) parent.getItemAtPosition(position);
                        Toast.makeText(MainActivity.this, "Posição Atual : " + clienteSelecionado, Toast.LENGTH_LONG).show();
                        //String client = (String) parent.getItemAtPosition(position);
                        //ClienteDao dao = new ClienteDao(MainActivity.this);


                        // dao.deleta(clienteselecionado);
                        //dao.close();
                        return false;
                    }
                } );
        registerForContextMenu(lista_clientes);

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;

    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();
        onResume();


        switch (item.getItemId()) {
            case R.id.menu_row:
                Intent intent = new Intent(this, formulario.class);
                startActivity(intent);
                return false;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

    public void onResume() {
        super.onResume();
        this.carregaLista();
    }

    private void carregaLista() {
        ClienteDao dao = new ClienteDao(this);
        List<cliente> clientes = dao.getNome();
        dao.close();
        ArrayAdapter<cliente> adapter = new ArrayAdapter<cliente>(this, android.R.layout.simple_list_item_1, clientes);
        this.lista_clientes.setAdapter(adapter);
    }


    @Override
    public void onCreateContextMenu(ContextMenu menu, View v, ContextMenu.ContextMenuInfo menuInfo) {
        super.onCreateContextMenu(menu, v, menuInfo);
      //  menu.add("Excluir");
      //  menu.add("Alterar");
      //  menu.add("Mostrar");
        MenuItem alterar = menu.add("Alterar");
        alterar.setOnMenuItemClickListener(new MenuItem.OnMenuItemClickListener() {
            @Override
            public boolean onMenuItemClick(MenuItem item) {

                ClienteDao dao = new ClienteDao(MainActivity.this);
                dao.altera(clienteSelecionado);
                dao.close();
                carregaLista();

                return false;


            }
        });
        MenuItem deletar = menu.add("Deletar");
        deletar.setOnMenuItemClickListener(new MenuItem.OnMenuItemClickListener() {
            @Override
            public boolean onMenuItemClick(MenuItem item) {
                ClienteDao dao = new ClienteDao(MainActivity.this);
                dao.deleta(clienteSelecionado);
                dao.close();
                carregaLista();
                return false;
              //  Toast.makeText(getApplicationContext(), "Deletar", Toast.LENGTH_SHORT).show();

            }
        });

    }


}


