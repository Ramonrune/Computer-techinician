package br.senai.sp.formulariocorreto;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.ContextMenu;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.util.List;


public class MainActivity extends Activity {
    private ListView listaClientes;
    private List<Cliente> clientes;
    private Cliente clienteSelecionado;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        //String[] clientes = {"Cínthia", "Maycon", "Daniel", "Lyanna"};

        //array contém string e o android só aceita objetos do tipo view daí a necessidade de um adaptador para que os dois possam "conversar"

        //int layout = android.R.layout.simple_list_item_1;
        //ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, layout, clientes);

        //quando usamos this significa que a variável lista  clientes deve ser declarada agora
        // listaClientes = (ListView) findViewById(R.id.Lista_clientes);
        // listaClientes.setAdapter(adapter);

        //parte2 - Acrescentando o toast preparando para ouvir qual a posição da lista

        this.listaClientes=(ListView)findViewById(R.id.Lista_clientes);
        ClienteDao dao = new ClienteDao(this);
        clientes = dao.getLista();
        dao.close();


        ArrayAdapter<Cliente> adapter =
                new ArrayAdapter<Cliente>(this,
                        android.R.layout.simple_list_item_1,
                        clientes);
        listaClientes.setAdapter(adapter);

        listaClientes.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

            }
        });

        listaClientes.setOnItemLongClickListener(new AdapterView.OnItemLongClickListener() {
            @Override
            public boolean onItemLongClick(AdapterView<?> parent, View view, int position, long id) {
                //pega o cliente selecionado
                clienteSelecionado = (Cliente) parent.getItemAtPosition(position);

                Toast.makeText(MainActivity.this, "Cliente : "
                        + clienteSelecionado, Toast.LENGTH_LONG).show();

                ClienteDao dao = new ClienteDao(MainActivity.this);
               // dao.deleta(clienteSelecionado);
                dao.close();
                carregaLista();
                return false;

            }
        });
        registerForContextMenu(listaClientes);


        //listaClientes = (ListView) findViewById(R.id.Lista_clientes);
        listaClientes.setAdapter(adapter);


    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.


        //testando o clique no menu

        switch (item.getItemId()) {
            case R.id.cadastro:
                Intent intente = new Intent(this, Formulario.class);
                startActivity(intente);
                return false;
            default:

                return super.onOptionsItemSelected(item);
        }

    }

    @Override
    protected void onResume() {
        super.onResume();
        this.carregaLista();
    }

    private void carregaLista() {
        ClienteDao dao = new ClienteDao(this);
        List<Cliente> clientes = dao.getLista();
        dao.close();
    }

    @Override
    public void onCreateContextMenu(ContextMenu menu, View v, ContextMenu.ContextMenuInfo menuInfo){
        super.onCreateContextMenu(menu, v, menuInfo);
        menu.add("Excluir");
        menu.add("Alterar");
        menu.add("Mostrar");

        MenuItem deletar=menu.add("Deletar");
            deletar.setOnMenuItemClickListener(new MenuItem.OnMenuItemClickListener() {
                @Override
                public boolean onMenuItemClick(MenuItem item) {
                    ClienteDao dao = new ClienteDao(MainActivity.this);
                    dao.deleta(clienteSelecionado);
                    dao.close();
                    carregaLista();
                    return false;
                }
            });
    }

}
